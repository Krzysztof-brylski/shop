<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable=[
        'token',
        'status',
        'toPay',
        'orders_id'
    ];
    public function order(){
        return $this->belongsTo(Order::class,'orders_id');
    }
}
