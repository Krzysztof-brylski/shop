
<div class="col-6 col-md-6 col-lg-4 mb-3">
    <div class="card h-100 border-0">
        <div class="card-img-top">
            @if(!is_null($product->image))
                <img src="{{asset('storage/'.$product->image)}}" style="width: 300px; height: 250px" class="img-fluid mx-auto d-block" alt="Card image cap">
            @else
                <img src="https://via.placeholder.com/240x240/5fa9f8/efefef"  style="width: 300px; height: 250px" class="img-fluid mx-auto d-block" alt="Card image cap">
            @endif
        </div>
        <div class="card-body text-center">
            <h4 class="card-title">
                {{$product->name}}
            </h4>
            <a class="text-decoration-none" href="{{route('products.show',$product->id)}}">
                <h5 class="card-price medium">
                    <i>PLN {{$product->price}}</i>
                </h5>
            </a>
            <button class="btn btn-success add-cart-button" data-id="{{$product->id}}" @guest disabled @endguest>{{__("cart.Add")}}</button>
        </div>
    </div>
</div>
