<?php

namespace App\Http\Livewire\Front\Layout;

use App\Models\NewestProducts;
use Livewire\Component;

class FrontNewest extends Component
{
    public function render()
    {
        return view('livewire.front.layout.front-newest')
            ->with(['banners' => NewestProducts::take(4)->get() ]);
    }
}
