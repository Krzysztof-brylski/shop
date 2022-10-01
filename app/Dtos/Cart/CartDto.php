<?php

namespace App\Dtos\Cart;

class CartDto
{
    private $cart = [];
    private $totalSum=0;
    private $totalQuantity=0;

    /**
     * @param array $cart
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }

    /**
     * @param int $totalSum
     */
    public function setTotalSum($totalSum)
    {
        $this->totalSum = $totalSum;
    }
    /**
     * @param int $totalQuantity
     */
    public function setTotalQuantity($totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;
    }

    /**
     * @return array
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @return int
     */
    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    /**
     * @return int
     */
    public function getTotalSum()
    {
        return $this->totalSum;
    }
    public function incrementTotalQuantity(){
        $this->totalQuantity+=1;
    }
    public function incrementTotalSum($price){
        $this->totalSum +=$price;
    }

}
