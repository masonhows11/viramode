<div class="container main-container">
    <div class="topbar dt-sl">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-6">
                <div class="logo-area">
                    <a href="{{ route('home') }}" class="text-danger">
                        {{ __('messages.site_name') }}
                        {{--  <img src="{{ asset('front_assets/img/logo.png') }}" alt="">  --}}
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 hidden-sm">
                <div class="search-area dt-sl">
                    <form action="{{ route('search.products') }}" method="get" class="search">
                        <input type="text" name="search" placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                        <i class="far fa-search search-icon"></i>
                       {{-- <button class="close-search-result" type="button"><i class="mdi mdi-close"></i></button>--}}
                        {{--<div class="search-result">
                            <ul>
                                <li>
                                    <a href="#">موبایل</a>
                                </li>
                                <li>
                                    <a href="#">مد و پوشاک</a>
                                </li>
                                <li>
                                    <a href="#">میکروفن</a>
                                </li>
                                <li>
                                    <a href="#">میز تلویزیون</a>
                                </li>
                            </ul>
                        </div>--}}
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-6 topbar-left">

                @guest
                    <ul class="nav float-left">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.login.form') }}" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="label-dropdown">ورود / ثبت نام</span>
                                <i class="mdi mdi-account-circle-outline"></i>
                            </a>
                        </li>
                    </ul>
                @endguest

                @auth
                    <ul class="nav float-left">
                        <li class="nav-item account dropdown">
                            <a class="nav-link" href="{{ route('user.profile') }}" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="label-dropdown">حساب کاربری</span>
                                <i class="mdi mdi-account-circle-outline"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    {{ $user->name == null ? $user->email : __('messages.dear_user')  }}
                                </a>
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <i class="mdi mdi-account-card-details-outline"></i>پروفایل
                                </a>
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <span class="float-left badge badge-dark">۴</span>
                                    <i class="mdi mdi-comment-text-outline"></i>پیغام ها
                                </a>
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    <i class="mdi mdi-account-edit-outline"></i>ویرایش حساب کاربری
                                </a>
                                <div class="dropdown-divider" role="presentation"></div>
                                <a class="dropdown-item" href="{{ route('auth.log.out') }}">
                                    <i class="mdi mdi-logout-variant"></i>خروج
                                </a>
                            </div>
                        </li>
                    </ul>

                @endauth

            </div>
        </div>
    </div>
</div>
