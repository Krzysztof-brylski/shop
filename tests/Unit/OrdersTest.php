<?php

namespace Tests\Unit;

use App\Models\User;
use App\ValueObjects\Cart;
use App\ValueObjects\CartItem;
use App\ValueObjects\OrderVO;
use \Illuminate\Support\Facades\Session;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    private function setupCart(){
        $cart = new Cart();
        $cartItem1= new CartItem(48,1);
        $cartItem2= new CartItem(49,1);
        $cartItem3= new CartItem(50,1);
        $cart->add_item($cartItem1);
        $cart->add_item($cartItem2);
        $cart->add_item($cartItem3);
        Session::put(['cart'=>$cart]);
    }
    private function deleteCart(){
        Session::remove('cart');
    }
    private function setupOrderVO(){
        $cart=Session::get('cart');
        return new OrderVO($cart->get_total(),$cart->get_data());
    }
    public function test_cart()
    {
        $this->setupCart();
        $this->assertTrue(Session::exists('cart'));
        $this->deleteCart();
        $this->assertFalse(Session::exists('cart'));
    }

    public function test_order_vo(){
        $this->setupCart();
        $order=$this->setupOrderVO();
        $this->assertCount(3,$order->items);
        $this->assertTrue($order->total>0);
        $this->deleteCart();
    }
    public function test_promo_code(){
        $this->setupCart();
        $order=$this->setupOrderVO();
        $cart=Session::get('cart');
        $order = $order->apply_promo_code("test");
        $this->assertEquals(
            $order->total,
           ((float)$cart->get_total())-$order->promoCode["test"]
        );
        $this->assertArrayHasKey('Success',$order->messages);
        $this->assertEquals($order->messages['Success'],"Promo code used successfully!");
    }
    public function test_more_than_one_code_error(){
        $this->setupCart();
        $order=$this->setupOrderVO();
        $cart=Session::get('cart');
        $order = $order->apply_promo_code("test");
        $order2 = $order->apply_promo_code("test");

        $this->assertArrayHasKey('Error',$order2->messages);
        $this->assertEquals($order2->messages["Error"],"Promo code is already used!");
        $this->assertEquals(
            $order2->total,
            ((float)$cart->get_total())-$order2->promoCode["test"]
        );
    }
    public function test_not_existing_promo_code(){
        $this->setupCart();
        $order=$this->setupOrderVO();
        $order = $order->apply_promo_code("not_exist");
        $this->assertArrayHasKey('Error',$order->messages);
        $this->assertEquals($order->messages["Error"],"Promo code does not exists!");

    }
}
