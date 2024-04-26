@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.addresses') }}
@endsection
@section('left_profile_content')
    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
        <div class="row">
            <div class="col-12">

                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>آدرس ها</h2>
                </div>

                <div class="dt-sl">
                    <div class="row">

                        <div class="col-lg-6 col-md-12">
                            <div class="card-horizontal-address text-center px-4">
                                <button class="checkout-address-location" data-toggle="modal" data-target="#modal-location">
                                    <strong>ایجاد آدرس جدید</strong>
                                    <i class="mdi mdi-map-marker-plus"></i>
                                </button>
                            </div>
                        </div>

                        @forelse ( $addresses as $address)
                        <div class="col-lg-6 col-md-12">
                            <div class="card-horizontal-address">
                                <div class="card-horizontal-address-desc">
                                    <h4 class="card-horizontal-address-full-name">{{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}</h4>
                                    <p>
                                        {{ $address->address_description }}
                                    </p>
                                </div>
                                <div class="card-horizontal-address-data">
                                    <ul class="card-horizontal-address-methods float-right">
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-email-outline"></i>
                                             استان: <span>{{   $address->province->name ? $address->province->name : ' - '  }}</span>
                                        </li>
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-email-outline"></i>
                                            شهر : <span>{{ $address->city->name ? $address->city->name : ' - ' }}</span>
                                        </li>
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-email-outline"></i>
                                            کدپستی : <span>{{  $address->postal_code }}</span>
                                        </li>
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-cellphone-iphone"></i>
                                            تلفن همراه : <span>{{ $address->mobile != null ? $address->mobile : $address->user->mobile }}</span>
                                        </li>
                                    </ul>
                                    <div class="card-horizontal-address-actions">
                                        <button class="btn-note" data-toggle="modal"
                                            data-target="#modal-location-edit">ویرایش</button>
                                        <button class="btn-note" data-toggle="modal"
                                            data-target="#remove-location">حذف</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal for create edit remove --}}

    <!-- Start Modal location new -->
    <div class="modal fade" id="modal-location" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">

        <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="now-ui-icons location_pin"></i>
                        افزودن آدرس جدید
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-ui dt-sl">
                                <form class="form-account" action="">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    نام و نام خانوادگی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <input class="input-ui pr-2 text-right" type="text"
                                                    placeholder="نام خود را وارد نمایید">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    شماره موبایل
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <input class="input-ui pl-2 dir-ltr text-left" type="text"
                                                    placeholder="09xxxxxxxxx">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    استان
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <div class="custom-select-ui">
                                                    <select class="right">
                                                        <option value="khrasan-north">
                                                            خراسان شمالی
                                                        </option>
                                                        <option value="tehran">
                                                            تهران
                                                        </option>
                                                        <option value="esfahan">
                                                            اصفهان
                                                        </option>
                                                        <option value="shiraz">
                                                            شیراز
                                                        </option>
                                                        <option value="tabriz">
                                                            تبریز
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    شهر
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <div class="custom-select-ui">
                                                    <select class="right">
                                                        <option value="bojnourd">
                                                            بجنورد
                                                        </option>
                                                        <option value="garme">
                                                            گرمه
                                                        </option>
                                                        <option value="shirvan">
                                                            شیروان
                                                        </option>
                                                        <option value="mane">
                                                            مانه و سملقان
                                                        </option>
                                                        <option value="esfarayen">
                                                            اسفراین
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    آدرس پستی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <textarea class="input-ui pr-2 text-right" placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    کد پستی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <input class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                    type="text" placeholder=" کد پستی را بدون خط تیره بنویسید">
                                            </div>
                                        </div>
                                        <div class="col-12 pr-4 pl-4">
                                            <button type="button" class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                و
                                                ارسال به این آدرس</button>
                                            <button type="button" class="btn-link-border float-left mt-2">انصراف
                                                و بازگشت</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- Google Map Start -->
                            <div class="goole-map">
                                <div id="map" style="height:440px"></div>
                            </div>
                            <!-- Google Map End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Modal location new -->

    <!-- Start Modal location edit -->
    <div class="modal fade" id="modal-location-edit" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <i class="now-ui-icons location_pin"></i>
                        ویرایش آدرس
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-ui dt-sl">
                                <form class="form-account" action="">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    نام و نام خانوادگی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <input class="input-ui pr-2 text-right" type="text"
                                                    placeholder="نام خود را وارد نمایید">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    شماره موبایل
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <input class="input-ui pl-2 dir-ltr text-left" type="text"
                                                    placeholder="09xxxxxxxxx">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    استان
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <div class="custom-select-ui">
                                                    <select class="right">
                                                        <option value="khrasan-north">
                                                            خراسان شمالی
                                                        </option>
                                                        <option value="tehran">
                                                            تهران
                                                        </option>
                                                        <option value="esfahan">
                                                            اصفهان
                                                        </option>
                                                        <option value="shiraz">
                                                            شیراز
                                                        </option>
                                                        <option value="tabriz">
                                                            تبریز
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    شهر
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <div class="custom-select-ui">
                                                    <select class="right">
                                                        <option value="bojnourd">
                                                            بجنورد
                                                        </option>
                                                        <option value="garme">
                                                            گرمه
                                                        </option>
                                                        <option value="shirvan">
                                                            شیروان
                                                        </option>
                                                        <option value="mane">
                                                            مانه و سملقان
                                                        </option>
                                                        <option value="esfarayen">
                                                            اسفراین
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    آدرس پستی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <textarea class="input-ui pr-2 text-right" placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="form-row-title">
                                                <h4>
                                                    کد پستی
                                                </h4>
                                            </div>
                                            <div class="form-row">
                                                <input class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                    type="text" placeholder=" کد پستی را بدون خط تیره بنویسید">
                                            </div>
                                        </div>
                                        <div class="col-12 pr-4 pl-4">
                                            <button type="button" class="btn btn-sm btn-primary btn-submit-form">ثبت
                                                و
                                                ارسال به این آدرس</button>
                                            <button type="button" class="btn-link-border float-left mt-2">انصراف
                                                و بازگشت</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- Google Map Start -->
                            <div class="goole-map">
                                <div id="map-edit" style="height:440px"></div>
                            </div>
                            <!-- Google Map End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal location edit -->

    <!-- Start Modal remove-location -->
    <div class="modal fade" id="remove-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                        این آدرس حذف شود؟</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="remodal-general-alert-button remodal-general-alert-button--cancel"
                        data-dismiss="modal">خیر</button>
                    <button type="button"
                        class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
                </div>
            </div>
        </div>
    </div>


    <!-- End Modal remove-location -->


    {{-- <div class="profile-card"><!-- start address box -->
        <p class="font-13">آدرس ها </p>
        <div class="row">
            @if ($errors->any())
                <div class="d-flex justify-content-start">
                    <div class="my-2 py-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            @forelse ( $addresses as $address)
                <div class="col-md-6 address-list mt-3">
                    <div class="card p-2">
                        <p class="font-13"> نام و نام خانوادگی : {{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}</p>
                        <p class="font-13"> استان : {{ $address->province->name ? $address->province->name : ' - ' }}</p>
                        <p class="font-13"> شهر : {{ $address->city->name ? $address->city->name : ' - ' }}</p>
                        <p class="font-13"> آدرس : {{ $address->address_description }}</p>
                        <p class="font-13"> کد پستی : {{  $address->postal_code }}</p>
                        <p class="font-13"> شماره پلاک : {{  $address->plate_number }}</p>
                        <p class="font-13"> شماره تماس : {{ $address->mobile != null ? $address->mobile : $address->user->mobile }}</p>
                    </div>
                    <div class="card mt-3">
                        <div class="p-2">
                            <form action="{{ route('profile.address.delete', $address) }}" method="get"  class="address-form d-inline">
                                @csrf
                                <button type="submit" class="delete-item border-0 bg-white"><i class="fa fa-trash  font-13 delete-item" id="delete-item"></i></button>
                            </form>
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#change-address-modal-{{ $address->id }} "><i class="fa fa-edit font-13"></i></a>
                        </div>
                    </div>
                </div>
                <!-- start change address modal -->
                <div class="modal fade" id="change-address-modal-{{ $address->id }}">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h6 class="text-muted modal-title">{{ __('messages.edit_address') }}</h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('profile.address.update') }}" method="post" id="edit-address-modal-{{ $address->id }}">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="address" value="{{ $address->id }}">
                                        <div class="col my-3">
                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.recipient_first_name') }}: </label>
                                            <input type="text" name="recipient_first_name" id="recipient_first_name" class="form-control form-control-lg" value="{{ $address->recipient_first_name  }}">
                                        </div>
                                        <div class="col my-3">
                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.recipient_last_name') }}: </label>
                                            <input type="text" name="recipient_last_name" id="recipient_last_name" class="form-control form-control-lg" value="{{ $address->recipient_last_name  }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label ms-2 font-13 light-font">{{ __('messages.province') }}: </label>
                                            <select class="form-select form-select-lg font-13"
                                                    name="province_id"
                                                    id="province-edit-address-{{ $address->id }}">
                                                @foreach ($provinces as $province)
                                                    <option class="font-13" {{ $address->province_id == $province->id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label ms-2 font-13 light-font">{{ __('messages.city') }}: </label>
                                            <select class="form-select form-select-lg font-13" name="city_id" id="city-edit-address-{{ $address->id }}">
                                                <option value="{{ $address->city_id }}" class="font-13">{{ $address->city->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-3">
                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.plate_number') }}: </label>
                                            <input type="text" name="plate_number" id="plate_number" class="form-control form-control-lg" value=" {{ $address->plate_number }}">
                                        </div>
                                        <div class="col my-3">
                                            <label class="form-label ms-2 font-13 light-font"> {{ __('messages.post_code') }}: </label>
                                            <input type="text" name="postal_code" id="postal_code" class="form-control form-control-lg" value="{{ $address->postal_code }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-3">
                                            <label for="mobile" class="form-label ms-2 font-13 light-font">{{ __('messages.mobile') }}: </label>
                                            <input type="text" name="mobile" id="mobile" class="form-control form-control-lg" value="{{ $address->mobile }}">
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <textarea class="form-control" name="address_description" id="address_description" rows="5">{{ $address->address_description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="submit" class="send-btn" value="{{ __('messages.edit_model') }}">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end change address modal -->
            @empty
                <div class="col-md-6">
                    <div class="card p-2">
                       <p class="text-center mb-5 mt-5">{{ __('messages.addresses_not_found') }}</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- start new address modal -->
        <div class="row">
            <div class="col mt-5">
                <div class="card text-center address-box">
                    <a href="#"  data-bs-toggle="modal" data-bs-target="#new-address-modal">
                        <i class="fas fa-map-marker-alt text-muted"></i>
                        <p class="font-13 text-muted">افزودن آدرس جدید</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="new-address-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h6 class="text-muted modal-title">{{ __('messages.add_new_address') }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile.address.store') }}" method="post" id="create-address-modal">
                            @csrf
                            <div class="row">
                                <div class="col my-3">
                                    <label class="form-label ms-2 font-13 light-font">  {{ __('messages.recipient_first_name') }}: </label>
                                    <input type="text" name="recipient_first_name" id="recipient_first_name" class="form-control form-control-lg" placeholder="نام">
                                </div>
                                <div class="col my-3">
                                    <label class="form-label ms-2 font-13 light-font"> {{ __('messages.recipient_last_name') }}: </label>
                                    <input type="text" name="recipient_last_name" id="recipient_last_name" class="form-control form-control-lg" placeholder="نام خانوادگی">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="province-select" class="form-label ms-2 font-13 light-font">{{ __('messages.province') }}: </label>
                                    <select class="form-select form-select-lg font-13" name="province_id" id="province-select">
                                        <option selected>{{ __('messages.choose') }}</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" class="font-13">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="city-new-address" class="form-label ms-2 font-13 light-font">{{ __('messages.city') }}: </label>
                                    <select class="form-select form-select-lg font-13" name="city_id" id="city-new-address">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col my-3">
                                    <label class="form-label ms-2 font-13 light-font">{{ __('messages.plate_number') }}: </label>
                                    <input type="text" name="plate_number" id="plate_number" class="form-control form-control-lg" placeholder="شماره پلاک">
                                </div>
                                <div class="col my-3">
                                    <label class="form-label ms-2 font-13 light-font"> {{ __('messages.post_code') }}: </label>
                                    <input type="text" name="postal_code" id="postal_code" class="form-control form-control-lg" placeholder="کد پستی">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col my-3">
                                    <label for="mobile" class="form-label ms-2 font-13 light-font">{{ __('messages.mobile') }}: </label>
                                    <input type="text" name="mobile" id="mobile" class="form-control form-control-lg" placeholder="موبایل">
                                </div>
                            </div>
                            <div class="row">
                                <div class="my-3">
                                    <textarea class="form-control" name="address_description" id="address_description" rows="5" placeholder=" آدرس"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <input type="submit" class="send-btn" value="ثبت آدرس">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-top-0"></div>
                </div>
            </div>
        </div>
        <!-- end new address modal -->

    </div> --}}
@endsection
@push('front_custom_scripts')
    <script>
        $(document).ready(function() {

            // for create address get cities from province
            $('#province-select').change(function() {
                let id = $('#province-select option:selected').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('get.cities') }}',
                    method: 'GET',
                    data: {
                        id: id
                    }
                }).done(function(data) {

                    if (data.status === 200) {
                        let cities = data.data;
                        $('#city-new-address').empty();
                        cities.map((city) => {
                            $('#city-new-address').append($('<option/>').val(city.id).text(
                                city.name))
                        })
                    } else if (data.status === 404) {
                        $('#city-new-address').empty();
                        console.log(data['data']);
                    }
                }).fail(function(data) {
                    console.log(data['data']);
                });
            });

            // for edit address get cities from province
            var addresses = {!! auth()->user()->addresses !!}
            addresses.map(function(address) {
                let id = address.id;
                var target = `#province-edit-address-${id}`;
                var selected = `${target} option:selected`;
                $(target).change(function() {
                    let id = $(selected).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('get.cities') }}',
                        method: 'GET',
                        data: {
                            id: id
                        }
                    }).done(function(data) {
                        if (data.status === 200) {
                            let cities = data.data;
                            $(`#city-edit-address-${address.id}`).empty();
                            cities.map((city) => {
                                $(`#city-edit-address-${address.id}`).append($(
                                    '<option/>').val(city.id).text(city
                                    .name))
                            })
                        } else if (data.status === 404) {
                            $(`#city-edit-address-${address.id}`).empty();
                            console.log(data['data']);
                        }
                    }).fail(function(data) {
                        console.log(data['data']);
                    });
                });
            });

            // for change background color div " delivery type " selected
            $('#address-radio-select input:radio').change(function() {
                $('.row.address-selected').removeClass('address-selected');
                $(this).closest('.address-select').addClass('address-selected');
            });

            $('#delivery-radio-select input:radio').change(function() {
                $('label.delivery-selected').removeClass('delivery-selected');
                $(this).closest('.delivery-select').next('label').addClass('delivery-selected');
            });

        })
    </script>
@endpush
