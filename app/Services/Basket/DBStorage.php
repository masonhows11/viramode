<?php

namespace App\Services\Basket;

use App\Models\CartItems;
use Countable;
use App\Services\Basket\Contracts\StorageInterface;

class DBStorage implements StorageInterface
{

    //// for test
    //// use cartItems model as basket storage

    //// for get item
    public function getItem($item)
    {

    }

    //// for add item
    public function addItem($items = [])
    {

        CartItems::create([
                'user_id' => '',
                'product_id' => '',
                'number' => '',
        ]);

    }


    //// for get all items
    public function getAllItems()
    {

    }

    //// for check  item is exists or not
    public function existsItem($item = null)
    {

    }

    //// for delete item from
    public function deleteItem($item = null)
    {

    }

    //// for delete all items
    public function deleteAllItems()
    {

    }
}