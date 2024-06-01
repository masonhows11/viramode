<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" class="menu-item menu-lg-down-accordion me-lg-1">
    <span class="menu-link py-3">
        <span class="menu-title">
            {{ __('messages.comments') }}
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3"
                    d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                    fill="currentColor" />
                <path
                    d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                    fill="currentColor" />
            </svg>
        </span>
        <span class="menu-title ms-4">
            {{ $unseenComments->count() !== 0 ? $unseenComments->count() : '0' }}
        </span>

        <span class="menu-arrow d-lg-none"></span>
    </span>
    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown w-100 w-lg-600px p-5 p-lg-5">
        <div class="row" data-kt-menu-dismiss="true">

            <div class="col border-left-lg-1">
                <div class="menu-inline menu-column menu-active-bg">
                    @if ($unseenComments->count() !== 0)
                        @foreach ($unseenComments as $comment)
                            <div class="menu-item bg-light-info my-2">
                                <a href="#" class="menu-link">
                                    <span class="menu-title">{{ $comment->user->name }}</span>
                                </a>
                                <p class="mx-2">
                                    {{ $comment->body }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="menu-item">
                            {{ __('messages.no_new_comment') }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
