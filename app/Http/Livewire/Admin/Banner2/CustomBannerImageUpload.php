<?php

namespace App\Http\Livewire\Admin\Banner2;

use Livewire\Component;
use App\Models\Category;
use App\Models\CustomBanner;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;

class CustomBannerImageUpload extends Component
{

    use WithFileUploads;

    public $path;
    public $title;
    public $status;
    public $link;
    public $selectedId;
    protected $paginationTheme = 'bootstrap';


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

    // protected $listeners =
    // [
    //     'selectedIdListener' => 'initialize'
    // ];

    // public function initialize(){
    //    // $this->selectedId = $value;
    //     $this->emit('initializeStyleSelect');
    // }


    public function upload()
    {

        $count = CustomBanner::count();
        if ($count == 4) {

            $this->dispatchBrowserEvent(
                'show-result',
                [
                    'type' => 'success',
                    'message' => __('messages.you_can_upload_only_image', ['count' => 4])
                ]
            );
        } else {


            $this->link = url("/category/{$this->selectedId}");
            $banner = new CustomBanner();
            $banner->title = $this->title;
            $banner->link = $this->link;
            $banner->status = $this->status;

            if ($this->path != null) {

                $image_path = 'images/banners/';
                $image_name =  Date::now()->format('d-m-Y') . '-' . Str::random(20) . '.' . $this->path->getClientOriginalExtension();
                $this->path->storePubliclyAs('images/banners', $image_name, 'public');
                $banner->path = $image_path . $image_name;
            }
            $banner->save();

            session()->flash('messages', __('messages.New_record_saved_successfully'));
            return redirect()->to('/admin/custom-banners/index');
        }
    }




    public function render()
    {
        return view('livewire.admin.banner2.custom-banner-image-upload')
            ->with(['categories' => Category::select('id', 'slug', 'title_english', 'title_persian')->get()]);
    }
}
