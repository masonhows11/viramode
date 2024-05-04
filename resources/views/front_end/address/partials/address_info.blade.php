@foreach ( $addresses as $address )
<div class="checkout-contact dt-sn dt-sn--box border px-0 pt-0 pb-0">


        <div class="checkout-contact-content mt-2">
            <ul class="checkout-contact-items">
                <li class="checkout-contact-item">
                    {{ __('messages.receiver') }}:
                    <span class="full-name">{{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}</span>
                    <a href="{{ route('profile.address.edit', $address->id) }}" class="checkout-contact-btn-edit">اصلاح این
                        آدرس</a>
                </li>
                <li class="checkout-contact-item">
                    <div class="checkout-contact-item checkout-contact-item-mobile">
                        {{ __('messages.phone_number') }}:
                        <span class="mobile-phone">{{ $address->mobile }}</span>
                    </div>
                    <div class="checkout-contact-item-message">
                        {{ __('messages.post_code') }}:
                        <span class="post-code">{{ $address->postal_code }}</span>
                    </div>
                    <br>
                    استان
                    <span class="state">{{ $address->province->name }}</span>
                    ، ‌شهر
                    <span class="city">{{ $address->city->name }}</span>
                    ،
                    <span class="address-part">{{ $address->address_description }}</span>
                </li>
            </ul>
            <div class="checkout-contact-badge custom-radio">

                <input type="radio" id="radio-address-{{ $address->id }}" class="custom-control-input address-radio-check" form="my-form" name="address_id" value="{{ $address->id }}">
                <label for="radio-address-{{ $address->id }}" class="custom-control-label pr-3 pt-5 mt-2 border-danger address-radio-label"></label>

            </div>
        </div>
</div>
@endforeach
