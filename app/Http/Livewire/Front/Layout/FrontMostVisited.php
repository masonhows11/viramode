<?php

namespace App\Http\Livewire\Front\Layout;

use App\Models\Product;
use Livewire\Component;


class FrontMostVisited extends Component
{
    public $readyToLoad = false;

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        return view('livewire.front.layout.front-most-visited')
            ->with(['products' =>
                Product::select('id','title_persian','origin_price','slug','thumbnail_image')
                ->where('views', '<>', null)
                ->orderByDesc('views')
                ->take(6)->get()  ]);
    }
}
