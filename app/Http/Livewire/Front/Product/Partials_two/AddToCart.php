<?php

namespace App\Http\Livewire\Front\Product\Partials_two;

use App\Http\Livewire\Front\Cart\CartHeader;
use App\Models\Product;
use App\Services\Basket\Contracts\BasketInterface;
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
        $this->basket = resolve(BasketInterface::class);
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

    public function addToCart($product)
    {
        if (Auth::check()) {

            // $this->basket->addItem([
            //     'user_id' => $this->user_id,
            //     'product_id' => $this->productId,
            //     'number' => $this->number
            // ]);


            // $this->emitTo(CartHeader::class, 'addToCart', $this->number);

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
