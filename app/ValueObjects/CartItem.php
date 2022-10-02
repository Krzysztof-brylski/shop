<?php
namespace App\ValueObjects;

use App\Models\Products;

class CartItem{

    private $ProductId;
    private $quantity;


    /**
     * @param $id
     * @param int $quantity
     */

    public function __construct($id,$quantity = 1)
    {
        $this->ProductId=$id;
        $this->quantity=$quantity;
    }
    public function getId(){
        return $this->ProductId;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function get_item(){
        return Products::query()->where('id','=',$this->ProductId)->get()->first();
    }


}
