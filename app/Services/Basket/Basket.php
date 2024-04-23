<?php

namespace App\Services\Basket;

use App\Models\Product;
use App\Services\Basket\Contracts\BasketInterface;

class Basket
{


    private $storage;


    public function __construct(BasketInterface $basketInterface)
    {

        $this->storage = $basketInterface;
    }



    public function add(Product $product, int $quantity)
    {

        if ($this->exists($product))
        {
            $quantity = $this->get($product->id)['number']  + $quantity;
        }

        $this->storage->addItem($product, $quantity);
    }


    public function get(Product $product)
    {
        return $this->getItem($product->id);
    }





    public function exists(Product $product)
    {

        return $this->existsItem($product->id);
    }


    public function delete(Product $product)
    { }
}
