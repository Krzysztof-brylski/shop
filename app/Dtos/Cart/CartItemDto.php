<?php
namespace App\Dtos\Cart;

use App\Models\Products;

class CartItemDto{

    private $ProductId;
    private $name;
    private $price;
    private $quantity;
    private $imagePath;

    /**
     * @param Products $products
     *
     */

    public function __construct(Products $products,$quantity)
    {
        $this->ProductId=$products->id;
        $this->name=$products->name;
        $this->price=$products->price;
        $this->imagePath=$products->image;

        $this->quantity=$quantity;
    }
    /**
     *
     * @return mixed
     */
    public function getProductId()
    {
        return $this->ProductId;
    }

    /**
     * @param mixed $ProductId
     */
    public function setProductId($ProductId)
    {
        $this->ProductId = $ProductId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }
    public function incrementQuantity(){
        $this->quantity+=1;
    }




}
