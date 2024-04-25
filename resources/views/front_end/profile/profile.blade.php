@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.profile') }}
@endsection
@section('left_profile_content')


    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="px-3">
                    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                        <h2>اطلاعات شخصی</h2>
                    </div>

                    <div class="profile-section dt-sl">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>نام و نام خانوادگی:</span>
                                </div>
                                <div class="value-info">
                                    <span>{{ $user->first_name .' '.$user->last_name }}</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>پست الکترونیک:</span>
                                </div>
                                <div class="value-info">
                                    <span class="{{ $user->email == null ? 'text-danger' : '' }}" >{{ $user->email ? $user->email : __('messages.email_address_not_registered') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>شماره تلفن همراه:</span>
                                </div>
                                <div class="value-info">
                                    <span class="{{ $user->mobile == null ? 'text-danger' : '' }}">{{ $user->mobile ? $user->mobile : __('messages.mobile_number_not_registered')  }}</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>کد ملی:</span>
                                </div>
                                <div class="value-info">
                                    <span class="{{ $user->national_code == null ? 'text-danger' : '' }}" >{{ $user->national_code ? $user->national_code : __('messages.national_code_not_registered') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>دریافت خبرنامه:</span>
                                </div>
                                <div class="value-info">
                                    <span>خیر</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>شماره کارت:</span>
                                </div>
                                <div class="value-info">
                                    <span>-</span>
                                </div>
                            </div>
                        </div>
                        <div class="profile-section-link">
                            <a href="{{ route('user.account.information') }}" class="border-bottom-dt">
                                <i class="mdi mdi-account-edit-outline"></i>
                                ویرایش اطلاعات شخصی
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-12">
                <div class="px-3">
                    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                        <h2>لیست آخرین علاقه‌مندی‌ها</h2>
                    </div>
                    <div class="profile-section dt-sl">
                        <ul class="list-favorites">

                            <li>
                                <a href="#">
                                    <img src="{{ asset('front_assets/img/products/016.jpg') }}" alt="">
                                    <span>کت مردانه مجلسی مدل k-m-5500</span>
                                </a>
                                <button>
                                    <i class="mdi mdi-trash-can-outline"></i>
                                </button>
                            </li>
                        </ul>
                        <div class="profile-section-link">
                            <a href="#" class="border-bottom-dt">
                                <i class="mdi mdi-square-edit-outline"></i>
                                مشاهده و ویرایش لیست مورد علاقه
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>آخرین سفارش‌ها</h2>
                </div>
                <div class="dt-sl">
                    <div class="table-responsive">
                        <table class="table table-order">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>شماره سفارش</th>
                                    <th>تاریخ ثبت سفارش</th>
                                    <th>مبلغ قابل پرداخت</th>
                                    <th>مبلغ کل</th>
                                    <th>عملیات پرداخت</th>
                                    <th>جزییات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>DDC-57456951</td>
                                    <td>۳۱ مرداد ۱۳۹۸</td>
                                    <td>۰</td>
                                    <td>۹,۹۸۹,۰۰۰ تومان</td>
                                    <td>لغو شده</td>
                                    <td class="details-link">
                                        <a href="#">
                                            <i class="mdi mdi-chevron-left"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="link-to-orders" colspan="7"><a href="#">مشاهده لیست سفارش
                                            ها</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="profile-card">
        <div class="row">

            <div class="col-lg-6"><!-- start personal info box -->
                <p class="font-13"> اطلاعات کاربری </p>
                <div class="card font-13 text-center">
                    <div class="row mx-0 ">
                        <div class="col-6 pt-2 border-bottom border-end"><p> {{ __('messages.full_name') }} :</p>
                            <p>{{ $user->first_name .' '.$user->last_name }}</p></div>
                        <div class="col-6 pt-2 border-bottom"><p>{{ __('messages.email') }} :</p>
                            <p class="{{ $user->email == null ? 'text-danger' : '' }}">{{ $user->email ? $user->email : __('messages.email_address_not_registered') }}</p>
                        </div>
                        <div class="col-6 pt-2 border-bottom border-end"><p>{{ __('messages.mobile') }} :</p>
                            <p class="{{ $user->mobile == null ? 'text-danger' : '' }}">{{ $user->mobile ? $user->mobile : __('messages.mobile_number_not_registered')  }}</p>
                        </div>
                        <div class="col-6 pt-2 border-bottom"><p class=""> {{ __('messages.national_code') }} :</p>
                            <p class="{{ $user->national_code == null ? 'text-danger' : '' }}">{{ $user->national_code ? $user->national_code : __('messages.national_code_not_registered') }}</p>
                        </div>
                        <div class="col-6 pt-2 border-end"><p>{{ __('messages.subscribe_to_newsletter') }} :</p>
                            <p>بله</p></div>
                        <div class="col-6 pt-2"><p>: {{ __('messages.credit_card_number') }}</p>
                            <p>-</p></div>
                    </div>
                </div>
                <a href="{{ route('user.account.information') }}" class="profile-edit-link"><i
                        class="fa fa-edit align-middle"></i> ویرایش اطلاعات شخصی</a>
            </div><!-- end personal info box -->

            <div class="col-lg-6"><!-- start recent fav list -->
                <p class="font-13">لیست آخرین علاقه‌مندی‌ها</p>
                <div class="card">
                    @forelse($products as $product)
                        <div class="profile-recent-fav">
                            <a href="{{ route('product.details',$product->slug) }}"><img src="{{ asset('storage/' . $product->thumbnail_image) }}" alt="product-image"
                                             class="profile-recent-fav-img"></a>
                            <div>
                                <a href="{{ route('product.details',$product->slug) }}">{{ \Illuminate\Support\Str::limit($product->title_persian,50) }}</a>
                                <i class="fa fa-trash font-13"></i>
                                <i class="fa fa-cart-plus font-13"></i>
                            </div>
                        </div>
                    @empty
                        <div class="profile-recent-fav"  style="height: 240px">

                        </div>
                    @endforelse
                </div>
                <a href="{{ route('favorites') }}" class="profile-edit-link"><i class="fa fa-edit align-middle"></i> ویرایش لیست علاقمندی
                    ها</a>
            </div><!-- end recent fav list -->

        </div>
    </div> --}}
@endsection
