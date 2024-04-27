@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.edit_address') }}
@endsection
@section('left_profile_content')
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
        <h2>{{ __('messages.edit_address') }}</h2>
    </div>

    
    <livewire:front.profile.address.edit-address :address="$address">

</div>
@endsection
