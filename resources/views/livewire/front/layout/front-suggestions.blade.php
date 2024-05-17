@if($products->isNotEmpty())
<div>
    <section class="dt-sl dt-sn mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-sm-title title-wide no-after-title-wide">
                    <h2>پیشنهاد ما</h2>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-horizontal-product border-bottom rounded-0">
                                <div class="card-horizontal-product-thumb">
                                    <a href="{{ route('product',$product->slug) }}">
                                        @if( $product->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->image_path))
                                            <img class="rounded img-thumbnail" src="{{  asset('storage/'.$product->image_path)  }}" alt="product-image">
                                        @else
                                            <img class="rounded" src="{{ asset('default_image/no-image-icon-23494.png') }}" alt="product-no-image">
                                        @endif

                                    </a>
                                </div>
                                <div class="card-horizontal-product-content">
                                    <div class="card-horizontal-product-title">
                                        <a href="{{ route('product',$product->slug) }}">
                                            <h3>{{ $product->title }}</h3>
                                        </a>
                                    </div>
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                    <div class="card-horizontal-product-price">
                                        <span>{{ number_format($product->price) }} {{ __('messages.toman') }}</span>
                                    </div>
                                    <div class="card-horizontal-product-buttons">
                                        <a href="{{ route('product',$product->slug) }}" class="btn btn-outline-info">جزئیات محصول</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach


        </div>
    </section>
</div>
@endif

