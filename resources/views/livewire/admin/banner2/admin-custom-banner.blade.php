<div>
    @section('dash_page_title')
        {{ __('messages.banners_management') }}
    @endsection
    @section('breadcrumb')
        {{-- {{ Breadcrumbs::render('admin.delivery.index') }} --}}
    @endsection
    <div class="container-fluid">

        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3> {{ __('messages.custom_banners') }}</h3>
                </div>
            </div>
        </div>

       <div class="row bg-white">
            <div class="col-lg-4 col-md-4 col">
                <div class="alert alert-light mt-2 h4">{{ __('messages.new_banner') }}</div>
            </div>
        </div>

        <form  wire:submit.prevent="save">


            <div class="row   row-cols-md-2 row-cols-sm-1 row-cols-1  product-stock-list mt-5 py-5 bg-white">

                <div class="col">
                    <div class="row">

                        <div class="col-12">
                            <div class="mt-3">
                                <label for="title" wire:model.defer="title" class="form-label">{{ __('messages.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title" >
                            </div>
                            @error('title')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="mt-3">
                                <label for="title" wire:model.defer="link" class="form-label">{{ __('messages.category') }}</label>
                                <select class="form-select" size="4" aria-label="Default select example">
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id}}">{{  $category->title_persian }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            @error('title')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="mt-3">
                                <label for="status" wire:model.defer="status" class="form-label">{{ __('messages.status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" >{{ __('messages.active') }}</option>
                                    <option value="0" >{{ __('messages.deactivate') }}</option>
                                </select>
                            </div>
                            @error('status')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="col">
                        {{--  logo section  --}}
                        <div class="row mt-4 d-flex flex-column justify-content-center align-content-center">


                            <div class="col-sm-6 d-flex justify-content-center">

                                @if($path)
                                <img src="{{ $path->temporaryUrl() }}"
                                     width="250" height="250"
                                     alt="logo_image_path"
                                     class="rounded border border-2 image-product-gallery-preview">
                                 @else
                                <img src="{{ asset('admin_assets/images/no-image-icon-23494.png') }}"
                                     width="250" height="250"
                                     alt="logo_image_path"
                                     class="rounded border border-2 image-product-gallery-preview">
                                 @endif


                            </div>
                            <div class="col-sm-6  d-flex flex-column justify-content-center my-4">

                                <label for="photo" class="form-label">انتخاب تصویر</label>

                                <input type="file" accept="image/*" class="form-control" wire:model.defer="path" id="path">
                                <div wire:loading wire:target="path">در حال بارگزاری...</div>
                                @error('path')
                                <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                            </div>

                        </div>
                </div>

                <div class="col-12 discount-common-save">
                    <div class="mt-3">
                        <input type="submit" class="btn btn-success" value="{{ __('messages.save') }}">
                    </div>
                </div>

            </div>

        </form>



        <div class="row  banner-list bg-white">
            <div class="my-5">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($banners as $banner)
                        <div class="col">
                            <div class="card border border-2 border-secondary">

                                @if ($banner->image_path && file_exists(public_path() . $banner->image_path))
                                    <img src="{{ asset($banner->image_path) }}" class="card-img-top" alt="...">
                                @else
                                    <img src="{{ asset('admin_assets/images/no-image-icon-23494.png') }}"
                                        class="card-img-top" alt="...">
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
                                        <h6 class="h6"> {{ __('messages.operation') }}</h6>
                                        <a href="javascript:void(0)"
                                            wire:click.prevent="deleteConfirmation({{ $banner->id }})"
                                            class="btn btn-sm btn-danger">{{ __('messages.delete_model') }}</a>
                                        <a href="{{ route('admin.newest.product.edit', $banner->id) }}"
                                            class="ms-2 btn btn-sm btn-primary">{{ __('messages.edit_model') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
        window.addEventListener('show-result', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
        @if (session()->has('warning'))
            Toast.fire({
                icon: 'warning',
                title: '{{ session()->get('warning') }}'
            })
        @elseif (session()->has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session()->get('success') }}'
            })
        @endif
    </script>
@endpush
