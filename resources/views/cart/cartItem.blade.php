<li class="cart_item clearfix">
    <div class="cart_item_image"><img src="{{asset('storage/'.$item->image)}}" alt=""></div>
    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
        <div class="cart_item_name cart_info_col">
            <div class="cart_item_title"></div>
            <div class="cart_item_text">{{$item->name}}</div>
        </div>
        <div class="cart_item_quantity cart_info_col">
            <div class="cart_item_title">Quantity</div>
            <div class="cart_item_text">{{$quaintly}}</div>
        </div>
        <div class="cart_item_price cart_info_col">
            <div class="cart_item_title">Price</div>
            <div class="cart_item_text">{{$item->price}} PLN</div>
        </div>
        <div class="cart_item_total cart_info_col">
            <div class="cart_item_title">Total</div>
            <div class="cart_item_text">{{$quaintly*$item->price}} PLN</div>
        </div>
        <div>
            <button class="btn btn-danger">U</button>
        </div>
    </div>
</li>
