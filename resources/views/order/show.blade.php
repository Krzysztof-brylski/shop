@extends('layouts.app')
@section('content')
@vite(['resources/css/app.css'])
        <div class="container py-5">

            <div class="row d-flex justify-content-center align-items-center my-3">

                <div class="col-12">
                    <div class="card card-stepper text-black p-5" style="border-radius: 16px;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Retail price</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>
                                            <img width="100px" height="100px" src="{{asset("storage/".$item->image)}}">
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->price}}PLN</td>
                                        <td>{{$order->getItemsArray()[(int)$item->id]}}</td>
                                        <td>{{ (float)($order->getItemsArray()[(int)$item->id])*(float)$item->price }}PLN</td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <th colspan="4" style="text-align: right;">
                                            Total:
                                        </th>
                                        <th>
                                            {{$order->total}} PLN
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center  my-5">
                <div class="col-12">
                    <div class="card card-stepper text-black" style="border-radius: 16px;">

                        <div class="card-body p-5">

                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div>
                                    <h5 class="mb-0">ORDER <span class="text-primary font-weight-bold">{{$order->id}}</span></h5>
                                </div>
                                <div class="text-end">
                                    <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                                    <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
                                </div>
                            </div>

                            <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                                <li class="step0 @if($order->status=="inProgress" or $order->status=="success" ) active @endif text-center " id="step1"></li>
                                <li class="step0 @if($order->payments->status=="success" or $order->status=="success" )active @endif text-center" id="step2"></li>
                                <li class="step0 @if($order->payments->status=="success" or $order->status=="success" )active @endif text-center" id="step3"></li>
                                <li class="step0  @if( $order->status=="success" )active @endif text-muted text-end" id="step4"></li>
                            </ul>

                            <div class="d-flex justify-content-between">
                                <div class="d-lg-flex align-items-center">
                                    <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                    <div>
                                        <p class="fw-bold mb-1">Order</p>
                                        <p class="fw-bold mb-0">Processed</p>
                                    </div>
                                </div>
                                <div class="d-lg-flex align-items-center">
                                    <i class="fa-solid fa-file-invoice-dollar fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                    <div>
                                        <p class="fw-bold mb-1">Payment</p>
                                        <p class="fw-bold mb-0">Accepted</p>
                                    </div>
                                </div>
                                <div class="d-lg-flex align-items-center">
                                    <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                    <div>
                                        <p class="fw-bold mb-1">Order</p>
                                        <p class="fw-bold mb-0">En Route</p>
                                    </div>
                                </div>
                                <div class="d-lg-flex align-items-center">
                                    <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                    <div>
                                        <p class="fw-bold mb-1">Order</p>
                                        <p class="fw-bold mb-0">Arrived</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary">Download invoice</button>
        </div>
        ->>
@endsection
