<?php


namespace App\ValueObjects;


class OrderVO
{
    public $total;
    public $items;
    public $promoCode;
    public $messages;


    public function __construct($total, array $items, $promoCode=null, $messages=null){
        $this->total=(float)$total;
        $this->items=$items;
        $this->promoCode=$promoCode;
        $this->messages=$messages;
    }

    public function apply_promo_code($code){
        if(!is_null($this->promoCode)){
            //if promo code is used more than once
            return new OrderVO(
                $this->total,
                $this->items,
                $this->promoCode,
                array(
                    "Error"=>"Promo code is already used!",
                )
            );
        }
        $promoCodes=array(
            "test"=>-5,
        );
        if(!array_key_exists($code,$promoCodes)){
            //if promo code does not exists
            return new OrderVO(
                $this->total,
                $this->items,
                null,
                array(
                    "Error"=>"Promo code does not exists!",
                )
            );
        }
        // successfully used promo code
        return new OrderVO(
            ($this->total-$promoCodes[$code]),
            $this->items,
            [$code=>$promoCodes[$code]],
            array(
                "Success"=>"Promo code used successfully!",
            )
        );
    }
}
