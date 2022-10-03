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
    public function is_item_exist(CartItem $dellItem){
        $items=$this->items;
        if($items->contains($dellItem->getId())){
            return true;
        }
        return false;
    }
    public function destroy_Item(CartItem $dellItem){

        $items=$this->items;
        $dellItemID=$dellItem->getId();
        //dd($this->is_item_exist($dellItem));
        $quantity=$items[$dellItemID]->getQuantity();
        if($quantity > 1){
            $newItem=new CartItem($dellItemID,--$quantity);

            $items=$items->replace([$dellItemID=>$newItem]);

            return new Cart($items,$this->total-=$dellItem->get_item()->price);
        }
        $item=$items->reject(function ($item) use($dellItem){
            return $item->getId() == $dellItem->getId();
        });
        if(!is_null($item)){
            $dellprice=$dellItem->get_item()->price;
            return new Cart($item,$this->total-=$dellprice);
        }
        //return $this;
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
            $items=$items->replace([$id=>$newItem]);
            $total=$this->total+=$item->get_item()->price;
            return new Cart($items,$total);
        }

        $items[$newItem->getId()]=$newItem;

        return new Cart($items  ,$this->total+=$newItem->get_item()->price);

    }
}
