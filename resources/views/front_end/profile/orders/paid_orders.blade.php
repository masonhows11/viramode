@extends('front_end.profile.master_profile')
@section('page_title')
    سفارشات پرداخت شده
@endsection
@section('left_profile_content')
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
    </div>
    <div class="row">
        {{ $orders->links() }}
    </div>
</div>
@endsection

