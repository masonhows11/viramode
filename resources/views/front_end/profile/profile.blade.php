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
                                    <span>{{ $user->first_name . ' ' . $user->last_name }}</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>پست الکترونیک:</span>
                                </div>
                                <div class="value-info">
                                    @if ($user->email == null)
                                        <div>
                                            <a href="{{ route('email.update.form') }}" class="text-danger">
                                                {{ __('messages.email_address_not_registered') }}
                                            </a>
                                        </div>
                                    @else
                                        <div>
                                            {{ $user->email }}
                                        </div>
                                        <div>
                                            <a href="{{ route('email.update.form') }}" class="text-info">
                                                {{ __('messages.edit_model') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>شماره موبایل:</span>
                                </div>
                                <div class="value-info">
                                    @if ($user->mobile == null)
                                        <div>
                                            <a href="{{ route('mobile.update.form') }}" class="text-danger">
                                                {{ __('messages.mobile_number_not_registered') }}
                                            </a>
                                        </div>
                                    @else
                                        <div>
                                            {{ $user->mobile }}
                                        </div>
                                        <div>
                                            <a href="{{ route('mobile.update.form') }}" class="text-info">
                                                {{ __('messages.edit_model') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>کد ملی:</span>
                                </div>
                                <div class="value-info">
                                    @if ($user->national_code == null)
                                        <span>
                                            <a href="{{ route('user.account.information') }}" class="text-danger">
                                                {{ __('messages.national_code_not_registered') }}
                                            </a>
                                        </span>
                                    @else
                                        <span>
                                            {{ $user->national_code }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="label-info">
                                    <span>آدرس ها:</span>
                                </div>
                                <div class="value-info">
                                    @if ($user->addresses->isEmpty())
                                        <span>
                                            <a href="{{ route('profile.address.index') }}" class="text-danger">
                                                {{ __('messages.addresses_not_found') }}
                                            </a>
                                        </span>
                                    @else
                                        <span>
                                            <a href="{{ route('profile.address.index') }}" class="text-dark">
                                                {{ __('messages.list_address') }}
                                            </a>
                                        </span>
                                    @endif
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

                            @foreach ($products as $product)
                                <li>
                                    <a href="{{ route('product', $product->slug) }}">

                                        @if ( $product->thumbnail_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_image))
                                            <img src="{{ asset('storage/' . $item->product->thumbnail_image) }}" alt="thumbnail-product">
                                        @else
                                            <img src="{{ asset('default_image/no-image-icon-23494.png') }}"alt="thumbnail-product">
                                        @endif
                                        <span>{{ $product->title_persian }}</span>

                                    </a>

                                    <form action="{{ route('favorites.delete', $product) }}" method="get"
                                                class="d-inline favorites-form">
                                                @csrf
                                                <button type="submit" class="delete-item remove-btn">
                                                    <i class="mdi mdi-trash-can-outline" id="delete-item"></i>
                                                </button>
                                    </form>
                                </li>
                            @endforeach


                        </ul>
                        <div class="profile-section-link">
                            <a href="{{ route('favorites') }}" class="border-bottom-dt">
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
                                    <th>عملیات پرداخت</th>
                                    <th>جزییات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ jdate($order->created_at) }}</td>
                                        <td> {{ priceFormat($order->order_final_amount) }} {{ __('messages.toman') }}</td>
                                        <td>{{ $order->order_status_value }}</td>
                                        <td class="details-link">
                                            <a href="{{ route('order.details', [$order->id, $order->order_number]) }}">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">
                                            <p class="text-center h5">{{ __('messages.not_record_found') }}</p>
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td class="link-to-orders" colspan="7">
                                        <a href="{{ route('all.orders') }}">مشاهده لیست سفارش ها</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
