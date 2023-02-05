<?php


namespace App\ValueObjects;


use App\Models\PromoCode;

class OrderVO
{
    public $total;
    public $items;
    public $promoCode;
    public $messages;
    private $promoCodes;


    public function __construct($total, array $items, $promoCode=null, $messages=null){
        $this->total=(float)$total;
        $this->items=$items;
        $this->promoCode=$promoCode;
        $this->messages=$messages;
    }
    private function getPromoCodes(){
        $promoCodes=PromoCode::all();
        foreach ($promoCodes as $code){
            $this->promoCodes[$code->code]=$code->discount;
        }
    }
    public function applyPromoCode($code){
        $this->getPromoCodes();
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

        /**
          * for tests only !
          *      $promoCodes=array(
          *          "test"=>-5,
          *     );
         */
        if(!array_key_exists($code,$this->promoCodes)){
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
            ($this->total-$this->promoCodes[$code]),
            $this->items,
            [$code=>$this->promoCodes[$code]],
            array(
                "Success"=>"Promo code used successfully!",
            )
        );
    }
}
