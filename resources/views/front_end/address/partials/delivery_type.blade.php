<div class="section-title text-sm-title title-wide no-after-title-wide mb-0 px-res-1">
    <h2>انتخاب نحوه ارسال</h2>
</div>

<div class="checkout-shipment border-bottom pb-3 mb-4">
        @foreach ($deliveries as $delivery)
            <div class="custom-control custom-radio pl-0 pr-3">
                <input type="radio"
                        form="my-form"
                        name="delivery_id"
                        class="custom-control-input address-radio-check"
                        name="delivery"
                        id="radio-delivery-{{ $delivery->id }}" value="{{ $delivery->id }}">
                <label for="radio-delivery-{{ $delivery->id }}" class="custom-control-label address-radio-label">
                    {{ $delivery->title }}
                </label>
            </div>
        @endforeach

    <div class="custom-control mt-2 custom-radio pl-0 pr-3">
        @error('delivery_id')
         <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
