<?php

namespace App\Http\Livewire\Front\Layout;

use Livewire\Component;

class FrontCustomBanner extends Component
{
    public function render()
    {
        return view('livewire.front.layout.front-custom-banner')
        ->with(['banners' => CustomBanners::where('status',1)->get()]);
    }
}
