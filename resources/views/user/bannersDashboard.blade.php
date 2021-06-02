@if(session('gameAdded') || session('userAdded'))
<div class="mt-1 mb-1 alert alert-success alert-dismissible fade show text-center" role="alert">
    <b> {{ session('gameAdded') ?? '' }}
        {{ session('userAdded') ?? '' }}
    </b>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('msg_delete'))
<div class="mt-1 mb-1 alert alert-warning alert-dismissible fade show text-center" role="alert">
    <b> {{ session('msg_delete') ?? '' }}
    </b>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('msg_verified'))
<div class="mt-1 mb-1 alert alert-info text-uppercase alert-dismissible fade show text-center" role="alert">
    <b> {{ session('msg_verified') ?? '' }}
    </b>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('msg_delete_error'))
<div class="mt-1 mb-1 alert alert-danger alert-dismissible fade show text-center" role="alert">
    <b> {{ session('msg_delete_error') ?? '' }}
    </b>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('result_msg'))
<div class="mt-1 mb-1 alert alert-info alert-dismissible fade show text-center" role="alert">
    <b> {{ session('result_msg') ?? '' }}
    </b>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif