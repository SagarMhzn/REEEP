{{-- @extends('layouts.backend')

@section('Heading', auth()->user()->name . ' Profile')

@section('content')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if (auth()->user()->photo)
                        <img class="rounded-circle mt-5" width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    @else
                        <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    @endif
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                    <span></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                {!! Form::open(
                    // ['route' => '']
                    ) !!} <!-- Opening the form -->
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            {!! Form::label('name', 'Name', ['class' => 'labels']) !!}
                            {!! Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            {!! Form::label('email', 'E-mail', ['class' => 'labels']) !!}
                            {!! Form::email('email', auth()->user()->email, ['class' => 'form-control', 'placeholder' => 'Enter E-mail']) !!}
                        </div>
                    </div>
                    <br><br>
                    <div class="text-center" style="margin-top: 62px">
                        {!! Form::submit('Save Profile', ['class' => 'btn btn-primary profile-button']) !!}
                    </div>
                </div>
                {!! Form::close() !!} <!-- Closing the form -->
            </div>
            <div class="col-md-5">
                {!! Form::open(
                    // ['route' => '']
                    ) !!} <!-- Opening the form -->
                <div class="p-3 py-5">
                    <div class="">
                        <h4>PassWord Setting</h4>
                    </div>
                    <br>
                    <div class="col-md-12">
                        {!! Form::label('old_password', 'Old Password', ['class' => 'labels']) !!}
                        {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Enter the Old Password...']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('new_password', 'New Password', ['class' => 'labels']) !!}
                        {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter the New Password...']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('new_password_confirmation', 'Re-Enter New Password', ['class' => 'labels']) !!}
                        {!! Form::password('new_password_confirmation', [
                            'class' => 'form-control',
                            'placeholder' => 'Enter the new password again...',
                        ]) !!}
                    </div>
                    <div class="mt-5 text-center">
                        {!! Form::submit('Save Password', ['class' => 'btn btn-primary profile-button']) !!}
                    </div>
                </div>
                {!! Form::close() !!} <!-- Closing the form -->
            </div>
        </div>
    </div>

@endsection --}}


@extends('layouts.backend')

@section('Heading', auth()->user()->name . ' Profile')
@section('content')
    @include('backend.includes.flash')

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <div id="img-preview">
                        @if (auth()->user()->photo)
                            <img class="rounded-circle mt-5" width="150px"
                                src="{{ asset('public/Image/users/' . auth()->user()->photo) }}">
                        @else
                            <img src="{{ asset('assets/backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                alt="User Image">
                        @endif
                    </div>
                    <br>
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                    <span></span>
                </div>
            </div>

            {{-- {{ dd(auth()->user()->id) }} --}}
            <div class="col-md-5 border-right">
                {!! Form::open([
                    'route' => ['backend.admin.update-profile', auth()->user()->id],
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                ]) !!}

                {!! csrf_field() !!}

                @method('put')
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            {!! Form::label('name', 'Name', ['class' => 'labels']) !!}
                            {!! Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            {!! Form::label('email', 'E-mail', ['class' => 'labels']) !!}
                            {!! Form::email('email', auth()->user()->email, ['class' => 'form-control', 'placeholder' => 'Enter E-mail']) !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            {!! Form::label('photo', 'Profile Image', ['class' => 'labels']) !!}<br>
                            {!! Form::file('photo', [
                                'id' => 'choose-file',
                                'style' => 'margin-bottom:1rem; object-fit: cover;',
                                'accept' => 'image/*',
                            ]) !!}
                        </div>
                    </div>
                    <br><br>
                    <div class="text-center">
                        {!! Form::submit('Save Profile', ['class' => 'btn btn-primary profile-button']) !!}
                    </div>
                </div>
                {!! Form::close() !!} <!-- Closing the form -->
            </div>
            <div class="col-md-5">
                {!! Form::open([
                    'route' => ['backend.admin.update-password', auth()->user()->id],
                    'method' => 'POST',
                ]) !!}
                {!! csrf_field() !!}

                @method('put')
                <div class="p-3 py-5">
                    <div class="">
                        <h4>Password Setting</h4>
                    </div>
                    <br>
                    <div class="col-md-12">
                        {!! Form::label('old_password', 'Old Password', ['class' => 'labels']) !!}
                        {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Enter the Old Password...']) !!}
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('new_password', 'New Password', ['class' => 'labels']) !!}
                        {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter the New Password...']) !!}
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('new_password_confirmation', 'Re-Enter New Password', ['class' => 'labels']) !!}
                        {!! Form::password('new_password_confirmation', [
                            'class' => 'form-control',
                            'placeholder' => 'Enter the new password again...',
                        ]) !!}
                        @error('new_password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <br>
                    <div class="mt-5 text-center">
                        {!! Form::submit('Save Password', ['class' => 'btn btn-primary profile-button']) !!}
                    </div>
                </div>
                {!! Form::close() !!} <!-- Closing the form -->
            </div>
        </div>
    </div>

    <script>
        const chooseFile = document.getElementById("choose-file");
        const imgPreview = document.getElementById("img-preview");

        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<div><img src="' + this.result +
                        '" height=150px width=150px class="img-circle elevation-2"/></div>';
                });
            }
        }
    </script>
@endsection
