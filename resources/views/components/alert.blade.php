@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="alert-text">{{ $error }}</div>
    <div class="alert-close">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endforeach

@if (session('status') || session('message'))
<div class="alert alert-{{ session('status') ?? 'success' }} alert-dismissible fade show" role="alert">
    <div class="alert-text">
        {{ session('message') }}
    </div>
    <div class="alert-close">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
