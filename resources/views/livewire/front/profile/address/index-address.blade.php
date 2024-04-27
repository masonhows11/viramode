<div class="row overflow-auto  h-75">
    @foreach ($addresses as $address)
        <div class="col-lg-6 col-md-12">

            <div class="card-horizontal-address">
                <div class="card-horizontal-address-desc">
                    <h4 class="card-horizontal-address-full-name">
                        {{ $address->recipient_first_name . ' ' . $address->recipient_last_name }}</h4>
                    <p>
                        {{ $address->address_description }}
                    </p>
                </div>
                <div class="card-horizontal-address-data">
                    <ul class="card-horizontal-address-methods d-flex float-right">

                        <li class="card-horizontal-address-method">
                            <i class="mdi mdi-email-outline"></i>
                            استان: <span>{{ $address->province->name ? $address->province->name : ' - ' }}</span>
                        </li>
                        <li class="card-horizontal-address-method">
                            <i class="mdi mdi-email-outline"></i>
                            شهر : <span>{{ $address->city->name ? $address->city->name : ' - ' }}</span>
                        </li>
                        <li class="card-horizontal-address-method">
                            <i class="mdi mdi-email-outline"></i>
                            پلاک : <span>{{ $address->plate_number }}</span>
                        </li>

                    </ul>
                    <ul class="card-horizontal-address-methods d-flex float-right">

                         <li class="card-horizontal-address-method">
                            <i class="mdi mdi-email-outline"></i>
                            کدپستی : <span>{{ $address->postal_code }}</span>
                        </li>
                        <li class="card-horizontal-address-method">
                            <i class="mdi mdi-cellphone-iphone"></i>
                            تلفن همراه :
                            <span>{{ $address->mobile != null ? $address->mobile : $address->user->mobile }}</span>
                        </li>
                    </ul>

                    <div class="card-horizontal-address-actions my-2">

                        <a href="javascript:void(0)" wire:click.prevent="status({{ $address->id }})"
                            class="btn-note   btn-sm">
                             {{ $address->is_active == 0 ? __('messages.deactivate') : __('messages.active') }}
                         </a>

                        <a href="{{ route('profile.address.edit',$address->id)}}"  class="btn-note mr-2">ویرایش</button>

                        <a href="javascript:void(0)" wire:click.prevent="deleteConfirmation({{ $address->id }})" class="btn-note mr-2">حذف</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@push('front_custom_scripts')
    <script type="text/javascript">
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: 'آیا مطمئن هستید این ایتم حذف شود؟',
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: 'javascript:void(0)3085d6',
                cancelButtonColor: 'javascript:void(0)d33',
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
        window.addEventListener('show-result', ({detail: { type, message }}) => {
            Swal.fire({
                icon: type,
                text: message,
            });
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
