@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($order->items as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="d-flex justify-content-center align-items-center">
                                <img style="border-radius: 15px; border: 1px transparent solid; margin-right: 20px" height="75px" width="75px" src="{{asset("storage/".$item->get_item()->image)}}">
                                <div>
                                    <h6 class="my-0 text-capitalize">{{$item->get_item()->name}}</h6>
                                    <small class="text-muted">Quantity {{$item->getQuantity()}}</small>
                                </div>
                            </div>
                            <span class="text-muted">{{$item->get_item()->price * $item->getQuantity()}} PLN</span>
                        </li>
                    @endforeach
                    @if(!is_null($order->promoCode))
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>{{array_key_first($order->promoCode)}}</small>
                                </div>
                                <span class="text-success">−{{$order->promoCode[array_key_first($order->promoCode)]}}PLN</span>
                            </li>
                    @endif
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (PLN)</span>
                        <strong>{{$order->total}}PLN</strong>
                    </li>
                </ul>
                <form class="card p-2" action="{{route('order.applyPromoCode')}}" method="post">
                    @if(array_key_exists('Error',$order->messages))
                        <div class="alert-danger alert alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{$order->messages['Error']}}
                        </div>
                    @endif
                    @csrf
                    <div class="input-group">
                        <input type="text" name="code" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                    <form  action="{{route("order.store")}}" method="POST" >
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lastName" name="surname" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                                <div class="invalid-feedback" style="width: 100%;">
                                    Please enter a valid email address.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phoneNo">Phone number</label>
                            <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone number" maxlength="9" minlength="9">
                            <div class="invalid-feedback">
                                Please enter a valid Phone number.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="" required>
                                <div class="invalid-feedback">
                                    country required.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                                <div class="invalid-feedback">
                                    City required.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zipCode" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>

                        </div>
                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Make order" >
                    </form>
            </div>
        </div>
    </div>
@endsection
