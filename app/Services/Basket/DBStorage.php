<?php
namespace App\Services\Basket;

use App\Services\Basket\Contracts\StorageInterface;

class DBStorage implements StorageInterface , Countable
{


    /**
     * Class constructor.
     */
    public function __construct()
    {

        
    }

    //// for test
    //// use cartItems model as basket storage

    //// for get item
    public function getItem($item){

    }

    //// for add item
    public function addItem($item = null, $value){

    }


    //// for get all items
    public function getAllItems(){

    }

    //// for check  item is exists or not
    public function existsItem($item = null){

    }

    //// for delete item from
    public function deleteItem($item = null){

    }

    //// for delete all items
    public function deleteAllItems(){

    }



}
