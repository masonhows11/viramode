<?php

namespace App\Http\Livewire\Front\Product\Partials_two;

use Livewire\Component;

class AddToCart extends Component
{


    // event for  change price product by change color
    protected $listeners = [
        'selectedVariant' => 'setPriceByVariant',

    ];
    public function setPriceByVariant($name)
    {



    }

    public function render()
    {
        return view('livewire.front.product.partials_two.add-to-cart');
    }
}
