<div>


    <div class="swiper mySwiper">
        {{-- main slider content --}}
        <div class="swiper-wrapper">
          <div class="swiper-slide">Slide 1</div>
          <div class="swiper-slide">Slide 2</div>
          <div class="swiper-slide">Slide 3</div>
          <div class="swiper-slide">Slide 4</div>
          <div class="swiper-slide">Slide 5</div>
          <div class="swiper-slide">Slide 6</div>
          <div class="swiper-slide">Slide 7</div>
          <div class="swiper-slide">Slide 8</div>
          <div class="swiper-slide">Slide 9</div>
        </div>

        {{-- navigation slider --}}
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

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
