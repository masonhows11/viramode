@extends('admin_end.include.master_dash')
@section('dash_page_title')
    {{ __('messages.new_banner') }}
@endsection
@section('breadcrumb')
   {{-- {{ Breadcrumbs::render('admin.delivery.create') }}--}}
@endsection

@section('dash_main_content')

    <div class="container-fluid">

        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3>{{ __('messages.newest_banner') }} / {{ __('messages.new_banner') }}</h3>
                </div>
            </div>
        </div>

        <div class="row my-4 bg-white">
            <div class="col-lg-4 col-md-4 col my-2">
                <a href="{{ route('admin.newest.product.index') }}" class="btn btn-sm btn-primary">{{ __('messages.list_banners') }}</a>
            </div>
        </div>


        <form action="{{ route('admin.newest.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row   row-cols-md-2 row-cols-sm-1 row-cols-1  product-stock-list mt-5 py-5 bg-white">

                <div class="col">

                    <div class="row">

                        <div class="col-12">
                            <div class="mt-3">
                                <label for=title" class="form-label">{{ __('messages.title') }}</label>
                               {{-- <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">--}}
                                <select class="form-select" name="title" aria-label="Default select example">
                                    <option value="">{{ __('messages.choose') }}</option>
                                    @foreach($newestProducts as $product)
                                    <option value="{{ $product->id }} ">{{ $product->title_persian }} </option>
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
                                <label for="url" class="form-label">{{ __('messages.url_banner') }}</label>
                                <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}">
                            </div>
                            @error('url')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="mt-3">
                                <label for="status" class="form-label">{{ __('messages.status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" @if( old('status') == 1) selected @endif >{{ __('messages.active') }}</option>
                                    <option value="0" @if( old('status') == 0) selected @endif >{{ __('messages.deactivate') }}</option>
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
                            <div class="col-lg-5 d-flex justify-content-center align-content-center top-banner-section">
                                <img src="{{  asset('admin_assets/images/no-image-icon-23494.png') }}"
                                     id="image_view"
                                     class="img-thumbnail" height="300" width="300" alt="image">
                            </div>
                            <div class="col-lg-5">
                                <label for="image_select" class="mt-5 form-label">{{ __('messages.image') }}</label>
                                <input type="file" class="form-control" accept="image/png, image/jpeg , image/jpg ,image/gif" id="image_select" name="image_path">
                                @error('image_path')
                                <div class="alert alert-danger mt-3">
                                    {{ $message }}
                                </div>
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
    </div>
@endsection
@push('dash_custom_script')
    <script>
        $(document).ready(function () {
            const input = document.getElementById("image_select");
            const previewImage = document.getElementById("image_view");
            input.addEventListener("change", function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener("load", function () {
                        previewImage.setAttribute("src", this.result);
                    });
                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
@endpush


