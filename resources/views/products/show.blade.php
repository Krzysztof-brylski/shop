@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <main class="mt-5 pt-4">
                <div class="container dark-grey-text mt-5">
                    <h2>{{$product->name}}</h2>
                    <div class="row wow fadeIn">
                        <!--Grid column-->
                        <div class="col-md-6 mb-4">
                            @if(!is_null($product->image))
                                <img src="{{asset('storage/'.$product->image)}}" class="img-fluid mx-auto d-block img-fluid" style="width: 550px; height: 400px" alt="Card image cap">
                            @else
                                <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block img-fluid" style="width: 550px; height: 400px" alt="Card image cap">
                            @endif
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 mb-4">

                            <!--Content-->
                            <div class="p-4">

                                <div class="mb-3">
                                        <h3 class="text-primary">#{{$product->category->name}}</h3>
                                </div>

                                <p class="lead">

                                    <span>{{$product->price}} zł</span>
                                </p>

                                <p class="lead font-weight-bold">{{__("product.Description")}}</p>

                                <p>{{$product->description}}</p>

                                <div class="d-flex justify-content-left">
                                    <!-- Default input -->
                                    <!-- <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">-->
                                    <button class="btn btn-success add-cart-button" data-id="{{$product->id}}" @guest disabled @endguest>{{__("cart.Add")}}</button>
                                </div>

                            </div>
                            <!--Content-->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <hr>

                    <!--Grid row-->
                    <div class="row d-flex justify-content-center wow fadeIn">

                        <h4 class="my-4 h4">{{__("product.Suggestions")}}</h4>
                        <div class="row">
                            @foreach($suggestions as $suggestion)

                                @if($suggestion->id !== $product->id)
                                    @include('products.product',['product'=>$suggestion])
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <!--Grid row-->
                </div>
            </main>
        </div>
    </div>



@endsection
@section('javascript')
    const cart="{{url('cart')}}/";
@endsection
@section('js-files')
    @vite(['resources/js/cart.js'])
@endsection
