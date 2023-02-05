@extends('layouts.app')

@section('content')
    <div class="d-flex w-100 h-100 justify-content-between align-items-center">
        <form action="{{route('promoCode.store')}}" class="" method="post">
            @csrf
            <div>
                <span>Promo code:</span>
                <input type="text" name="code" required/>
            </div>
            <div>
                <span>Discount value:</span>
                <input type="number" name="discount" required/>
            </div>

            <input type="submit" value="Create Promo Code!"/>
        </form>
    </div>
@endsection
