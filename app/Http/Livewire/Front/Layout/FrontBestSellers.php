<?php

namespace App\Http\Livewire\Front\Layout;


use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FrontBestSellers extends Component
{
    public function render()
    {
        return view('livewire.front.layout.front-best-sellers')
            ->with(['products' => DB::table('products')->where('deleted_at',null)
                ->orderByDesc('number_sold')
                ->select('id','title_persian','origin_price','slug','thumbnail_image')
                ->take(4)
                ->get() ] );
    }
}
