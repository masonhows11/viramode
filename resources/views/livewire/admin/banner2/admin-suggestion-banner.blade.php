<div>
    @section('dash_page_title')
        {{ __('messages.banners_management') }}
    @endsection
    @section('breadcrumb')
        {{-- {{ Breadcrumbs::render('admin.delivery.index') }}--}}
    @endsection
    <div class="container-fluid">
        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3> {{ __('messages.suggestion_banner') }}</h3>
                </div>
            </div>
        </div>
        <div class="row my-4 bg-white">
            <div class="col-lg-4 col-md-4 col my-2">
                <a href="{{ route('admin.suggestion.products.create') }}" class="btn btn-sm btn-primary">{{ __('messages.add_new_suggest') }}</a>
            </div>
        </div>
        <div class="row  banner-list bg-white">
            <div class="my-5">

                  <table class="table table-striped">
                     <thead class="border-bottom-3 border-top-3">
                     <tr class="text-center">
                         <th>{{ __('messages.id') }}</th>
                         <th>{{ __('messages.title') }}</th>
                         <th>{{ __('messages.url_image') }}</th>
                         <th>{{ __('messages.slug') }}</th>
                         <th>{{ __('messages.price') }}</th>
                         <th>{{ __('messages.status') }}</th>
                         <th>{{ __('messages.operation') }}</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach( $banners as $banner)
                         <tr class="text-center">
                             <td>{{ $banner->id }}</td>
                             <td>{{ $banner->title }}</td>

                             <td>

                                @if( $banner->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($banner->image_path))
                                <img src="{{  asset('storage/'.$banner->image_path)  }}" width="100" height="100" class="img-thumbnail" alt="banner-image">
                                @else
                                <img src="{{ asset('admin_assets/images/no-image-icon-23494.png') }}" width="100" height="100" class="img-thumbnail" alt="banner-image">
                                @endif


                             </td>
                             <td>{{ $banner->slug }}</td>
                             <td>{{priceFormat( $banner->price) . ' ' . __('messages.toman') }}</td>



                             <td>
                                 <a href="javascript:void(0)" wire:click.prevent="status({{ $banner->id }})"
                                    class="btn {{ $banner->status == 0 ? 'btn-danger' : 'btn-success' }}  btn-sm">
                                     {{ $banner->status == 0 ? __('messages.deactivate') : __('messages.active') }}
                                 </a>
                             </td>
                             <td>
                                 <a href="javascript:void(0)" wire:click.prevent="deleteConfirmation({{ $banner->id }})" class="" ><i class="fa fa-trash"></i></a>
                                 {{-- <a href="{{ route('admin.suggestion.products.edit',$banner->id) }}" class="ms-2"><i class="fa fa-edit"></i></a> --}}
                             </td>
                         </tr>
                     @endforeach
                     </tbody>
                 </table>

                {{-- <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach( $banners as $banner)
                        <div class="col">
                            <div class="card border border-2 border-secondary">
                                @if( $banner->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($banner->image_path))
                                    <img src="{{  asset('storage/'.$banner->image_path)  }}" class="card-img-top" alt="...">
                                @else
                                    <img src="{{ asset('admin_assets/images/no-image-icon-23494.png') }}" class="card-img-top" alt="...">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $banner->title }}</h5>
                                </div>
                                <div class="card-footer  d-flex justify-content-between">
                                    <div>
                                        <h6 class="h6">{{ __('messages.status') }}</h6>
                                        <a href="javascript:void(0)" wire:click.prevent="status({{ $banner->id }})"
                                           class="btn {{ $banner->status == 0 ? 'btn-danger' : 'btn-success' }}  btn-sm">
                                            {{ $banner->status == 0 ? __('messages.deactivate') : __('messages.active') }}
                                        </a>
                                    </div>
                                    <div>
                                        <h6 class="h6">  {{ __('messages.operation') }}</h6>
                                        <a href="javascript:void(0)" wire:click.prevent="deleteConfirmation({{ $banner->id }})" class="btn btn-sm btn-danger">{{ __('messages.delete_model') }}</a>
                                     <a href="{{ route('admin.suggestion.products.edit',$banner->id) }}" class="ms-2 btn btn-sm btn-primary">{{ __('messages.edit_model') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

            </div>
        </div>
        <div class="row d-flex justify-content-center list-stock-paginate">
            <div class="col-lg-2 col-md-2 ">
                {{ $banners->links() }}
            </div>
        </div>
    </div>
</div>
@push('dash_custom_script')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن!',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            });
        })
    </script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        window.addEventListener('show-result', ({detail: {type, message}}) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
        @if( session()->has('warning') )
        Toast.fire({
            icon: 'warning',
            title: '{{ session()->get('warning') }}'
        })
        @elseif( session()->has('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session()->get('success') }}'
        })
        @endif
    </script>
@endpush




