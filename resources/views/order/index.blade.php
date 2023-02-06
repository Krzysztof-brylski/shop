@extends('layouts.app')
@section('content')

    <div class="container">
        @include('helpers/alerts')
        <h2>Clinet orders</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Author Id</th>
                <th scope="col">Status</th>
                <th scope="col">Payment status</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <th scope="row">{{$order->user->id}}</th>
                    <td scope="row">{{$order->status}}</td>
                    <td>{{$order->payments->status}}</td>
                    <td>{{$order->total}} PLN</td>
                    <td style="text-align: center;" class="d-flex">
                        <a class="btn btn-info" href="{{route("order.show",['order'=>$order->id])}}" >See Order</a>
                        <form method="post" action="{{route("order.markDelivered",['order'=>$order->id])}}">
                            @csrf
                            <button type="submit" class="btn btn-success">Mark Delivered</button>
                        </form>
                        <form method="post" action="{{route("order.destroy",['order'=>$order->id])}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete Order</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tbody>

            </tbody>
        </table>


        {{$orders->links()}}
    </div>
@endsection
