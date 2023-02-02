@extends('layouts.app')
@section('content')
    <div class="container">
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
                    <td style="text-align: center;">
                        <a class="btn btn-info" href="#" >See User</a>
                        <a class="btn btn-info" href="#" >See Details</a>
                        <a class="btn btn-info" href="{{route("order.show",['order'=>$order->id])}}" >See Order</a>
                        <a class="btn btn-info" href="#" >See Payment</a>
                        <br>
                        <a class="btn btn-danger" href="#" >Delete Order</a>
                        <a class="btn btn-success" href="#" >Mark Delivered</a>
                    </td>


                </tr>
            @endforeach
            <tbody>

            </tbody>
        </table>


        {{$orders->links()}}
    </div>
@endsection
