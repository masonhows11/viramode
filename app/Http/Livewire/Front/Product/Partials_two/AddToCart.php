<?php

namespace App\Http\Livewire\Front\Product\Partials_two;

use App\Http\Livewire\Front\Cart\CartHeader;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{

    public $product;
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findOrfail($productId);

    }

    // event for  change price product by change color
    // protected $listeners = [
    //     'selectedVariant' => 'setPriceByVariant',

    // ];

    // public function setPriceByVariant($name)
    // {

    // }

    public function addToCart($product)
    {
        if (Auth::check()) {



            $this->emitTo(CartHeader::class, 'addToCart', $this->number);
            
        } else {
            return redirect()->route('auth.login.form');
        }

    }

    public function render()
    {
        return view('livewire.front.product.partials_two.add-to-cart')
        ->with(['product' => $this->product]);
    }
}
