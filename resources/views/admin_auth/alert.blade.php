@if ( session('error'))
    <div class="text-center alert alert-danger alert-dive">
           {{ session('error') }}
    </div>
@endif
@if ( session('success'))
    <div class="text-center alert alert-success alert-div">
            {{ session('success') }}
    </div>
@endif


