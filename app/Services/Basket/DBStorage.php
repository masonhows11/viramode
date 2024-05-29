<?php

namespace App\Services\Basket;

use App\Models\CartItems;
use App\Services\Basket\Contracts\BasketInterface;


class DBStorage implements BasketInterface
{

    //// for test
    //// use cartItems model as basket storage

    //// for get item

    public function getItem($item,int $user = null)
    {

        $item = CartItems::where([['product_id', '=', $item->id], ['user_id', '=', $user]])->first();

        return $item;
    }

    //// for add item
    public function addItem($items = [], int $quantity,int $user = null)
    {

        // u can use this part for instagram post
        CartItems::updateOrCreate(
            ['user_id' => $user, 'product_id' => $items['id']],
            ['user_id' => $user, 'product_id' => $items['id'], 'number' => $quantity]
        );
    }


    //// for get all items
    public function getAllItems(int $user = null)
    {
        return CartItems::where('user_id', $user)->get();
      // $items = CartItems::where('user_id', $user)->get();
      // return $items;
    }

    //// for check  item is exists or not
    public function existsItem($item = null,int $user = null)
    {
        return CartItems::where([['user_id', $user], ['product_id', '=', $item]])->first();
    }

    //// for delete item from
    public function deleteItem($item = null,int $user = null)
    {
        return  CartItems::where([['user_id', $user], ['product_id', '=', $item]])->delete();
    }

    //// for delete all items
    public function deleteAllItems(int $user = null)
    {

        CartItems::where('user_id', $user)->delete();
    }

    public function count(int $user = null)
    {
        return  $this->getAllItems()->count();
    }
}
