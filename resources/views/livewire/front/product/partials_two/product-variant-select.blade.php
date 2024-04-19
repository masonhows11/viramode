<div>
    <div class="product-variant dt-sl">
        <div class="section-title text-sm-title title-wide no-after-title-wide mb-0">
            <h2>{{ $variant_name != null ? $variant_name : '' }}:</h2>
        </div>
        @if($product->values() != null)
            <div class="form-group">

                @if($variant_type == 0)
                    <select class="form-control" wire:change="selectVariant" wire:model="variantId" id="variant_name">
                        @foreach( $product->values()->get() as $value )
                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                        @endforeach
                    </select>

            </div>
        @else

            <div class="form-check">
                @foreach( $product->values()->get() as $value )
                    <input class="form-check-input" wire:click="selectVariant" wire:model="variantId" type="radio"
                           name="Radio" id="radio-{{ $value->id }}" value="{{ $value->id }}">
                    <label class="form-check-label" for="radio-{{ $value->id }}">
                        {{ $value->value }}
                    </label>
                @endforeach
            </div>

        @endif

        @endif



        {{--<ul class="product-variants float-right ml-3">
            <li class="ui-variant">
                <label class="ui-variant ui-variant--color">
                                                        <span class="ui-variant-shape"
                                                              style="background-color: #212121"></span>
                    <input type="radio" value="1" name="color"
                           class="variant-selector" checked>
                    <span class="ui-variant--check">مشکی</span>
                </label>
            </li>
            <li class="ui-variant">
                <label class="ui-variant ui-variant--color">
                                                        <span class="ui-variant-shape"
                                                              style="background-color: #f6f6f6"></span>
                    <input type="radio" value="3" name="color"
                           class="variant-selector">
                    <span class="ui-variant--check">سفید</span>
                </label>
            </li>
            <li class="ui-variant">
                <label class="ui-variant ui-variant--color">
                                                        <span class="ui-variant-shape"
                                                              style="background-color: #2196f3"></span>
                    <input type="radio" value="4" name="color"
                           class="variant-selector">
                    <span class="ui-variant--check">آبی</span>
                </label>
            </li>
        </ul>--}}

    </div>
</div>
