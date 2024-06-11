<div>
    <div class="row   my-5">




            <div dir="rtl"  class="swiper mySwiper py-5 col-lg-11 col-md-10 col-sm-6 col-10">
                {{-- main slider content --}}
                <div class="swiper-wrapper">
                   @foreach ($banners as $banner)
                     <div class="swiper-slide">
                        <a class="" href="{{ $banner->link }}">
                        @if ($banner->path && \Illuminate\Support\Facades\Storage::disk('public')->exists($banner->path))
                            <img class="rounded " src="{{ asset('storage/' . $banner->path) }}" alt="banner-image">
                         @else
                            <img class="rounded" src="{{ asset('default_image/no-image-icon-23494.png') }}" alt="banner-image">
                        @endif
                    </a></div>
                  @endforeach
                </div>
                <div class="swiper-pagination"></div>

                {{-- navigation slider --}}
                {{--
                 <div class="swiper-button-next"></div>
                 <div class="swiper-button-prev"></div>
                --}}
            </div>





    </div>






           {{-- <div class="col-12">
                <div class="">
                    @foreach ($banners as $banner)
                    <div class="item " style="height:320px">

                        <a class="product-thumb" href="{{ $banner->link }}">
                            @if ($banner->path && \Illuminate\Support\Facades\Storage::disk('public')->exists($banner->path))
                                <img class="rounded img-thumbnail"
                                    src="{{ asset('storage/' . $banner->path) }}"
                                    alt="Product Thumbnail">
                            @else
                                <img class="rounded" src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                    alt="Product Thumbnail">
                            @endif
                        </a>

                    </div>
                    @endforeach
                </div>
            </div> --}}

</div>
