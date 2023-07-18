@extends('layouts.backend')
@section('Heading', 'Banners')

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create New Banners</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['route' => 'backend.banner.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('banner_order', 'Banner Order') !!}
                        {!! Form::text('banner_order', null, ['class' => 'form-control', 'placeholder' => 'Enter Banner Order']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('caption', 'Captions') !!}
                        {!! Form::textarea('caption', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter caption',
                            'rows' => 2,
                            'cols' => 50,
                        ]) !!}
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('banner-file', 'File') !!}

                        <div id="img-preview"></div>
                        {!! Form::file('banner_file', [
                            'id' => 'choose-file',
                            'style' => 'margin-bottom:1rem; object-fit: cover;',
                            'accept' => 'image/*,video/*',
                        ]) !!}

                    </div>
                </div>
            </div>


            {!! Form::submit('Create ', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
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
                    imgPreview.innerHTML = '<div><img src="' + this.result + '" height=150 width=200 /></div>';
                });
            }
        }
    </script>
@endsection
