<?php

namespace App\Http\Controllers\Dash\Banner2;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest\CreateBannerRequest;
use App\Http\Requests\BannerRequest\EditBannerRequest;
use App\Models\NewestProducts;
use App\Models\Product;
use App\Services\ImageService\ImageServiceSave;

// use Illuminate\Http\Request;

class AdminNewestController extends Controller
{
    public function create()
    {
        $newestProducts = Product::where('status',1)->orderByDesc('created_at')->select('id','title_persian')->take(10)->get();
        return view('admin_end.admin_newest_products.create',['newestProducts' => $newestProducts]);
    }

    public function store(CreateBannerRequest $request)
    {
        try {

            $count = NewestProducts::count();
            if($count == 4){
                session()->flash('success',__('messages.you_can_upload_only_image',['count' => 4 ]));
                return redirect()->back();
            }
            $product =  Product::where('id',$request->title)->select('title_persian','slug')->first();
            $banner = new NewestProducts();
            if($request->has('image_path')){
                $imageSave = new ImageServiceSave();
                $image_path =  $imageSave->SavePublicCustomPath($request->image_path,'banners');
                $banner->image_path = $image_path;
            }
            $banner->title = $product->title_persian;
            $banner->url = $request->url;
            $banner->slug = $product->slug;
            $banner->status = $request->status;
            $banner->save();
            session()->flash('success',__('messages.New_record_saved_successfully'));
            return redirect()->route('admin.newest.product.index');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }
    }


    public function edit(NewestProducts $banner){

        $newestProducts = Product::where('status',1)->orderByDesc('created_at')
            ->select('id','title_persian','slug')
            ->take(10)->get();
        return view('admin_end.admin_newest_products.edit',['banner' => $banner ,
            'newestProducts' => $newestProducts]);
    }


    public function update(EditBannerRequest $request){
        try {
            $banner = NewestProducts::findOrFail($request->banner);

            $product =  Product::where('id',$request->title)->select('title_persian','slug')->first();
            if($request->has('image_path')){
                ImageServiceSave::deleteOldPublicImage($banner->image_path);
                $imageSave = new ImageServiceSave();
                $image_path =  $imageSave->SavePublicCustomPath($request->image_path,'banners');
                $banner->image_path = $image_path;
            }
            $banner->title = $product->title_persian;
            $banner->url = $request->url;
            $banner->status = $request->status;
            $banner->save();
            session()->flash('success',__('messages.The_update_was_completed_successfully'));
            return redirect()->route('admin.newest.product.index');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }
    }
}
