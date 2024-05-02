@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.orders') }}
@endsection
@section('left_profile_content')


    <!-- start recent order list -->
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">
                <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>همه سفارش‌ها</h2>
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
                                    <td>2</td>
                                    <td>DKC-45173498</td>
                                    <td>۱۰ خرداد ۱۳۹۸</td>
                                    <td>۰</td>
                                    <td>۱۸,۰۴۹,۰۰۰ تومان</td>
                                    <td>لغو شده</td>
                                    <td class="details-link">
                                        <a href="#">
                                            <i class="mdi mdi-chevron-left"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>DDC-58976951</td>
                                    <td>۲۱ مرداد ۱۳۹۸</td>
                                    <td>۰</td>
                                    <td>۹,۱۸۹,۰۰۰ تومان</td>
                                    <td>لغو شده</td>
                                    <td class="details-link">
                                        <a href="#">
                                            <i class="mdi mdi-chevron-left"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end recent order list -->
    {{-- <div class="profile-card">
        <div class="row mt-2 mb-2">
            <div class="col">
                <ul class="list-group d-flex justify-content-around list-group-horizontal">
                    <li class="list-group-item border-0">
                        <a class="text-decoration-none text-secondary  font-14"
                           href="{{ route('all.orders') }}">{{ __('messages.all_orders') }}</a>
                        <span class="badge bg-secondary">0</span>
                    </li>
                    <li class="list-group-item border-0">
                        <a class="text-decoration-none text-secondary  font-14"
                           href="{{ route('all.orders',['status' => 0 ,'type'=>'wait_for_confirmed']) }}">{{ __('messages.order_wait_for_confirmed') }}</a>
                        <span class="badge bg-secondary">0</span>
                    </li>
                    <li class="list-group-item border-0">
                        <a class="text-decoration-none text-secondary  font-14"
                           href="{{ route('all.orders',['status' => 2 ,'type'=>'order_confirmed']) }}">{{ __('messages.order_confirmed') }}</a>
                        <span class="badge bg-secondary">0</span>
                    </li>
                   <li class="list-group-item border-0">
                        <a class="text-decoration-none text-secondary  font-14"
                           href="{{ route('all.orders',['status' => 3 ,'type'=>'order_delivered']) }}">{{ __('messages.order_delivered') }}</a>
                        <span class="badge bg-secondary">0</span>
                    </li>
                    <li class="list-group-item border-0">
                        <a class="text-decoration-none text-secondary  font-14"
                           href="{{ route('all.orders',['status' => 3 ,'type'=>'order_returned']) }}">{{ __('messages.order_returned') }}</a>
                        <span class="badge bg-secondary">0</span>
                    </li>
                    <li class="list-group-item border-0">
                        <a class="text-decoration-none text-secondary  font-14"
                           href="{{ route('all.orders',['status' => 4 ,'type'=>'order_canceled']) }}">{{ __('messages.order_canceled') }}</a>
                        <span class="badge bg-secondary">0</span>
                    </li>
                </ul>
            </div>
        </div>
        @if( count($orders) > 0)
            @foreach( $orders as $order)
                <div class="row mb-2 mt-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-body  d-flex justify-content-between">

                                <div class="d-flex justify-content-start">
                                    <div class="ms-2">
                                        <p class="card-title font-14">{{ __('messages.order_code') }}
                                            : {{ $order->order_number }} </p>
                                    </div>
                                    <div class="ms-3">
                                        <p class="card-text font-14">{{ __('messages.order_date') }}
                                            : {{ jdate( $order->created_at) }}</p>
                                    </div>
                                    <div class="ms-4">
                                        <p class="card-text font-14">{{ __('messages.order_price') }} {{ priceFormat($order->order_final_amount ) }} {{ __('messages.toman') }}</p>
                                    </div>
                                </div>

                                <div>
                                    <a class="text-decoration-none text-success font-14"
                                       href="{{ route('order.details',$order->id) }}">{{ __('messages.order_details') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row flex-wrap">
                                    @foreach($order->orderItems as $item)
                                        <img src="{{ asset('storage/' . $item->product->thumbnail_image) }}" width="150" height="150" class="img-thumbnail mx-2"  alt="...">
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row mb-5 mt-5">
                <div class="col h-150px">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center mt-5 mb-5">{{ __('messages.no_order_registered') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row d-flex justify-content-center">
            <div class="col-3 mt-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div> --}}
@endsection

