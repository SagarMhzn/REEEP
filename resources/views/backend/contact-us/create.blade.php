@extends('layouts.backend')

@section('content')

    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h4 class="text-danger " style="color:red;">{{ $error }}</h4>
            @endforeach
        @endif
    </div>

    <h2 style="text-align: center;">Contact Us</h2>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create New Contact Informations</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($contact)
                {!! Form::open(['route' => ['backend.contact.update', $contact->id], 'method' => 'POST']) !!}
                @method('put')
                {{-- {!! csrf_field() !!} --}}

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('url', 'Url') !!}
                        {!! Form::text('url', $contact->url, ['class' => 'form-control', 'placeholder' => 'Enter Url']) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('location', 'Location') !!}
                        {!! Form::text('location', $contact->location, ['class' => 'form-control', 'placeholder' => 'Enter Location']) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $contact->email, ['class' => 'form-control', 'placeholder' => 'Enter Email']) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('phone', 'phone') !!}
                        {!! Form::text('phone', $contact->phone, ['class' => 'form-control', 'placeholder' => 'Enter phone']) !!}
                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                    {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!} <br>
                </div>
            @else
                {!! Form::open(['route' => 'backend.contact.store', 'method' => 'POST']) !!}
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('url', 'Url') !!}
                        {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Enter Url']) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('location', 'Location') !!}
                        {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Enter Location']) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email']) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('phone', 'phone') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter phone']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!} <br>
                </div>
            @endif




        </div>
        {{ Form::close() }}

    </div>


    </section>

@endsection
