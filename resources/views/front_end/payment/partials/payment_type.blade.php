<div class="row">
    <div class="checkout-time-table checkout-time-table-time">

        <div class="col-12">
            <div class="radio-box custom-control custom-radio pl-0 pr-3">
                <input type="radio" class="custom-control-input" name="paymentType" id="1" value="1">
                <label for="1" class="custom-control-label">
                    <div class="content-box">
                        <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                            پرداخت اینترنتی
                        </div>
                        <ul class="checkout-time-table-subtitle-bar">
                            <li>
                                آنلاین با تمامی کارت‌های بانکی
                            </li>
                        </ul>
                    </div>
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="radio-box custom-control custom-radio pl-0 pr-3">

                <input type="radio" class="custom-control-input" name="paymentType" id="2" value="2">

                <label for="2" class="custom-control-label">
                    <div class="content-box">
                        <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                            پرداخت اعتباری
                        </div>
                    </div>
                </label>
            </div>
        </div>

        <div class="col-12">
            <div class="radio-box custom-radio  custom-control  mt-2  pr-5">
                @error('paymentType')
                <div class="text-danger mt-2 ms-3 font-13">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

    </div>

</div>
