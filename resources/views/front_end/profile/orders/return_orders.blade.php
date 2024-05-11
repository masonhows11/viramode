@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.all_orders') }}
@endsection
@section('left_profile_content')

    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">

            <div class="col-12">
                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>درخواست مرجوعی</h2>
                </div>
                <div class="dt-sl dt-sn border">
                    <div class="order-return text-center pt-2 pb-2">
                        <p class="text-center">در حال حاضر کالایی برای مرجوع کردن ندارید.</p>
                        <a href="javascript:void(0)" class="border-bottom-dt">مشاهده زمان مرجوعی برای کالاهای مختلف</a>
                    </div>
                </div>
            </div>

            @if($orders->isEmpty())
            <div class="col-12 mt-4">
                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>تاریخچه مرجوعی</h2>
                </div>
                <div class="dt-sl dt-sn border">
                    <div class="order-return text-center pt-2 pb-2">
                        <p class="text-center mb-0">خوشبختانه تا به حال کالایی را مرجوع نکرده‌اید و
                            تاریخچه مرجوعی شما خالی است. 🎉</p>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 mt-4">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                {{ $orders->links() }}
            </div>
            @endif
        </div>
    </div>

@endsection
