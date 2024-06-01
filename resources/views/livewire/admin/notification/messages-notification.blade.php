<div data-kt-menu-trigger="click" id="notification-section" data-kt-menu-placement="bottom-end"
    class="menu-item menu-lg-down-accordion me-lg-1">
    <span class="menu-link py-3">
        <span class="menu-title">
            {{ __('messages.messages') }}
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3"
                    d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                    fill="currentColor" />
                <path
                    d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                    fill="currentColor" />
            </svg>
        </span>
        <span class="menu-title ms-4">
            {{ $notifications->count() !== 0 ? $notifications->count() : '0' }}
        </span>

        <span class="menu-arrow d-lg-none"></span>
    </span>
    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown w-100 w-lg-600px p-5 p-lg-5">
        <div class="row" data-kt-menu-dismiss="true">

            <div class="col border-left-lg-1">
                <div class="menu-inline menu-column menu-active-bg">

                    @if ($notifications->count() !== 0)
                        @foreach ($notifications as $notification)
                            <div class="menu-item bg-light-info my-2">
                                <p class="mx-2">
                                    {{ $notification['data']['message'] }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="menu-item">
                            {{ __('messages.no_new_messages') }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
