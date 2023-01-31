<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'status',
        'user_id',
        'total',
        'items'
    ];
    public function payments(){
        return $this->hasOne(Payments::class,'orders_id');
    }

    public function orderDetails(){
        return $this->hasOne(OrderDetails::class,'orders_id');
    }
    public function getNextId()
    {
        $statement = DB::select("show table status like 'orders'");
        return $statement[0]->Auto_increment;
    }
}
