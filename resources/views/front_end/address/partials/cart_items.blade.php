<div class="col-12">
    <div class="products-compact-slider carousel-md owl-carousel owl-theme">
        @foreach ($cartItems as $product)
            <div class="item">
                <div class="product-card mb-3">
                    <a class="product-thumb"
                        href="{{ route('product', $product->product->slug) }}">

                        @if (
                            $product->product->thumbnail_image &&
                                \Illuminate\Support\Facades\Storage::disk('public')->exists($product->product->thumbnail_image))
                            <img src="{{ asset('storage/' . $product->product->thumbnail_image) }}"
                                alt="Product Thumbnail">
                        @else
                            <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                alt="Product Thumbnail">
                        @endif

                    </a>
                    <div class="product-card-body">
                        <h5 class="product-title">
                            <a href="{{ route('product', $product->product->slug) }}">
                                {{ $product->product->title_persian }}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
