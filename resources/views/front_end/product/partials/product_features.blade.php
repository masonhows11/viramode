<div class="product-params dt-sl">


     <div>
         <h6 class="h6">ویژگی های محصول</h6>
         {!! $product->short_description !!}
     </div>

    {{-- <ul data-title="ویژگی‌های محصول">
        <li>
            <span>حافظه داخلی: </span>
            <span> 256 گیگابایت </span>
        </li>
        <li>
            <span>ویژگی‌های خاص: </span>
            <span> مقاوم در برابر آب
                مناسب عکاسی
                مناسب عکاسی سلفی
                مناسب بازی
                مجهز به حس‌گر تشخیص چهره
            </span>
        </li>
    </ul>
    <div class="sum-more">
        <span class="show-more btn-link-border">
            + موارد بیشتر
        </span>
        <span class="show-less btn-link-border">
            - بستن
        </span>
    </div> --}}
</div>
{{--
<p class="mt-4">ویژگی های محصول :</p>
<ul class="font-13 ps-1">
    @foreach ($product->values()->get() as $value)
        <li class="mt-3"><i class="fa fa-check align-middle text-primary me-2"></i>
            {{ $value->attribute->title }} : {{ $value->value }} {{ $value->attribute->unit }}
        </li>
    @endforeach
    @foreach ($product->meta as $item)
        <li class="mt-3"><i class="fa fa-check align-middle text-primary me-2"></i>
            {{ $item->meta_key }} : {{ $item->meta_value }}
        </li>
    @endforeach
</ul>
--}}
