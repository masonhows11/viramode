<div>
    @forelse ( $addresses as $address)
                        <div class="col-lg-6 col-md-12">
                            <div class="card-horizontal-address">
                                <div class="card-horizontal-address-desc">
                                    <h4 class="card-horizontal-address-full-name">{{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}</h4>
                                    <p>
                                        {{ $address->address_description }}
                                    </p>
                                </div>
                                <div class="card-horizontal-address-data">
                                    <ul class="card-horizontal-address-methods float-right">
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-email-outline"></i>
                                             استان: <span>{{   $address->province->name ? $address->province->name : ' - '  }}</span>
                                        </li>
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-email-outline"></i>
                                            شهر : <span>{{ $address->city->name ? $address->city->name : ' - ' }}</span>
                                        </li>
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-email-outline"></i>
                                            کدپستی : <span>{{  $address->postal_code }}</span>
                                        </li>
                                        <li class="card-horizontal-address-method">
                                            <i class="mdi mdi-cellphone-iphone"></i>
                                            تلفن همراه : <span>{{ $address->mobile != null ? $address->mobile : $address->user->mobile }}</span>
                                        </li>
                                    </ul>
                                    <div class="card-horizontal-address-actions">

                                        <button class="btn-note" data-toggle="modal"
                                            data-target="#modal-location-edit">ویرایش</button>

                                        <button class="btn-note" data-toggle="modal"
                                            data-target="#remove-location">حذف</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
</div>
