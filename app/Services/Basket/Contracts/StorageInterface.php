<?php
namespace App\Services\Basket\Contracts;




interface StorageInterface{




    //// for get item
    public function getItem($item);

    //// for add item
    public function addItem($item = null, $value);


    //// for get all items
    public function getAllItems();

    //// for check  item is exists or not
    public function existsItem($item = null);

    //// for delete item from
    public function deleteItem($item = null);

    //// for delete all items
    public function deleteAllItems();

}
