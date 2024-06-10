<?php

namespace App\Http\Livewire\Front\Layout;

use Livewire\Component;
use App\Models\CustomBanner;

class FrontCustomBanner extends Component
{
    public function render()
    {
        return view('livewire.front.layout.front-custom-banner')
        ->with(['banners' => CustomBanner::where('status',1)->get()]);
    }
}
