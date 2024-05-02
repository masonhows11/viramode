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
                        <a href="#" class="border-bottom-dt">مشاهده زمان مرجوعی برای کالاهای مختلف</a>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
    
@endsection
