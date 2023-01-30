<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone_no',
        'zip_code',
        'country',
        'city',
        'address',
        'orders_id'
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }

}
