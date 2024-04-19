<?php

namespace App\Http\Livewire\Front\Layout;

// use App\Models\Category;
use Livewire\Component;

class FrontHeader extends Component
{
    // 'categories' => Category::where('status',1)->tree()->get()->toTree(),
    public function render()
    {
        return view('livewire.front.layout.front-header')
            ->with(['user' => auth()->user()]);
    }
}
