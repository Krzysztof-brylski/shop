<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Services\OrderService;
use App\ValueObjects\OrderVO;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('can:showOrder,order',['only'=>['show']]);
    }

    public function index(){
        if(!Auth::user()->can('isAdmin')){
            $orders=Order::where("user_id",'=',Auth::id())->with('payments')->get();
            return view("order/list",array(
                'orders'=>$orders,
            ));
        }
        $pagination=Order::with(['payments','user','orderDetails'])->paginate(10);
        return view("order/index",array(
            'orders'=>$pagination,
        ));

    }
    public function destroy(Order $order){
        $order->orderDetails()->delete();
        $order->payments()->delete();
        $order->delete();
        return back()->with('status',__('alerts.Order.Delete.Delete_Alert'))
            ->with('error',false);
    }
    public function markDelivered(Order $order){
        if($order->status != "inProgress"){
            return back()->with('status',__('alerts.Order.Status.Status_Error'))
                ->with('error', true);
        }
        $order->setStatus("success");
        return back()->with('status',__('alerts.Order.Status.Status_Alert'))
            ->with('error',false);
    }
    public function show(Order $order){
        return view("order/show",[
            'order'=>$order->with(['payments'])->first(),
            'items'=>$order->getProducts(),
        ]);
    }
    public function applyPromoCode(Request $request){
        if(!Session::exists('order')){
            abort(403);
        }
        $order=Session::get('order');
        $code=$request->validate(['code'=>'string|required']);
        $order=$order->applyPromoCode($code['code']);
        Session::forget('order');
        Session::put(['order'=>$order]);
        return Redirect::back();
    }
    public function create(){

        if(Session::exists('order')){
            return view("order/create",['order'=>Session::get('order')]);
        }

        $cart =  Session::get('cart');
        $order= new OrderVO($cart->get_total(), $cart->get_data());
        Session::put(["order"=>$order]);
        return view("order/create",['order'=>$order]);
    }
    public function store(OrderCreateRequest $request){
        $data=$request->validated();
        if(!Session::exists('cart')){
            return Redirect::back()->with(['error'=>'Session_empty']);
        }
        $orderPaymentToken=(new OrderService())->createOrder($data);
        Session::forget('order');
        return Redirect::away("http://127.0.0.1:8888/payment/$orderPaymentToken");
    }



}
