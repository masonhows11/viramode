<div class="card-header checkout-order-summary-header" id="headingOne">
    <div class="row">
        <div class="col-md-6">
            <span class="text-muted">
                <span class="dl-none-sm">نحوه ارسال:</span>
                <span class="dl-none-sm">
                    {{ $order->delivery->title}}
                </span>
            </span>
        </div>
        <div class="col-md-6">
            <span class="text-muted">
                <span>ارسال </span>
                <span class="fs-sm">
                    {{ $order->delivery->delivery_time . ' ' . $order->delivery->delivery_time_unit  }}                                                    </span>
            </span>
        </div>
        <div class="col-md-6">
            <span class="text-muted">
                <span>هزینه ارسال</span>
                <span class="fs-sm">
                    {{  priceFormat($order->delivery->amount) }} {{ __('messages.toman') }}
                </span>
            </span>
        </div>
    </div>
</div>
