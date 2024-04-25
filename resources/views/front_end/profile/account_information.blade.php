@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.account_information') }}
@endsection
@section('left_profile_content')

<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-12">
            <div class="px-3 px-res-0">


                <div  class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>ویرایش اطلاعات شخصی</h2>
                </div>

                <div class="form-ui additional-info dt-sl dt-sn pt-4">
                    <form action="{{ route('user.update.account.information') }}" method="post">
                           @csrf
                        <input type="hidden" name="user" value="{{ $user->id }}">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <div class="form-row-title">
                                    <h3> نام کاربری</h3>
                                </div>
                                <div class="form-row">
                                    <input type="text" name="name" class="input-ui pr-2" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-row-title">
                                    <h3>نام</h3>
                                </div>
                                <div class="form-row">
                                    <input type="text" name="first_name" class="input-ui pr-2" value="{{ $user->first_name }}">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-row-title">
                                    <h3>نام و نام خانوادگی</h3>
                                </div>
                                <div class="form-row">
                                    <input type="text" name="last_name" class="input-ui pr-2" value="{{  $user->last_name  }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-row-title">
                                    <h3>کد ملی</h3>
                                </div>
                                <div class="form-row">
                                    <input type="text" name="national_code" class="input-ui pl-2 text-left dir-ltr" value="{{ $user->national_code }}">
                                </div>
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <div class="form-row-title">
                                    <h3>شماره موبایل</h3>
                                </div>
                                <div class="form-row">
                                    <input type="text" class="input-ui pl-2 text-left dir-ltr"
                                        placeholder="شماره موبایل خود را وارد نمایید"
                                        value="09xxxxxxxxx">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-row-title">
                                    <h3>آدرس ایمیل</h3>
                                </div>
                                <div class="form-row">
                                    <input type="email" class="input-ui pl-2 text-left dir-ltr"
                                        placeholder="آدرس ایمیل خود را وارد نمایید"
                                        value="info@gmail.com">
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6 mb-3">
                                <div class="form-row-title">
                                    <h3>عکس پروفایل</h3>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"
                                                id="inputGroupFile04"
                                                aria-describedby="inputGroupFileAddon04">
                                            <label class="custom-file-label"
                                                for="inputGroupFile04">انتخاب
                                                عکس</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-12 mb-3">
                                <div class="form-row mt-2">
                                    <div class="custom-control custom-checkbox float-right mt-2">
                                        <input type="checkbox" name="news_letter" class="custom-control-input"
                                            id="customCheck4">
                                        <label class="custom-control-label text-justify"
                                            for="customCheck4">
                                            اشتراک در خبرنامه دیدیکالا
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dt-sl">
                            <div class="form-row mt-3 justify-content-end">
                                <button type="submit" class="btn-primary-cm btn-with-icon ml-2">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ثبت اطلاعات کاربری
                                </button>

                            </div>
                        </div>
                    </form>
                    <a href="{{  route('user.profile') }}">
                        <button class="btn-primary-cm bg-secondary">انصراف</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- start personal info edit box -->
    {{-- <div class="profile-card personal-info">
        <p class="font-13">اطلاعات کاربری </p>
        <form action="{{ route('user.update.account.information') }}" method="post">
            @csrf

            <input type="hidden" name="user" value="{{ $user->id }}">

            <div class="row">

                <div class="col mb-3">
                    <label for="name" class="form-label">{{ __('messages.mobile') }} : </label>
                    @if( $user->mobile == null )
                    <div class="text-danger">
                        <a class="text-danger" href="{{ route('mobile.update.form') }}">  {{ __('messages.update_needed')  }}</a>
                    </div>
                    @else
                        <div>
                            {{  $user->mobile }}
                        </div>
                    @endif

                </div>
                <div class="col mb-3">
                    <label for="name" class="form-label">{{ __('messages.email') }} : </label>

                    @if( $user->email == null )
                    <div class="text-danger">
                        <a class="text-danger" href="{{ route('email.update,form') }}"> {{  __('messages.update_needed') }} </a>
                    </div>
                    @else
                        <div>
                            {{ $user->email  }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">نام کاربری : </label>
                    <input type="text" name="name" class="form-control form-control-lg" id="name"
                           value="{{ $user->name }}">
                    @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label for="national_code" class="form-label">کد ملی : </label>
                    <input type="text" name="national_code" class="form-control form-control-lg" id="national_code"
                           value="{{ $user->national_code }}">
                    @error('national_code')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="first_name" class="form-label">نام :</label>
                    <input type="text" name="first_name" class="form-control form-control-lg" id="first_name"
                           value="{{ $user->first_name }}">
                    @error('first_name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label for="last_name" class="form-label"> نام خانوادگی :</label>
                    <input type="text" name="last_name" class="form-control form-control-lg" id="last_name"
                           value="{{ $user->last_name }}">
                    @error('last_name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label for="news" class="form-label">دریافت خبرنامه :</label>
                    <select class="form-select" id="news">
                        <option>بله</option>
                        <option>خیر</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-info text-white font-13 float-end">ثبت اطلاعات</button>
                </div>
            </div>
        </form>

    </div> --}}

@endsection

