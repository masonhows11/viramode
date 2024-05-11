@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.favorites_list') }}
@endsection
@section('left_profile_content')
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

        <div class="row">
            <div class="col-12">
                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>علاقمندی ها</h2>
                </div>

                <div class="dt-sl">
                    <div class="row">

                        @forelse ($products as $product)
                            <div class="col-lg-6 col-md-12">
                                <div class="card-horizontal-product border-bottom rounded-0">
                                    <div class="card-horizontal-product-thumb">

                                        <a class="product-thumb" href="{{ route('product', $product->slug) }}">
                                            @if ($product->thumbnail_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_image))
                                                <img src="{{ asset('storage/' . $product->thumbnail_image) }}"
                                                    alt="thumbnail-product">
                                            @else
                                                <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                                    alt="thumbnail-product">
                                            @endif
                                        </a>

                                    </div>
                                    <div class="card-horizontal-product-content">
                                        <div class="card-horizontal-product-title">
                                            <a href="#">
                                                <h3>{{ $product->title_persian }}</h3>
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
                                            <span>{{ $product->origin_price }} تومان</span>
                                        </div>
                                        <div class="card-horizontal-product-buttons">
                                            <a href="{{ route('product', $product->slug) }}" class="btn">مشاهده محصول</a>
                                            <form action="{{ route('favorites.delete', $product) }}" method="get"
                                                class="d-inline favorites-form">
                                                @csrf
                                                <button type="submit" class="delete-item remove-btn">
                                                    <i class="mdi mdi-trash-can-outline" id="delete-item"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12">
                                <p class="text-center h5">{{ __('messages.not_record_found') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
