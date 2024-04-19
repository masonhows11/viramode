<?php

namespace App\Http\Controllers\Dash\Banner2;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest\CreateBannerRequest;
use App\Models\BestSeller;
use App\Services\ImageService\ImageServiceSave;
use Illuminate\Http\Request;

class AdminBestSellerController extends Controller
{
    public function create()
    {
        return view('admin_end.admin_best_seller.create');
    }

    public function store(CreateBannerRequest $request)
    {
        try {
            $count = BestSeller::count();
            if($count == 5){
                session()->flash('success',__('messages.you_can_upload_only_image',['count' => 5 ]));
                return redirect()->route('admin.top.banner.index');
            }
            $banner = new BestSeller();
            if($request->has('image_path')){
                $imageSave = new ImageServiceSave();
                $image_path =  $imageSave->SavePublicCustomPath($request->image_path,'sliders');
                $banner->image_path = $image_path;
            }
            $banner->title = $request->title;
            $banner->url = $request->url;
            $banner->status = $request->status;
            $banner->save();
            session()->flash('success',__('messages.New_record_saved_successfully'));
            return redirect()->back('admin.best.seller.index');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }


    }


    public function edit(BestSeller $banner){

        return view('admin_end.admin_best_seller.edit',['banner' => $banner]);
    }


    public function update(Request $request){

        try {
            $banner = BestSeller::findOrFail($request->banner);
            if($request->has('image_path')){
                ImageServiceSave::deleteOldPublicImage($banner->image_path);
                $imageSave = new ImageServiceSave();
                $image_path =  $imageSave->SavePublicCustomPath($request->image_path,'sliders');
                $banner->image_path = $image_path;
            }
            $banner->title = $request->title;
            $banner->url = $request->url;
            $banner->status = $request->status;
            $banner->save();

            session()->flash('success',__('messages.The_update_was_completed_successfully'));
            return redirect()->route('admin.best.seller.index');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }
    }
}
