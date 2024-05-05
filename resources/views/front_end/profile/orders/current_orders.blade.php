@extends('front_end.profile.master_profile')
@section('page_title')
    سفارشات جاری
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
