@extends( 'front_end.layouts.master_front')
@section( 'page_title')
        {{ __('messages.basket') }}
@endsection
@section( 'main_content')
    <div class="container-fluid">

         <livewire:front.cart.shopping-cart />


    </div>
@endsection
