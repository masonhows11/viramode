@if ( $images->isNotEmpty()   )
    <div class="product-gallery ">

        <div class="product-carousel   owl-carousel" data-slider-id="1">
            @foreach ( $images as  $key => $slide)
                @if( $slide->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists('images/product/gallery/'. $slide->image_path) )
                    <div class="item">
                        <a class="gallery-item" loading="lazy" href="{{ asset('storage/images/product/gallery/'. $slide->image_path) }}" data-fancybox="gallery-{{ $key }}">
                            <img class="rounded  img-thumbnail"  loading="lazy"
                                src="{{ asset('storage/images/product/gallery/'. $slide->image_path) }}"
                                alt="{{ $slide->image_path. '-' .( $key + 1) }}">
                        </a>
                    </div>
                @else
                    <img loading="lazy" src="{{ asset('default_image/no-image-icon-23494.png') }}"
                         alt="{{  asset('default_image/no-image-icon-23494.png')  }}"
                         class="d-block w-100">
                @endif
            @endforeach
        </div>


        @if($images->count() > 3)
        <div class="d-flex justify-content-center flex-wrap">
            <ul class="product-thumbnails owl-thumbs ml-2" data-slider-id="1">
                @foreach ( $images as $key =>  $slide)
                    <li class="owl-thumb-item  @if( $loop->first ) active @endif">
                        @if( $slide->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists('images/product/gallery/'. $slide->image_path) )
                            <a href="javascript:void(0)" class="border-0">
                                <img loading="lazy"  width="48" height="34" src="{{ asset('storage/images/product/gallery/'. $slide->image_path) }}" alt="{{  $slide->image_path . '-' . ($key + 1) }}">
                            </a>
                        @else
                            <a href="">
                                <img loading="lazy" src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                     alt="{{  asset('default_image/no-image-icon-23494.png')  }}">
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        @endif


    </div>
@else
    <div class=product-gallery">
        <img loading="lazy" src="{{ asset('default_image/no-image-icon-23494.png') }}"
             alt="no-image-product"
             class="d-block w-100">
    </div>
@endif
