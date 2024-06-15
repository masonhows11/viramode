<?php
namespace App\Services\BasketPrice;

use App\Services\Basket\Basket;
use App\Services\BasketPrice\Contracts\PriceInterface;



class BasketPrice implements PriceInterface
{

    const SHIPPING_COST = 50000;
    private $price;

    public function __construct(PriceInterface $price)
    {

        $this->price = $price;

    }


    public function getPrice($user = null){

        return SELF::SHIPPING_COST;
    }

    public function getTotalPrice(){

        return $this->price->getTotalPrice() + $this->getPrice();
    }

    public function descriptionTitle(){

        return __('messages.delivery_amount');
    }

    public function getSummary(int $user = null)
    {

        return array_merge( $this->price->getSummary() , [$this->descriptionTitle() => $this->getPrice()]);
    }

}
