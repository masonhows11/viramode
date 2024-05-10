<?php

namespace App\Services\Basket;

use App\Exceptions\QuantityExceededException;
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

        if ($this->exists($product)) {
            $quantity = $this->get($product)['number'] + $quantity;
        }


        $this->storage->addItem($product, $quantity);

        // $this->update($product,$quantity);


    }


    // public function update(Product $product,int $quantity)
    // {

    //     if(!$product->hasStock($quantity))
    //     {

    //          throw new QuantityExceededException();
    //     }

    //     $this->storage->addItem($product, $quantity);
    // }

    public function get(Product $product)
    {
        return $this->storage->getItem($product);
    }





    public function exists(Product $product)
    {

        return $this->storage->existsItem($product->id);
    }


    public function delete(Product $product)
    {

    }

    public function clearBasket()
    {
        return $this->storage->deleteAllItems();
    }
}
