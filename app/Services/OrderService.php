<?php


namespace App\Services;


use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderService
{
    public function createOrder(array $data){
        $cart = Session::get('cart');
        if(is_null($cart)){
            abort(404);
        }
        $total=$cart->get_total();
        $order = new Order();
        $order->total=$total;
        $order->items=json_encode($cart->get_assoc_array());

        DB::transaction(function () use($total, $order,$data){
            $order->save();
            $token = (new PaymentsService())->establishPayment(array(
                'toPay'=>$total,
                'originUrl'=>route('order.show',['order'=>($order->getNextId()-1)]),
            ),$data['email']);

            $payment= new Payments([
                'toPay'=>$total,
                'token'=>$token,
            ]);
            $details= new OrderDetails([
                'name'=>$data['name'],
                'surname'=>$data['surname'],
                'email'=>$data['email'],
                'phone_no'=>$data['phoneNo'],
                'zip_code'=>$data['zipCode'],
                'country'=>$data['country'],
                'city'=>$data['city'],
                'address'=>$data['address'],
                ]);
            $order->payments()->save($payment);
            $order->orderDetails()->save($details);
        });
        return $order->payments->token;
    }
}
