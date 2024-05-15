@extends( 'front_end.layouts.master_front')
@section( 'page_title')
    {{ $product->title_persian }}
@endsection
@section('main_content')

    <main class="main-content dt-sl mb-3">
        <div class="container main-container">

            <!-- Start title - breadcrumb -->
            @include('front_end.product.partials.breadcrumb_product',['productCategories' => $productCategories])
            <!-- End title - breadcrumb -->


            <!-- Start Product -->
            <div class="dt-sn mb-5 dt-sl">

                <div class="row mb-5">

                    <div class="col-lg-4 col-md-6 ps-relative ">

                        <ul class="gallery-options">
                            {{-- @include('front_end.product.partials.add_to_favorites',['product' => $product]) --}}
                        </ul>
                        {{--  @include('front_end.product.partials.special_sale')--}}

                        <!-- start product gallery -->
                         @include('front_end.product.partials.product_gallery',['product' => $product])
                        <!-- end product gallery -->

                    </div>


                    <!--start Product Info -->
                    <div class="col-lg-8 col-md-6 py-2">
                        <div class="product-info dt-sl">
                            <div class="product-title dt-sl mb-3">
                                <h1>{{ $product->title_persian }}</h1>
                                <h3>{{ $product->title_english }}</h3>
                            </div>

                            <div class="row">
                                <!-- first col -->

                                <div class="col-lg-6">
                                        <!-- start product variants -->
                                        {{--  <livewire:front.product.partials_two.product-variant-select :product="$product"/>  --}}
                                        <!-- end product variants  -->

                                        

                                        <!-- start product feature -->
                                        @include('front_end.product.partials.product_features',['product' => $product])
                                        <!-- end product feature -->
                                </div>
                                <!-- second col -->
                                <div class="col-lg-6">
                                    <livewire:front.product.partials_two.add-to-cart :productId="$product->id"/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="dt-sn mb-5  dt-sl pt-0">
                        <livewire:front.comment.new-comment :product="$product->id"/>
                    </div>

                </div>
            </div>

            <!-- start sellers -->
            {{--   @include('front_end.product.partials.sellers_section')--}}
            <!-- end sellers -->

            <!-- start tabs -->
            {{-- <div class="dt-sn mb-5 px-0 dt-sl pt-0">
                <section class="tabs-product-info mb-3 dt-sl">
                    @include('front_end.product.partials.product_tab_section_links')
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        @include('front_end.product.partials.product_description')
                        @include('front_end.product.partials.product_specifications')
                        @include('front_end.product.partials.product_comments')
                        @include('front_end.product.partials.product_answer_question')
                    </div>
                </section>
            </div> --}}

             <!-- End tabs -->
            <!-- End Product -->


            <!-- Start Product-Slider -->
            @if($relatedProducts->isNotEmpty())
            <section class="slider-section dt-sl mb-5">
               @include('front_end.product.partials.product_related_products',['relatedProducts' => $relatedProducts])
            </section>
            @endif
            <!-- End Product-Slider -->
        </div>
    </main>


    <!-- end main -->


    {{-- toast section for add to favorites    --}}
    {{-- <div class="toast position-fixed ms-4" data-delay="7000"
          style="z-index: 9999999;left:1.5rem;top:3rem;width: 24rem;max-width: 80%">
         <div class="toast-header">
             <strong class="me-auto">{{ __('messages.site_name') }}</strong>
             <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
         </div>
         <div class="toast-body">
             {{ __('messages.for_add_to_favorites_you_must_login') }}
         </div>
     </div>--}}


@endsection
@push('front_custom_scripts')

    <script>
        $(document).ready(function () {
            //  add to compare list
            $('.add-to-compare-list').click(function () {
                let url = $(this).attr("data-url");
                let element = $(this);
                let product = $(this).attr("data-product");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        product: product
                    }
                }).done(function (result) {

                    if (result.status === 1)    // for add to compare
                    {
                        $(element).removeClass('text-dark');
                        $(element).addClass('text-danger');
                        $(element).removeClass('far');
                        $(element).addClass('fa-solid');
                        // below code for add style with rule:value like color:tomato
                        $(element).attr('style', "color:tomato");
                        $(element).attr('title', "{{ __('messages.remove_from_compare') }}");

                    } else if (result.status === 2)   // for remove from compare
                    {
                        $(element).removeClass('text-danger');
                        $(element).addClass('text-dark');
                        $(element).removeClass('fa-solid');
                        $(element).addClass('far');
                        $(element).removeAttr('style');
                        $(element).attr('title', "{{ __('messages.add_to_compare') }}");

                    } else if (result.status === 3) {
                        // for user not login
                        // $('.toast').toast('show');
                    }
                })
            })

        })
    </script>
    <script>
        $(document).ready(function () {
            //  add to favorites
            $('.add-to-fav-product').click(function () {
                let url = $(this).attr("data-url");
                let element = $(this);
                let product = $(this).attr("data-product");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        product: product
                    }
                }).done(function (result) {

                    if (result.status === 1)    // for add to fave
                    {
                        $(element).removeClass('text-dark');
                        $(element).addClass('text-danger');
                        $(element).removeClass('far');
                        $(element).addClass('fa-solid');
                        // below code for add style with rule:value like color:tomato
                        $(element).attr('style', "color:tomato");
                        $(element).attr('title', "{{ __('messages.remove_from_favorites') }}");

                    } else if (result.status === 2)   // for remove from fave
                    {
                        $(element).removeClass('text-danger');
                        $(element).addClass('text-dark');
                        $(element).removeClass('fa-solid');
                        $(element).addClass('far');
                        $(element).removeAttr('style');
                        $(element).attr('title', "{{ __('messages.add_to_favorites') }}");

                    } else if (result.status === 3)  // for user not login
                    {
                        // $('.toast').toast('show');
                    }
                })
            })

        })
    </script>
@endpush
