<?php

namespace App\Http\Livewire\Front\Product\Partials_two;


use App\Models\Product;
use Livewire\Component;

class ProductVariantSelect extends Component
{
    public $product;
    public $product_id;
    public $variant_name;
    public $variant_type;
    public $variantId;

    public function mount($product)
    {
        $this->product_id = $product->id;
        $this->product = Product::findOrFail($this->product_id);
        foreach ($product->values()->get() as $value) {
            $this->variant_name = $value->attribute->title;
            $this->variant_type = $value->attribute->type;
            // array_push($this->variants,['id' => $value->id , 'value' => $value->value] );
        }
        // dd($this->variants);
        // dd(  $this->variant_name );
    }

    public function selectVariant()
    {
       // dd($this->variantId);

       // $this->emitTo(AddToCart::class,'selectedVariant', $this->variantId);


    }

    public function render()
    {
        return view('livewire.front.product.partials_two.product-variant-select');
    }
}
