@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
    </div>
@endif

@if (session('update'))
    <div class="alert alert-warning alert-dismissible fade show">
        {{ session('update') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('delete') }}
    </div>
@endif