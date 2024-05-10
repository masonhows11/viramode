<?php
namespace App\Services\Basket\Contracts;




interface BasketInterface{

    //// for get item
    public function getItem($item,int $user = null);

    //// for add item
    public function addItem($item = [],int $quantity,int $user = null);


    //// for get all items
    public function getAllItems(int $user = null);

    //// for check  item is exists or not
    public function existsItem($item = null,int $user = null);

    //// for delete item from
    public function deleteItem($item = null,int $user = null);

    //// for delete all items
    public function deleteAllItems(int $user = null);

    public function count(int $user = null);

}
