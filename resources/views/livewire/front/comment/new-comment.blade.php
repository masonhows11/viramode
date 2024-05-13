<div>
    <div class="comments-tab dt-sl">

        <div class="dt-sl">
            <div class="row">

                @auth
                <div class="col-md-12 col-sm-12">
                    <div class="form-question-answer dt-sl mb-3">
                        <form action="">
                            <textarea class="form-control mb-3" rows="5"></textarea>
                            <button class="btn btn-dark float-right ml-3" disabled="">ثبت نظر</button>
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

                <div  class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                    <h2>نظرات کاربران</h2>
                    <p class="count-comment">123 نظر</p>
                </div>

                <ol class="comment-list">
                    <li>
                        <div class="comment-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 comment-content">
                                    <div class="comment-author">
                                        توسط مجید سجادی فرد در تاریخ ۵ مهر ۱۳۹۵
                                    </div>

                                    <p>لورم ایپسوم متن ساختگی</p>

                                    {{--  <div class="footer">
                                        <div class="comments-likes">
                                            آیا این نظر برایتان مفید بود؟
                                            <button class="btn-like" data-counter="۱۱">بله
                                            </button>
                                            <button class="btn-like" data-counter="۶">خیر
                                            </button>
                                        </div>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </li>
                </ol>

            </div>
        </div>
    </div>
</div>
