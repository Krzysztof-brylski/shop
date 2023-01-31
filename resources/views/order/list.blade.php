@extends('layouts.app')
@section('content')
<div class="container">
    <h2>My orders</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Status</th>
            <th scope="col">Payment status</th>
            <th scope="col">Total</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td scope="row">{{$order->status}}</td>
                <td>{{$order->payments->status}}</td>
                <td>{{$order->total}} PLN</td>
                <td> <a class="btn btn-primary" href="{{route("order.show",['order'=>$order->id])}}" >O</a></td>
            </tr>
        @endforeach
        <tbody>

        </tbody>
    </table>
</div>
@endsection
