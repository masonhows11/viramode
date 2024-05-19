<div class="box">
    <div class="row my-4">

        @foreach ($cartItems as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="product-box-container">
                <div class="product-box product-box-compact">

                    <a href="{{ route('product', $product->product->slug) }}" class="product-box-img">
                        @if ( $product->product->thumbnail_image &&
                                \Illuminate\Support\Facades\Storage::disk('public')->exists($product->product->thumbnail_image))
                            <img class="rounded img-thumbnail" src="{{ asset('storage/' . $product->product->thumbnail_image) }}"
                                alt="Product-Thumbnail">
                        @else
                            <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                alt="Product Thumbnail">
                        @endif

                    </a>
                    <div class="product-box-title">
                        {{ $product->product->title_persian }}
                    </div>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
