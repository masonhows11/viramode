<?php
namespace App\Services\BasketPrice;

use App\Services\Basket\Basket;
use App\Services\BasketPrice\Contracts\PriceInterface;

class BasketPrice implements PriceInterface
{

    private $basket;

    public function __construct(Basket $basket)
    {

        $this->basket = $basket;
    }

    public function getPrice(){

        return $this->basket->totalPrice($user = null);
    }

    public function getTotalPrice(){

        return $this->getPrice();
    }

    public function descriptionTitle(){

        return __('messages.total_price');
    }

    public function getSummary(){

        return [$this->descriptionTitle() => $this->getPrice()];
    }

}





