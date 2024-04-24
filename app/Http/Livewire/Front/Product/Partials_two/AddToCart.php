<?php

namespace App\Http\Livewire\Front\Product\Partials_two;

use App\Http\Livewire\Front\Cart\CartHeader;
use App\Models\Product;
use App\Services\Basket\Basket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{

    public $product;
    public $productId;
    public $user_id;
    public $number = 1;
    private $basket;

    public function boot()
    {
        $this->basket = resolve(Basket::class);
    }


    public function mount($productId)
    {
        $this->user_id = Auth::id();
        $this->productId = $productId;
        $this->product = Product::findOrFail($productId);

    }

    // event for  change price product by change color
    // protected $listeners = [
    //     'selectedVariant' => 'setPriceByVariant',

    // ];

    // public function setPriceByVariant($name)
    // {

    // }

    public function addToCart()
    {
        if (Auth::check()) {

                $this->basket->add($this->product,$this->number);
                $this->emitTo(CartHeader::class, 'addToCart', $this->number);

                $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => __('messages.add_to_basket_successfully')]);


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
