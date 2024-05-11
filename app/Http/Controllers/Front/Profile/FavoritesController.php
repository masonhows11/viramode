<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Product;


class FavoritesController extends Controller
{
    public function favorites(){

        $products = auth()->user()->products()->select('id','title_persian','thumbnail_image','slug','origin_price')->take(10)->get();
        return view('front_end.profile.favorites',[ 'products' => $products ]);

    }
    public function favoritesDelete(Product $product){
        try {
            $user = auth()->user();
            $user->products()->detach($product->id);
            session()->flash('success',__('messages.The_deletion_was_successful'));
            return redirect()->back();
        }catch (\Exception $ex){
            return view('errors_custom.general_error')
                ->with(['error' => $ex->getMessage()]);
        }
    }
}
