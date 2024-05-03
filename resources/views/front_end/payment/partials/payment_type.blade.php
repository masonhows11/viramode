<div class="row">
    <div class="checkout-time-table checkout-time-table-time">

        <div class="col-12">
            <div class="radio-box custom-control custom-radio pl-0 pr-3">
                <input type="radio" class="custom-control-input address-radio-check" name="gateway" id="1" value="Zarinpal">
                <label for="1" class="custom-control-label address-radio-label">
                    <i class="mdi mdi-credit-card-multiple-outline checkout-additional-options-checkbox-image"></i>
                    <div class="content-box">
                        <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                           {{ __('messages.zarinpal_gateway') }}
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="radio-box custom-control custom-radio pl-0 pr-3">
                <input type="radio" class="custom-control-input address-radio-check" name="gateway"  id="2" value="IDPay">
                <label for="2" class="custom-control-label address-radio-label">
                    <i class="mdi mdi-credit-card-multiple-outline checkout-additional-options-checkbox-image"></i>
                    <div class="content-box">
                        <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                            {{ __('messages.idpay_gateway') }}
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="radio-box custom-control custom-radio pl-0 pr-3">
                <input type="radio" class="custom-control-input address-radio-check" name="gateway"  id="3" value="Mellat">
                <label for="3" class="custom-control-label address-radio-label">
                    <i class="mdi mdi-credit-card-multiple-outline checkout-additional-options-checkbox-image"></i>
                    <div class="content-box">
                        <div class="checkout-time-table-title-bar checkout-time-table-title-bar-city">
                            {{ __('messages.mellat_gateway') }}
                        </div>
                    </div>
                </label>
            </div>
        </div>

        <div class="col-12">
            <div class="radio-box custom-radio  custom-control  mt-2  pr-5">
                @error('gateway')
                <div class="text-danger mt-2 ms-3 font-13">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

    </div>

</div>
