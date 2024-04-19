@if( session('error') )
    <div class="text-danger mt-4 text-center">
        {{ session('error') }}
    </div>
@endif
@if( session('success') )
    <div class="text-danger mt-4 text-center">
        {{ session('success') }}
    </div>
@endif
@if( $errors->any())
      <ul>
        @foreach($errors->all() as $error)
                <li class="text-danger mt-4 text-center">
                    {{ $error }}
                </li>
        @endforeach
      </ul>
@endif
