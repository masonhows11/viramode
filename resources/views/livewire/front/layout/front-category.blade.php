<div class="row mt-3 mb-5">
    <div class="col-12">
        <div class="category-section dt-sn dt-sl border">
            <div class="category-section-title dt-sl">
                <h3>دسته بندی محصولات</h3>
            </div>
            <div class="category-section-slider dt-sl">
                <div class="category-slider owl-carousel">
                    @foreach($categories as $category)
                        <div class="item">
                            <a href="{{ route('category',$category->slug) }}" class="promotion-category">
                                @if( $category->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists('images/category/'.$category->thumbnail_image ))
                                    <img src="{{ asset('storage/images/category/'.$category->image_path)  }}" height="48"  alt="image_category">
                                @else
                                    <img src="{{  asset('admin_assets/images/no-image-6663.png')  }}"  alt="image_category">
                                @endif
                                <h4 class="promotion-category-name mt-2">{{ $category->title_persian }}</h4>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="item">
                      <a href="#" class="promotion-category">
                          <img src="{{ asset('front_assets/img/category/restaurant-cutlery-circular-symbol-of-a-spoon-and-a-fork-in-a-circle.png') }}"
                               alt="">
                          <h4 class="promotion-category-name">خوردنی و آشامیدنی</h4>
                          <h6 class="promotion-category-quantity">۲۲۰۰۰ کالا</h6>
                      </a>
                  </div>--}}
