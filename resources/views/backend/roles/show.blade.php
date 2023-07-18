@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8 margin-tb mx-auto">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('backend.roles.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 mx-auto">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 mx-auto">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
            <ul>
                @foreach($rolePermissions as $v)
                    <li>
                        <label class="label label-success">{{ $v->name }}</label>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection