 @if($products->isNotEmpty())
<div>
    <section class="slider-section dt-sl mb-5">
        <div class="row mb-3">

            <div class="col-12">
                <div class="section-title text-sm-title title-wide no-after-title-wide">
                    <h2>پر بازدید ترینها</h2>
                </div>
            </div>

            <!-- Start Product-Slider -->
            <div class="col-12">
                <div class="product-carousel carousel-lg owl-carousel owl-theme">

                    @foreach($products as $product)
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                 {{--   <div class="discount">
                                        <span>20%</span>
                                    </div>--}}
                                </div>

                                <a class="product-thumb" href="{{ route('product',$product->slug) }}">
                                    @if( $product->thumbnail_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_image ) )
                                        <img class="rounded img-thumbnail" src="{{ asset('storage/'.$product->thumbnail_image) }}"
                                             alt="Product Thumbnail">
                                    @else
                                        <img  class="rounded" src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                             alt="Product Thumbnail">
                                    @endif
                                </a>


                                <div class="product-card-body">
                                    <h6 class="product-title">
                                        <a href="{{ route('product',$product->slug) }}">{{ $product->title_persian }}</a>
                                    </h6>
                                    {{-- <a class="product-meta" href="#">لباس زنانه</a> --}}
                                    <span class="product-price">{{ number_format($product->origin_price) }} {{ __('messages.toman') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <!-- End Product-Slider -->

        </div>
    </section>
</div>
 @endif
