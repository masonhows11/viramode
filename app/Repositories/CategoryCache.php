<?php
namespace App\Repositories;



use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryCache{


    CONST CACHE_KEY = 'CATEGORIES';



    public  function all($key)
    {


        $cacheKey = $this->getCacheKey($key);
        return Cache::remember($cacheKey, now()->addMonth(), function () {
           return  Category::tree()->get()->toTree();
        });



    }



    public function getCacheKey($key)
    {

        $key = strtoupper($key);

        return self::CACHE_KEY. '.' . $key;


    }







}
