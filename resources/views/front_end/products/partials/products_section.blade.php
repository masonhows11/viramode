
    @foreach ($products as $product )
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1">
        <div class="product-card mb-2 mx-res-0">
            <div class="product-head">
                <div class="rating-stars">
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                </div>
            </div>

            <a class="product-thumb" href="{{ route('product',$product->slug) }}">
                @if( $product->thumbnail_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_image ) )
                    <img class="rounded img-thumbnail" src="{{ asset('storage/'.$product->thumbnail_image) }}"
                         alt="Product Thumbnail">
                @else
                    <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                         alt="Product Thumbnail">
                @endif
            </a>

            <div class="product-card-body">
                <h6 class="product-title">
                    <a class="text-center" style="font-size: 1rem" href="{{ route('product',$product->slug) }}">{{ $product->title_persian }}</a>
                </h6>
                @foreach ( $product->categories as $category )
                <a class="product-meta mr-3" href="javascript:void(0)">{{ $category->title_persian }}</a>
                @endforeach
                <span class="product-price mr-3" >{{ number_format($product->origin_price) . ' ' . __('messages.toman') }}</span>
            </div>
        </div>
    </div>
    @endforeach


    {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
        <div class="product-card mb-2 mx-res-0">
            <div class="promotion-badge">
                فروش ویژه
            </div>
            <div class="product-head">
                <div class="rating-stars">
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                </div>
                <div class="discount">
                    <span>20%</span>
                </div>
            </div>
            <a class="product-thumb" href="shop-single.html">
                <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
            </a>
            <div class="product-card-body">
                <div class="add-to-compare">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"
                            id="customCheck100">
                        <label class="custom-control-label"
                            for="customCheck100">مقایسه</label>
                    </div>
                </div>
                <h5 class="product-title">
                    <a href="shop-single.html">مانتو زنانه</a>
                </h5>
                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                <span class="product-price">157,000 تومان</span>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
        <div class="product-card mb-2 mx-res-0">
            <div class="product-head">
                <div class="rating-stars">
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                    <i class="mdi mdi-star active"></i>
                </div>
            </div>
            <a class="product-thumb" href="shop-single.html">
                <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
            </a>
            <div class="product-card-body">
                <div class="add-to-compare">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"
                            id="customCheck101">
                        <label class="custom-control-label"
                            for="customCheck101">مقایسه</label>
                    </div>
                </div>
                <h5 class="product-title">
                    <a href="shop-single.html">کت مردانه</a>
                </h5>
                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                <span class="product-price">199,000 تومان</span>
            </div>
        </div>
    </div> --}}


