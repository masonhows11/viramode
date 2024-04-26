@extends('front_end.profile.master_profile')
@section('page_title')
    {{ __('messages.create_address') }}
@endsection
@section('left_profile_content')
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

    <livewire:front.profile.address.create-address>

</div>
@endsection