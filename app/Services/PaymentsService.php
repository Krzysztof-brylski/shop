<?php


namespace App\Services;


use App\Models\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentsService
{
    public function establishPayment($data,$clientEmail){
        $token=Http::post('127.0.0.1:8888/',array(
            'originUrl'=>$data['originUrl'],
            'statusUpdateUrl'=>url("payment/status/update/"),
            'toPay'=>(float)$data['toPay'],
            'clientEmail'=>$clientEmail,
        ))->collect('token')->toArray()[0];
        return $token;
    }
}
