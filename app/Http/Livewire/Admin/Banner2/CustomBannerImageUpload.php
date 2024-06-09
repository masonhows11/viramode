<?php

namespace App\Http\Livewire\Admin\Banner2;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CustomBannerImageUpload extends Component
{

    use WithFileUploads;


    public $path;
    public $title;
    public $status;
    public $link;

    protected $paginationTheme = 'bootstrap';
    public $banner_id;


    protected $rules = [
        'title' => ['required', 'min:2', 'max:30'],
        'path' =>  ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2000'],
        'link' =>  ['required'],
        'status' => ['required']
    ];

    protected $messages = [
        'path.mimes' => 'فایل انتخاب شده معتبر نمی باشد',
        'path.max' => 'حداکثر حجم فایل ۲ مگابایت',
        'link.required' => 'فیلد دسته بندی الزامی است',
    ];


    public function upload()
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

        $banner->title = $this->title;
        $banner->link = $this->path;
        $banner->status = $this->link;
        $banner->save();


        if($this->path != null ){
            $imageSave = new ImageServiceSave();
            $image_path =  $imageSave->SavePublicCustomPath($this->path,'banners');
            $banner->path = $image_path;
        }

         $this->dispatchBrowserEvent('show-result',
        ['type' => 'success',
            'message' => __('messages.The_changes_were_made_successfully')]);
    }



    public function render()
    {
        return view('livewire.admin.banner2.custom-banner-image-upload')
              ->with([ 'categories' => Category::select('id','slug','title_english','title_persian')->get()]);
    }
}
