<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'amount',
        'price',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(ProductsCategories::class);
    }

    public function hasSelectedCategory(int $id){
        return $this->hasCategory() && $this->category_id === $id;
    }

    public function hasCategory(){
        return !is_null($this->category);
    }

}
