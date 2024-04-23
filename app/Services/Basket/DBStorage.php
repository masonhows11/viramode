<?php

namespace App\Services\Basket;

use App\Models\CartItems;

use App\Services\Basket\Contracts\BasketInterface;
use Illuminate\Support\Facades\Auth;

class DBStorage implements BasketInterface
{

    //// for test
    //// use cartItems model as basket storage

    //// for get item

    private $user_id;


    public function __construct()
    {
        $this->user_id = Auth::id();
    }

    public function getItem($item)
    {

        $item = CartItems::where([['product_id', '=', $item->id], ['user_id', '=', $this->user_id]])->first();

        return $item;
    }

    //// for add item
    public function addItem($items = [], int $quantity)
    {

        // u can use this part for instagram post
        CartItems::updateOrCreate(
            ['user_id' => $this->user_id, 'product_id' => $items['id']],
            ['user_id' => $this->user_id, 'product_id' => $items['id'], 'number' => $quantity]
        );
    }


    //// for get all items
    public function getAllItems()
    {
        return $items = CartItems::where('user_id', $this->user_id)->get();
    }

    //// for check  item is exists or not
    public function existsItem($item = null)
    {
        return CartItems::where([['user_id', $this->user_id], ['product_id', '=', $item]])->first();
    }

    //// for delete item from
    public function deleteItem($item = null)
    {
        return  CartItems::where([['user_id', $this->user_id], ['product_id', '=', $item]])->delete();
    }

    //// for delete all items
    public function deleteAllItems()
    {

        CartItems::where('user_id', $this->user_id)->delete();
    }

    public function count()
    {
        return  $this->getAllItems()->count();
    }
}
