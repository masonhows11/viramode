<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    //

    public  function products()
    {


       $products =  Product::select('id','title_persian','origin_price','slug','thumbnail_image')
                ->orderByDesc('number_sold')
                ->take(6)
                ->get();

        return response()->json([ 'products' => $products]);


    }
}
