@extends('layouts.app')

@section('content')

    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
        <div class="card p-5 d-flex justify-content-center">
            <div class="card-header">
                <h2>Creating Promotion Code</h2>
            </div>
            <form action="{{route('promoCode.store')}}" class="" method="post">
                @csrf
                <div>
                    <span>Promo code:</span>
                    <input type="text" class="form-control" name="code" required/>
                </div>
                <div>
                    <span>Discount value:</span>
                    <input type="number"  class="form-control" name="discount" required/>
                </div>

                <input type="submit" class="btn btn-success my-2" value="Create Promo Code!"/>
            </form>
        </div>

    </div>
@endsection
