<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class OrderController extends Controller
{
    //

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
    public function delete(){

    }

    public function show(Order $order){

        return view("order/show",[
            'order'=>$order->with(['payments'])->first(),
            'items'=>$order->getProducts(),
        ]);
    }

    public function create(){
        $cart =  Session::get('cart');
        return view("order/create",['total'=>$cart->get_total(),'items'=>$cart->get_data()]);
    }
    public function store(OrderCreateRequest $request){
        $data=$request->validated();
        if(is_null(Session::get('cart'))){
            return Redirect::back()->with(['error'=>'Session_empty']);
        }
        $orderPaymentToken=(new OrderService())->createOrder($data);
        return Redirect::away("http://127.0.0.1:8888/payment/$orderPaymentToken");
    }



}
