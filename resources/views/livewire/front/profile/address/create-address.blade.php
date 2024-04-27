<div>

    <form class="form-account" wire:submit.prevent="save">

        <div class="row form-ui px-3">

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        نام 
                    </h4>
                </div>
                <div class="form-row">
                    <input class="input-ui pr-2 text-right"
                     wire:model.defer="recipient_first_name"
                      type="text" 
                      placeholder="نام خود را وارد نمایید">
                </div>
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        نام و نام خانوادگی
                    </h4>
                </div>
                <div class="form-row">
                    <input class="input-ui pr-2 text-right" 
                     wire:model.defer="recipient_last_name"
                      type="text" placeholder="نام خانوادگی خود را وارد نمایید">
                </div>
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        شماره موبایل
                    </h4>
                </div>
                <div class="form-row">
                    <input class="input-ui pl-2 dir-ltr text-left"
                     wire:model.defer="mobile"
                      type="text">
                </div>
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        شماره پلاک 
                    </h4>
                </div>
                <div class="form-row">
                    <input class="input-ui pl-2 dir-ltr text-left" 
                    wire:model.defer="plate_number"
                     type="text">
                </div>
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        استان
                    </h4>
                </div>
                <div class="form-row">
                    <div class="custom-select-ui">
                        <select class="right" wire:model.defer="province_id">
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

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        شهر
                    </h4>
                </div>
                <div class="form-row">
                    <div class="custom-select-ui">
                        <select class="right" wire:model.defer="city_id">
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
                        کد پستی
                    </h4>
                </div>
                <div class="form-row">
                    <input class="input-ui pl-2 dir-ltr text-left placeholder-right" wire:model.defer="postal_code" type="text"
                        placeholder=" کد پستی را بدون خط تیره بنویسید">
                </div>
            </div>

            <div class="col-12 mb-2">
                <div class="form-row-title">
                    <h4>
                        آدرس پستی
                    </h4>
                </div>
                <div class="form-row">
                    <textarea class="input-ui pr-2 text-right" wire:model.defer="address_description" placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
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
