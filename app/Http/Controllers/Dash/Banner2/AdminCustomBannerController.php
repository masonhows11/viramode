<?php

namespace App\Http\Controllers\Dash\Banner2;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCustomBannerController extends Controller
{
    //

    public function create(){

        $categories = Category::select('id','slug','title_english','title_persian')->get();
        return view('admin_end.admin_custom_banner.create',['categories' => $categories]);
    }


    public function store(Request $request)
    {


        $count = CustomBanner::count();
        if($count == 4){

            $this->dispatchBrowserEvent('show-result',
            ['type' => 'success',
             'message' => __('messages.you_can_upload_only_image',['count' => 4 ])]);
        }

        $url = url("/category/{$this->link}");
        dd($url);

        $banner = new CustomBanner();
        if($this->path != null ){
            $imageSave = new ImageServiceSave();
            $image_path =  $imageSave->SavePublicCustomPath($this->path,'banners');
            $banner->path = $image_path;
        }
        $banner->title = $this->title;
        $banner->link = $this->path;
        $banner->status = $this->link;
        $banner->save();

        // $this->dispatchBrowserEvent('show-result',
        // ['type' => 'success',
        //     'message' => __('messages.The_changes_were_made_successfully')]);


        return redirect()->route('admin.newest.product.index');
    }
}
