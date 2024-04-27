@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.addresses') }}
@endsection
@section('left_profile_content')
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">

            <div class="col-12">
                <div class="px-3 px-res-0">

                    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                        <h2>آدرس ها</h2>
                    </div>


                    <div
                        class="d-flex justify-content-start section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                        <a href="{{ route('profile.address.create') }}" class="text-dark">
                            <strong>ایجاد آدرس جدید</strong>
                        </a>
                    </div>



                     <livewire:front.profile.address.index-address>



                </div>
            </div>

        </div>
    </div>
@endsection
@push('front_custom_scripts')
@endpush
