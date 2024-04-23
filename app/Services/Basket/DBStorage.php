<?php

namespace App\Services\Basket;

use App\Models\CartItems;

use App\Services\Basket\Contracts\BasketInterface;

class DBStorage implements BasketInterface
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
                'user_id' => $items['user_id'],
                'product_id' => $items['product_id'],
                'number' => $items['number'],
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
