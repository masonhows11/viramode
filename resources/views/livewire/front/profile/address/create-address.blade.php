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

                @error('recipient_first_name') <span class="error text-danger">{{ $message }}</span> @enderror
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
                @error('recipient_last_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        شماره موبایل
                    </h4>
                </div>
                <div class="form-row">
                    <input class="input-ui pl-2 dir-ltr text-right"
                    placeholder="شماره موبایل خود را وارد کنید"
                     wire:model.defer="mobile"
                      type="text">
                </div>
                @error('mobile') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        شماره پلاک
                    </h4>
                </div>
                <div class="form-row">
                    <input class="input-ui pl-2 dir-ltr text-right"
                    placeholder="شماره پلاک نشانی گیرنده را وارد کنید"
                    wire:model.defer="plate_number"
                     type="text">
                </div>
                @error('plate_numbe') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        استان
                    </h4>
                </div>
                <div class="form-row">

                        <select class="right form-control" wire:model.defer="province_id">
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
                @error('province_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 col-sm  mb-2">
                <div class="form-row-title">
                    <h4>
                        شهر
                    </h4>
                </div>
                <div class="form-row">

                        <select class="right form-control" wire:model.defer="city_id">
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
                @error('city_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
                @error('postal_code') <span class="error text-danger">{{ $message }}</span> @enderror
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
                @error('address_description') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>



            <div class="col-12 pr-4 pl-4">
                <button type="submit" class="btn btn-sm btn-primary btn-submit-form">
                {{  __('messages.save_address_and_delivert_to') }}
                </button>
                <a href="{{ route('addresses')}}" class="btn-link-border float-left mt-2">
                    {{ __('messages.cancel_return')}}
                </button>
            </div>

        </div>
    </form>

</div>
