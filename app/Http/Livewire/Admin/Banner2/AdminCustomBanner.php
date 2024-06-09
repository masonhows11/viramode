<?php

namespace App\Http\Livewire\Admin\Banner2;


use Livewire\Component;
use App\Models\CustomBanner;
use Livewire\WithPagination;

use App\Services\ImageService\ImageServiceSave;

class AdminCustomBanner extends Component
{

    use WithPagination;
    public $banner_id;



    public function status($id)
    {

        $banner = CustomBanner::findOrFail($id);
        if ($banner->status == 0) {
            $banner->status = 1;
        } else {
            $banner->status = 0;

        }
        $banner->save();

        //return redirect()->to('admin/banner/index');

        $this->dispatchBrowserEvent('show-result',
            ['type' => 'success',
                'message' => __('messages.The_changes_were_made_successfully')]);
    }

    public function deleteConfirmation($id)
    {
        $this->banner_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    protected $listeners = [
        'deleteConfirmed' => 'deleteModel',
    ];

    public function deleteModel()
    {
        try {

            $model = CustomBanner::findOrFail($this->banner_id);
            ImageServiceSave::deleteOldPublicImage($model->image_path);
            $model->delete();
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => __('messages.The_deletion_was_successful')]);
        } catch (\Exception $ex) {
            return view('errors_custom.model_not_found');
        }
        return null;
    }
    public function render()
    {
        return view('livewire.admin.banner2.admin-custom-banner')
        ->extends('admin_end.include.master_dash')
        ->section('dash_main_content')
        ->with(['banners' => CustomBanner::paginate(10)]);
    }
}
