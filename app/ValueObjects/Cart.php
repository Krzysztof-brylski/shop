<?php

namespace App\ValueObjects;


use App\ValueObjects\CartItem;
use Illuminate\Support\Collection;
class Cart
{
    private $items;
    private $total;

    public function __construct($items=null,$total=0)
    {
        $items == null ?
            $this->items=Collection::empty() :
            $this->items=$items;

        $this->total=$total;
    }
    public function get_total(){
        return $this->total;
    }
    public function get_data(){
        return $this->items->all();
    }
    public function destroy_Item(CartItem $dellItem){
        $items=$this->items;
        $item=$items->reject(function ($item) use($dellItem){
            return $item->getId() == $dellItem->getId();
        });
        if(!is_null($item)){
            $dellprice=$dellItem->get_item()->price;
            return new CartItem($item,$this->total-=$dellprice);
        }
        return $this;
    }
    public function add_item(CartItem $newItem){
        $items=$this->items;
        $item=$items->first(function ($item) use($newItem){
           return $item->getId() == $newItem->getId();
        });


        if(!is_null($item)){

            $quantity=(int)$item->getQuantity();
            $id=$item->getId();
            $newItem=new CartItem($id,++$quantity);
            $items->replace([$id=>$newItem]);
            $this->total+=$item->get_item()->price;
        }

        $newItems = $this->items[$newItem->getId()]=$newItem;
        return new CartItem($newItems,$this->total+=$newItem->get_item()->price);

    }
}
