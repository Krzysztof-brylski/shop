<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'zip_code',
        'street',
        'street_no',
        'home_no',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
