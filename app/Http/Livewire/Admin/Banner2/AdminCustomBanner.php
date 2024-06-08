<?php

namespace App\Http\Livewire\Admin\Banner2;

use Livewire\Component;

class AdminCustomBanner extends Component
{
    public function render()
    {
        return view('livewire.admin.banner2.admin-custom-banner')
        ->extends('admin_end.include.master_dash')
        ->section('dash_main_content');
    }
}
