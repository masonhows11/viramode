@extends( 'front_end.layouts.master_front')
@section( 'page_title')
        {{ __('messages.basket') }}
@endsection
@section( 'main_content')
    <div class="main-content dt-sl mb-3">

         <livewire:front.cart.shopping-cart />


    </div>
@endsection
