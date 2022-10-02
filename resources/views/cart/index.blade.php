@extends('layouts.app')
@section('content')
@vite(['resources/css/cart.css'])

<div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Shopping Cart<small> (1 item in your cart) </small></div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach($cart as $item)
                                @include('cart.cartItem',[
                                'item'=>$item->get_item(),
                                'quaintly'=>$item->getQuantity(),
                                ])
                            @endforeach
                        </ul>
                    </div>
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">{{$total}} PLN</div>
                        </div>
                    </div>
                    <div class="cart_buttons"> <button type="button" class="button cart_button_clear">Continue Shopping</button> <button type="button" class="button cart_button_checkout">Add to Cart</button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
