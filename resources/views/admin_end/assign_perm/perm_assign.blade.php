@extends('admin_end.include.master_dash')
@section('dash_page_title')
   {{ __('messages.perms_assignment') }}
@endsection
@section('breadcrumb')
   {{ Breadcrumbs::render('admin.perms.assign') }}
@endsection
@section('dash_main_content')

    <div class="container-fluid">

        <div class="row d-flex justify-content-start my-4 bg-white">
            <div class="col-lg-4 col-md-4 col  my-5  border-bottom title-add-to-stock">
                <div class="alert my-4">
                    <h3>{{ __('messages.perms_assignment') }}</h3>
                </div>
            </div>
        </div>

        <div class="row d-flex bg-white  admin-role-assign-form">
            <div class="my-4">
                <form action="{{ route('admin.perms.assign') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="row">
                        <div class="mb-3 mt-3">
                            <label for="user" class="form-label">نام کاربری :</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly id="user">
                        </div>
                    </div>
                    <label for="role-name" class="form-label me-5">نام مجوز :</label>
                    @foreach($perms as $perm)
                        <div class="form-check my-5 form-check-inline">
                            <label class="form-check-label">{{ $perm->name }}</label>
                            <input class="form-check-input" type="checkbox" id="form-check-input{{ $perm->id }}" name="perms[]"
                                   {{ in_array( $perm->id,$user->getPermissionIds()->toArray()) ? 'checked' : '' }}
                                   value="{{ $perm->id }}">
                        </div>
                    @endforeach
                    <div class="mb-3 mt-3 d-flex">
                        <div>
                            <button class="btn btn-success" type="submit" id="login-btn" >

                                <span class="indicator-label" id="login-text-element">
                                    {{ __('messages.save') }}
                                </span>

                                <span class="spinner-border spinner-border-sm d-none" id="spinnder-element"   role="status" aria-hidden="true"></span>
                                <span class="d-none" id="spinnder-text">{{ __('messages.saving') }}</span>


                              </button>
                        </div>
                        <div class="ms-4">
                            <a href="{{ route('admin.perm.list.users') }}" class="btn btn-secondary">{{ __('messages.return') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@push('dash_custom_script')

<script>
    $(document).ready(function() {
        $("#login-btn").click(function() {
            $("#login-text-element").addClass('d-none');
            $("#spinnder-element").removeClass('d-none');
            $("#spinnder-text").removeClass('d-none');
        });
    });
</script>

@if(session()->has('success'))
        <script>
           const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{!! session()->get('success') !!}'
            })

        </script>
@endif


@endpush

