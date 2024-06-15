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



    public function add(Product $product, int $quantity, int $user = null)
    {

        if ($this->exists($product, $user)) {
            $quantity = $this->get($product, $user)['number'] + $quantity;
        }


        $this->storage->addItem($product, $quantity, $user);

        // $this->update($product,$quantity,$user);

    }

    // public function update(Product $product,int $quantity,$user)
    // {

    //     if(!$product->hasStock($quantity))
    //     {
    //          throw new QuantityExceededException();
    //     }

    //     $this->storage->addItem($product, $quantity,$user);
    // }

    public function get(Product $product, int $user = null)
    {
        return $this->storage->getItem($product, $user);
    }


    public function getAll(int $user = null)
    {
        return $this->storage->getAllItems($user);
    }


    public function exists(Product $product, int $user = null)
    {

        return $this->storage->existsItem($product->id, $user);
    }


    public function delete(Product $product, int $user = null)
    {
        $this->storage->deleteItem($product->id, $user);
    }

    public function clearBasket(int $user = null)
    {
        return $this->storage->deleteAllItems($user);
    }


    public function basketCount(int $user = null)
    {
        return $this->storage->count($user);
    }

    public function itemsCount(int $user = null)
    {
        $cartItemsCount = null;

        foreach ($this->getAll($user) as $item)
        {
            $cartItemsCount += $item->number;
        }
        return $cartItemsCount;
    }


    public function totalPrice(int $user = null)
    {
        $totalProductPrice = null;
        foreach ($this->getAll($user) as $item) {
            $totalProductPrice += $item->cartItemProductPrice();
        }
        return $totalProductPrice;
    }


    // public function payablePrice(int $user = null)
    // {

    // }




}
