<?php

namespace App\Http\Livewire\Front\Layout;


use App\Models\Product;
use Livewire\Component;


class FrontBestSellers extends Component
{
    public $readyToLoad = false;

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        return view('livewire.front.layout.front-best-sellers')
            ->with(['products' =>
                 Product::select('id','title_persian','origin_price','slug','thumbnail_image')
                ->orderByDesc('number_sold')
                ->take(6)
                ->get()   ] );


    }
}
