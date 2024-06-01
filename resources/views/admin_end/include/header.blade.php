<div id="kt_header" style="" class="header-admin align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                 id="kt_aside_mobile_toggle">
                <span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
												<path
                                                    d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                                    fill="#000000" opacity="0.3"/>
											</g>
										</svg>
									</span>
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="#" class="d-lg-none">
                @php
                    $model = \App\Models\Setting::first();
                @endphp
                @if( !empty($model->logo) )
                <img alt="Logo" src=" {{ $model !== null ? asset('storage'.$model->logo) : asset('admin_assets/images/no-image-icon-23494.png') }}" class="h-30px"/>
                @else
                    <img alt="Logo" src=" {{ asset('admin_assets/images/no-image-icon-23494.png') }}" class="h-30px"/>
                @endif
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                     data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                     data-kt-drawer-overlay="true"
                     data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                     data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                     data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item me-lg-1">
                            <a class="menu-link active py-3" href="{{ route('home') }}">
                                <span class="menu-title">{{ __('messages.home_page') }}</span>
                            </a>
                        </div>
                        <div class="menu-item me-lg-1">
                            <a class="menu-link active py-3" href="{{ route('admin.dashboard') }}">
                                <span class="menu-title">{{ __('messages.admin_dashboard') }}</span>
                            </a>
                        </div>

                        {{-- start comments menu --}}
                        <livewire:admin.notification.comments-notification >
                        {{-- start comments menu --}}

                        {{-- start notification menu--}}
                        <livewire:admin.notification.messages-notification >
                        {{--end notification menu --}}

                        {{-- start newOrders notification menu--}}
                        <livewire:admin.notification.new-orders-notification>
                        {{-- start newOrders notification menu--}}




                        {{-- start mega menu sample--}}

                        {{--<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                             class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">مگا منو</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown w-100 w-lg-600px p-5 p-lg-5">
                                <div class="row" data-kt-menu-dismiss="true">
                                    <div class="col-lg-4 border-left-lg-1">
                                        <div class="menu-inline menu-column menu-active-bg">
                                            <div class="menu-item">
                                                <a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
                                                    <span class="menu-title">نمونه لینک</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
                                                    <span class="menu-title">نمونه لینک</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
                                                    <span class="menu-title">نمونه لینک</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
                                                    <span class="menu-title">نمونه لینک</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a href="#" class="menu-link">
																		<span class="menu-bullet">
																			<span class="bullet bullet-dot"></span>
																		</span>
                                                    <span class="menu-title">نمونه لینک</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                        {{-- end mega menu sample--}}


                    </div>
                </div>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <!--begin::notification------------------------------------------------>
                    <!--end::notification-------------------------------------------------->
                    <!--begin::user-------------------------------------------------------->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                             data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                             data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <img src="{{ asset('admin_assets/images/150-2.jpg') }}" alt="goodshop"/>
                        </div>
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ asset('admin_assets/images/150-2.jpg') }}"/>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div
                                            class="fw-bolder d-flex align-items-center fs-5">{{ \Illuminate\Support\Facades\Auth::user('admin')->name }}
                                            <span
                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                        </div>
                                        <a href="#"
                                           class="fw-bold text-muted text-hover-primary fs-7">{{ \Illuminate\Support\Facades\Auth::user('admin')->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="{{ route('admin.profile') }}" class="menu-link px-5">پروفایل من</a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="#" class="menu-link px-5">
                                    <span class="menu-text">پروژه ها من</span>
                                    <span class="menu-badge"><span
                                            class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span></span>
                                </a>
                            </div>
                            <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                 data-kt-menu-placement="left-start" data-kt-menu-flip="bottom">
                                <a href="#" class="menu-link px-5">
                                    <span class="menu-title">اشتراک من</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-5">مراجعات</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-5">صورتحساب</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-5">درگاه ها</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="#"
                                           class="menu-link d-flex flex-stack px-5">بیانه ها
                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                               data-bs-toggle="tooltip"
                                               title="اظهارات خود را نمایش دهید"></i></a>
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3">
                                            <label
                                                class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input w-30px h-20px"
                                                       type="checkbox" value="1" checked="checked"
                                                       name="notifications"/>
                                                <span
                                                    class="form-check-label text-muted fs-7">اعلان ها</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item px-5">
                                <a href="#" class="menu-link px-5">من بیانه ها</a>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5 my-1">
                                <a href="#" class="menu-link px-5">اکانت تنظیمات</a>
                            </div>
                            <div class="menu-item px-5">
                                <a href="{{ route('admin.logout') }}" class="menu-link px-5">خروج</a>
                            </div>

                        </div>
                    </div>
                    <!--end::user--------------------------------------------------------------->
                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                             id="kt_header_menu_mobile_toggle">
                            <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<path fill-rule="evenodd" clip-rule="evenodd"
                                                                  d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z"
                                                                  fill="black"/>
															<path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                                  d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z"
                                                                  fill="black"/>
														</g>
													</svg>
												</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
