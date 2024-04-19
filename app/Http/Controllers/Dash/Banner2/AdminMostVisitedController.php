<?php

namespace App\Http\Controllers\Dash\Banner2;

use App\Http\Controllers\Controller;
use App\Models\MostVisited;
use App\Services\ImageService\ImageServiceSave;
use Illuminate\Http\Request;

class AdminMostVisitedController extends Controller
{
    public function create()
    {
        return view('admin_end.admin_most_visited.create');
    }

    public function store(Request $request)
    {
        try {

            $count = MostVisited::count();
            if($count == 5){
                session()->flash('success',__('messages.you_can_upload_only_image',['count' => 5 ]));
                return redirect()->back();
            }
            $banner = new MostVisited();
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
            return redirect()->route('admin.most.visited.index');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }
    }


    public function edit(MostVisited $banner){

        return view('admin_end.admin_most_visited.edit',['banner' => $banner]);
    }


    public function update(Request $request){


        try {
            $banner = MostVisited::findOrFail($request->banner);
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
            return redirect()->route('admin.most.visited.index');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error');
        }
    }
}
