<div>
    <div class="container">

        <div class="row">

            <div class="col-12">
                <div class="custom-banner-carousel  owl-theme">
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
            </div>


        </div>

    </div>


</div>
