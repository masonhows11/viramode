<?php

namespace App\Http\Controllers\Dash\Banner2;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SuggestionProducts;
use Illuminate\Http\Request;


class AdminSuggestionController extends Controller
{
    public function create()
    {
        return view('admin_end.admin_suggestion_products.create');
    }

    public function store(Request $request)
    {
        try {

            $count = SuggestionProducts::count();
            if($count == 8){
                session()->flash('success',__('messages.you_can_upload_only_image',['count' => 8 ]));
                return redirect()->route('admin.suggestion.products.index');
            }

            $product = Product::where('id',$request->product)->first();
            $banner = new SuggestionProducts();
            $banner->title = $product->title_persian;
            $banner->slug = $product->slug;
            $banner->image_path = $product->thumbnail_image;
            $banner->price = $product->origin_price;
            $banner->save();
            //            if($request->has('image_path')){
            //                $imageSave = new ImageServiceSave();
            //                $image_path =  $imageSave->SavePublicCustomPath($request->image_path,'banners');
            //                $banner->image_path = $image_path;
            //            }

            session()->flash('success',__('messages.New_record_saved_successfully'));
            return redirect()->route('admin.suggestion.products.index');
        }catch (\Exception $ex){
              return $ex->getMessage();
            return view('errors_custom.model_store_error');
        }


    }


        //        public function edit(SuggestionProducts $banner){
        //
        //            return view('admin_end.admin_suggestion_products.edit',['banner' => $banner]);
        //        }
        //
        //
        //        public function update(Request $request){
        //
        //            try {
        //                $banner = SuggestionProducts::findOrFail($request->banner);
        //                $product = Product::where('id',$request->product)->first();
        //
        //                $banner->title = $product->title_persian;
        //                $banner->slug = $product->slug;
        //                $banner->image_path = $product->thumbnail_image;
        //                $banner->price = $product->origin_price;
        //                $banner->save();
        //                session()->flash('success',__('messages.The_update_was_completed_successfully'));
        //                return redirect()->route('admin.suggestion.products.index');
        //            }catch (\Exception $ex){
        //                return view('errors_custom.model_store_error');
        //            }
        //        }
}
