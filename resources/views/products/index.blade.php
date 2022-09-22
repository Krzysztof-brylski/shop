@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-6">
            <h2>Lista Produktów</h2>
        </div>
        <div class="col-xl-6">
            <a href="{{route('products.create')}}">
                <button class="btn btn-success">Dodaj Produkt</button>
            </a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Opis</th>
            <th scope="col">ilość</th>
            <th scope="col">Cena</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $keys=>$product)
            <tr>
                <th scope="row">{{$keys+1}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->price}}</td>
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
    const deleteUrl="{{url('products') }}/";
@endsection
@section('js-files')
    @vite('resources/js/delete.js')
@endsection
