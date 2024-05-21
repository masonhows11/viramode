@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.order_details') }}
@endsection
@section('left_profile_content')
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div class="profile-navbar">
                    <a href="" class="profile-navbar-btn-back">بازگشت</a>
                    <h4>سفارش <span class="font-en">{{ $order->order_number }}</span>
                        <span> ثبت شده در تاریخ {{ customJalaliDate($order->created_at) }}</span>
                    </h4>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="dt-sl dt-sn border">
                    <div class="row table-draught px-3">

                        <div class="col-md-6 col-sm-12">
                            <span class="title">تحویل گیرنده:</span>
                            <span
                                class="value">{{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}</span>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <span class="title">شماره تماس تحویل گیرنده:</span>
                            <span class="value">{{ $address->mobile }}</span>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <span class="title">کد مرسوله:</span>
                            <span class="value">{{ $order->order_number }}</span>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <span class="title">نحوه ارسال سفارش:</span>
                            <span class="value">{{ $delivery->title }}</span>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <span class="title">هزینه ارسال:</span>
                            <span class="value">{{ priceFormat($delivery->amount) . ' ' . __('messages.toman') }} </span>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <span class="title">مبلغ مرسوله:</span>
                            <span
                                class="value">{{ priceFormat($order->order_final_amount - $delivery->amount) . ' ' . __('messages.toman') }}</span>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <span class="title">مبلغ قابل پرداخت:</span>
                            <span
                                class="value">{{ priceFormat($order->order_final_amount) . ' ' . __('messages.toman') }}</span>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            {{-- <span class="title">مبلغ این مرسوله:</span>
                        <span class="value">۹,۹۸۹,۰۰۰ تومان</span> --}}
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>آیتم های سفارش‌ها</h2>
                </div>
                <div class="dt-sl">
                    <div class="table-responsive">
                        <table class="table table-order table-order-details">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>تصویر</th>
                                    <th>نام محصول</th>
                                    <th>تعداد</th>
                                    <th>قیمت واحد</th>
                                    <th>قیمت کل</th>
                                    <th>تخفیف</th>
                                    <th>قیمت نهایی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order_items as  $item)
                                    <tr>
                                        <td>{{ $order->id }}</td>

                                        <td>
                                            <div class="details-product-area">
                                                <a class="product-thumb"
                                                    href="{{ route('product', $item->product->slug) }}">
                                                    @if (
                                                        $item->product->thumbnail_image &&
                                                            \Illuminate\Support\Facades\Storage::disk('public')->exists($item->product->thumbnail_image))
                                                        <img class="img-fluid img-thumbnail" width="150" height="150"
                                                            src="{{ asset('storage/' . $item->product->thumbnail_image) }}"
                                                            alt="thumbnail-product">
                                                    @else
                                                        <img src="{{ asset('default_image/no-image-icon-23494.png') }}"
                                                            alt="thumbnail-product">
                                                    @endif
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                              {{ $item->product->title_persian }}
                                        </td>

                                        <td>{{ $item->number }}</td>
                                        <td>{{ priceFormat($item->product->origin_price) . ' ' . __('messages.toman') }}
                                        </td>
                                        <td>{{ priceFormat($item->final_total_price) . ' ' . __('messages.toman') }}</td>
                                        <td>۰</td>
                                        <td>{{ priceFormat($item->final_total_price) . ' ' . __('messages.toman') }}</td>
                                        <td>
                                            <a href="{{ route('product', $item->product->slug) }}" role="button"
                                                class="btn btn-info d-block w-100 mb-2">خرید مجدد</a>
                                            <a href="{{ route('product', $item->product->slug) }}" role="button"
                                                class="btn text-light bg-secondary d-block w-100">ثبت نظر</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="profile-card">
        <div class="profile-card">
            <p class="font-13">جزئیات سفارش |<span class="order-code ms-1">{{ $order->order_number }}</span></p>

            <div class="row">
                <div class="col-md-6">

                    @if ($order->payment_type == 0 or $order->payment_type == 1)
                        <p class="font-13"> نام تحویل گیرنده
                            : {{ $order->user->first_name . ' ' . $order->user->last_name }}</p>
                    @elseif(  $order->payment_type == 2)
                        <p class="font-13"> نام تحویل گیرنده
                            : {{ $order->cashPayment->cash_receiver != null ? $order->cashPayment->cash_receiver :  $order->user->first_name . ' ' . $order->user->last_name  }}</p>
                    @endif


                    @if ($order->payment_type == 0 or $order->payment_type == 1)
                        <p class="font-13"> شماره تماس : {{ $order->user->mobile }}</p>
                    @elseif( $order->payment_type == 2 )
                        <p class="font-13 ">شماره تماس
                            : {{  $order->address->mobile != null ? $order->address->mobile : $order->user->mobile   }}</p>
                    @endif

                    @if ($order->address() != null)
                        <p class="font-13">آدرس : {{ $order->address->province->name }}
                            - {{ $order->address->city->name }} - {{ $order->address->address_description }}</p>
                    @else
                        <p class="font-13">آدرس : بدون آدرس</p>
                    @endif

                </div>
                <div class="col-md-6">
                    <p class="font-13"> نحوه ارسال : {{ $order->delivery->title }}</p>
                    <p class="font-13"> وضعیت : <span class="text-success">{{ $order->delivery_status_value }}</span>
                    </p>
                    <p class="font-13"> مبلغ کل مرسوله
                        : {{ priceFormat($order->order_final_amount) }} {{ __('messages.toman') }}</p>
                </div>
            </div>

            <div class="row mt-4">

                @if (count($order_items) > 0)
                    @foreach ($order_items as $item)
                        <div class="col-lg-3 col-6 mb-3">
                            <a href="#">
                                <div class="card custom-card">
                                    <img src="{{ asset('storage/' . $item->product->thumbnail_image) }}" alt="product-image - {{ $item->product->thumbnail_image }}" class="slider-pic">
                                    <div class="card-body">
                                        <a href="#" class="product-title">{{ $item->product->title_persian }}</a>
                                    </div>
                                    <div class="card-body">
                                        <p class="font-12"> تعداد : {{ $item->number }}</p>
                                        <p  class="font-12"> قیمت : {{ priceFormat($item->final_product_price) }} {{ __('messages.toman') }}</p>
                                        <p  class="font-12"> گارانتی : {{ $item->warranty != null ? $item->warranty->guarantee_name : 'بدون گارانتی' }}</p>
                                        <p  class="font-12"> رنگ : {{ $item->color != null ? $item->color->color_name : 'بدون رنگ' }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-3 col-6 mb-3">
                        <p class="text-center"> {{ __('messages.product_not_found') }}</p>
                    </div>
                @endif

            </div>
        </div>
    </div> --}}
@endsection
