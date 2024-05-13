<?php

namespace App\Http\Livewire\Front\Comment;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class NewComment extends Component
{
    use WithPagination;

    public $product;
    public $product_id;
    public $body;
    public $comment_count;

    protected $paginationTheme = 'bootstrap';

    public function mount($product)
    {

        $this->product = Product::findOrFail($product);
        //        if(Auth::check()){
        //           $this->rated_value = intval(Auth::user()->getRatingValue($this->product));
        //        }


        $this->product_id = $this->product->id;
        $this->comment_count = Comment::where(['product_id' => $this->product_id, 'approved' => 1])->count();

    }

    protected $rules = [
        'body' => ['required', 'min:5', 'max:2000', 'string'],
    ];

    public function addComment()
    {
        $this->validate();
        try {
            Comment::create([
                'user_id' => Auth::id(),
                'product_id' => $this->product_id,
                'body' => $this->body,
            ]);
            $this->body = '';
            session()->flash('success', __('messages.your_comment_has_been_successfully_submitted_and_will_be_displayed_after_review'));
            return null;
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.An_error_occurred'));

        }
        //            return view('errors_custom.model_store_error')
        //                ->with(['error' => $ex->getMessage()]);
        // return redirect()->route('product.details',['product'=> $this->product->slug ]);
        //            $this->dispatchBrowserEvent('show-result',
        //                ['type' => 'success',
        //                    'message' => __('messages.your_comment_has_been_registered_and_will_be_displayed_after_review')]);
    }

    public function render()
    {
        return view('livewire.front.comment.new-comment')
        ->with(['comments' => Comment::where(['product_id' => $this->product_id, 'approved' => 1, 'parent_id' => null])->paginate(10),
                'comments_count' => $this->comment_count,
                'product_id' => $this->product_id]);
    }
}
