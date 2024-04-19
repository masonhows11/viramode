<div>
    <div class="row y-4 bg-white overflow-auto">
        <table class="table py-4 table-bordered border-2 rounded-3 bg-white">
            <thead class="">
            <tr class="text-center">
                <th class="p-4">{{ __('messages.id') }}</th>
                <th class="p-4">{{ __('messages.image') }}</th>
                <th class="p-4">{{ __('messages.name_persian') }}</th>
                <th class="pro-field p-4">{{ __('messages.product_price') }}</th>
                <th class="pro-field status-field p-4">{{ __('messages.status') }}</th>
                <th class="p-4">{{ __('messages.operation') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $products as $product)
                <tr class="text-center">
                    <td>{{ $product->id }}</td>
                    <td>
                       @if( $product->thumbnail_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->thumbnail_image ) )
                            <img class="img-thumbnail" width="100" height="100"
                                 src="{{ asset('storage/'.$product->thumbnail_image) }}"
                                 alt="product_image">
                        @else
                            <img class="img-thumbnail" width="100" height="100"
                                 src="{{ asset('admin_assets/images/no-image-icon-23494.png') }}"
                                 alt="product_image">
                        @endif
                    </td>
                    <td>
                        <div class="mt-3">{{ Str::limit($product->title_persian,50)  }}</div>
                    </td>
                    <td class="pro-field">
                        <p class="mt-2">
                            {{ priceFormat($product->origin_price) }} {{__('messages.toman')}}
                        </p>
                    </td>
                    <td class="pro-field status-field">
                        <a href="javascript:void(0)"
                           class="btn btn-sm  {{ $product->status == 1 ? 'btn-success': 'btn-danger' }}">
                            {{ $product->status == 1 ? __('messages.published')  : __('messages.unpublished') }}
                        </a>
                    </td>
                    <td class="pro-field status-field">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.suggestion.products.store',['product'=>$product->id]) }}">
                            {{ __('messages.add_to_suggestions_list') }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="row d-flex justify-content-center bg-white my-4 ">
        <div class="col-lg-2 col-md-2 my-2 pt-2 pb-2 ">
            {{ $products->links() }}
        </div>
    </div>

</div>
