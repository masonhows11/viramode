@extends('admin_end.include.master_dash')
@section('dash_page_title')
    {{ __('messages.new_banner') }}
@endsection
@section('breadcrumb')
    {{-- {{ Breadcrumbs::render('admin.delivery.create') }} --}}
@endsection

@section('dash_main_content')
    <div class="container-fluid">


        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3>{{ __('messages.custom_banners') }} / {{ __('messages.new_banner') }}</h3>
                </div>
            </div>
        </div>

        <div class="row my-4 bg-white">
            <div class="col-lg-4 col-md-4 col my-2">
                <a href="{{ route('admin.custom.banners.index') }}"
                    class="btn btn-sm btn-primary">{{ __('messages.list_banners') }}</a>
            </div>
        </div>


        <livewire:admin.banner2.custom-banner-image-upload>

    </div>
@endsection

