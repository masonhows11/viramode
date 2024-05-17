<div class="row mt-3 mb-5">

    <div class="col-md-3 col-sm-6 col-6 mb-2">
        <div class="widget-banner">
            <a href="#">
                <img class="rounded" src="{{ asset('front_assets/img/banner/small-banner-5.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-6 mb-2">
        <div class="widget-banner">
            <a href="#">
                <img class="rounded" src="{{ asset('front_assets/img/banner/small-banner-6.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-6 mb-2">
        <div class="widget-banner">
            <a href="#">
                <img class="rounded" src="{{ asset('front_assets/img/banner/small-banner-7.jpg') }}" alt="">
            </a>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-6 mb-2">
        <div class="widget-banner">
            <a href="#">
                <img class="rounded" src="{{ asset('front_assets/img/banner/small-banner-8.jpg') }}" alt="">
            </a>
        </div>
    </div>

</div>
{{--
<div>
    @empty($banners)
        <p class="text-center">{{ __('messages.no_data_for_show') }}</p>
    @else
        <div class="row">
            @foreach( $banners as $banner)
            <div class="col-xxl-6 col-xl-6 col-md-6 mb-3">
                <a href="{{ $banner->url }}" target="_blank" class="d-block w-100">
                    <img src="{{ $banner->image_path }}" alt="banner" class="ads-img">
                </a>
            </div>
            @endforeach
        </div>
    @endif
</div>
--}}
