@guest
    <span style="font-size: 1.2em;" class="my-4">
                                         <i class="add-to-fav-product far fa-heart heart text-dark d-block  my-4"
                                            data-url="{{ route('product.add.to.favorites') }}"
                                            data-bs-toggle="tooltip"
                                            data-product="{{ $product_id }}"
                                            data-bs-placement="top"
                                            title="{{ __('messages.add_to_favorites') }}">
                                         </i>
                                    </span>
@endguest
@auth
    @if( $product->user->contains(auth()->user()->id))
        <span class="" style="font-size: 1.2em">
                                        <i class="add-to-fav-product fas fa-heart  heart  text-danger  d-block my-4"
                                           data-url="{{ route('product.add.to.favorites' )}}"
                                           data-bs-toggle="tooltip"
                                           data-product="{{ $product_id }}"
                                           data-bs-placement="top"
                                           style="color:tomato"
                                           title="{{ __('messages.remove_from_favorites') }}"></i>
                                            </span>
    @else
        <span class="" style="font-size: 1.2em">
                                             <i class="add-to-fav-product far fa-heart heart text-dark  d-block my-4"
                                                data-url="{{ route('product.add.to.favorites') }}"
                                                data-bs-toggle="tooltip"
                                                data-product="{{ $product->id }}"
                                                data-bs-placement="top"
                                                title="{{ __('messages.add_to_favorites') }}"></i>
                                        </span>
    @endif
@endauth
