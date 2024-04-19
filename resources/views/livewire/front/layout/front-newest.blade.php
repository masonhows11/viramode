<div>
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <div class="section-title text-sm-title title-wide-custom no-after-title-wide">
                <h2>جدید ترین ها</h2>
                <a href="#">مشاهده همه</a>
            </div>
        </div>

        <div class="col-12">
            <div class="row row-cols-md-3 row-cols-1">
                @foreach($banners as $banner)
                    <div class="col-md-3 col-sm-6 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="{{ route('product',$banner->slug) }}">
                                @if( $banner->image_path && file_exists(public_path() .$banner->image_path) )
                                <img src="{{ asset($banner->image_path) }}" alt="">
                                @else
                                 <img src="{{ asset('default_image/no-image-icon-23494.png') }}" alt="no-image-found">
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
