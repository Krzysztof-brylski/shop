@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-6">
            <h2>{{__('product.Titles.Product_list')}}</h2>
        </div>
        <div class="col-xl-6">
            <a href="{{route('products.create')}}">
                <button class="btn btn-success">{{__('product.Buttons.Add_button')}}</button>
            </a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col">{{__('Description')}}</th>
            <th scope="col">{{__('Amount')}}</th>
            <th scope="col">{{__('Price')}}</th>
            <th scope="col">{{__('Category')}}</th>
            <th scope="col">{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->price}}</td>
                <td>@if($product->hasCategory()){{$product->category->name}}@endif</td>
                <td>
                    <a href="{{route('products.show',$product)}}"><button  class="btn btn-info btn-sm ">O</button></a>
                    <a href="{{route('products.edit',$product)}}"><button  class="btn btn-success btn-sm ">E</button></a>
                    <button  class="btn btn-danger btn-sm delete-button" data-id="{{$product->id}}">X</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{$products->links()}}

@endsection
@section('javascript')
    const deleteUrl="{{url('products') }}";
@endsection
@section('js-files')
    @vite('resources/js/delete.js')
@endsection
