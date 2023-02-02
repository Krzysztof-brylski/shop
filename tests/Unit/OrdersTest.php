<?php

namespace Tests\Unit;

use App\Models\User;
use App\ValueObjects\Cart;
use App\ValueObjects\CartItem;
use \Illuminate\Support\Facades\Session;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_make_order()
    {
        $user=User::factory(1)->create(['role'=>'user']);
        $cart = new Cart();
        $cartItem1= new CartItem(48,1);
        $cartItem2= new CartItem(49,1);
        $cartItem3= new CartItem(50,1);
        $cart->add_item($cartItem1);
        $cart->add_item($cartItem2);
        $cart->add_item($cartItem3);
        Session::put(['cart'=>$cart]);
        $result=$this->actingAs($user)->visit('/order/create');
        $result->assertStatus(200);
        $result->assertView('order/create');
    }
}
