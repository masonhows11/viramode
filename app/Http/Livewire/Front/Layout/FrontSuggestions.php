<?php

namespace App\Http\Livewire\Front\Layout;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FrontSuggestions extends Component
{
    public function render()
    {
        return view('livewire.front.layout.front-suggestions')
            ->with(['products' => DB::table('suggestion_products')
            ->select('id','title','slug','image_path','price')
            ->take(6)->get() ]);
    }
}
