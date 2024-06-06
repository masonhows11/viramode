<?php

namespace App\Http\Livewire\Front\Layout;


use Livewire\Component;
// use App\Models\Category;
use Facades\App\Repositories\CategoryCache;

class FrontNavbar extends Component
{

    public function render()
    {
        return view('livewire.front.layout.front-navbar')
                 ->with(['categories' =>  CategoryCache::all('test') ]);
            //   ->with(['categories' => Category::where('status',1)->tree()->get()->toTree()]);
    }
}
