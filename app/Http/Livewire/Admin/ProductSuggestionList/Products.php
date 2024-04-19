<?php

namespace App\Http\Livewire\Admin\ProductSuggestionList;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.product-suggestion-list.products')->with([
            'products' =>  $products = Product::where('status',1)
                ->orderByDesc('created_at')
                ->select('id','title_persian','origin_price','thumbnail_image','status')
                ->paginate(10)
        ]);
    }
}
