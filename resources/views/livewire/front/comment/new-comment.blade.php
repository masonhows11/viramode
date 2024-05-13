<div>
    <div class="comments-tab dt-sl">

        <div class="dt-sl">
            <div class="row">

                @auth
                    <div class="col-md-12 col-sm-12">
                        <div class="form-question-answer dt-sl mb-3">
                            <form wire:submit.prevent="addComment">

                                <textarea class="form-control mb-3" wire:model="body" rows="5"></textarea>
                                @error('body')
                                    <div class="alert alert-danger mt-4 font-12">
                                        {{ $message }}
                                    </div>
                                @enderror

                                @if (session()->has('error'))
                                    <div class="alert alert-danger mt-4 font-12">
                                        {{ session()->get('error') }}
                                    </div>
                                @elseif(session()->has('success'))
                                    <div class="alert alert-success mt-4 font-12">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-secondary text-white float-right ml-3">ثبت  نظر</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 col-sm-12">
                        <div class="comments-summary-note">
                            <p>برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود</p>
                        </div>
                    </div>
                @endauth


            </div>

            <div class="comments-area dt-sl">

                <div class="section-title text-sm-title title-wide no-after-title-wide mt-2 mb-2 dt-sl">
                    <h2>نظرات کاربران</h2>
                    <p class="count-comment">{{ $comment_count }} نظر</p>
                </div>

                @if ($comments->isNotEmpty())
                    <ol class="comment-list mt-2">
                        @foreach ($comments as $comment)
                            <li>
                                <div class="comment-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 comment-content">

                                            <div class="comment-author">
                                                @if (!empty($comment->user->name))
                                                    {{ $comment->user->name }}
                                                @else
                                                    {{ __('messages.unknown') }}
                                                @endif {{ jalaliDate($comment->created_at) }}
                                            </div>

                                            <p>{{ $comment->body }}</p>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <div class="section-title text-sm-title title-wide no-after-title-wide mt-2 mb-2 dt-sl">
                        <h2 class="text-center"> {{ __('messages.there_is_no_comment_for_this_product') }}</h2>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
