<?php

namespace App\Http\Livewire\Front\Layout;

use Illuminate\Support\Facades\DB;
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
            ->with(['products' => $this->readyToLoad ? DB::table('products')->where('deleted_at',null)
                ->orderByDesc('views')
                ->select('id','title_persian','origin_price','slug','thumbnail_image')
                ->take(6)->get() : [] , ]);
    }
}
