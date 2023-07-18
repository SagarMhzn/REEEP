@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-8 margin-tb mx-auto text-center">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('backend.roles.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'backend.roles.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 mx-auto">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 mx-auto">
            <div class="form-group">
                <strong>Permission:</strong>
                <br />
                <div class="row">
                    @foreach ($permission as $value)
                        <div class="col-3">

                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                {{ $value->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 mx-auto text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
