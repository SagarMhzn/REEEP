@extends('layouts.backend')

@section('content')

    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $errors)
                <h4 class="text-danger " style="color:red;">{{ $errors }}
                </h4>
            @endforeach
        @endif
    </div>

    <h2 style="text-align: center;">Albums</h2>
    {{-- {{ dd($About Uss ->title) }} --}}
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update Albums</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['route' => ['backend.album.update', $album->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {!! csrf_field() !!}
            @method('put')
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $album->title, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-sm">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('cover_image', 'Cover Image') !!}

                        <div id="img-preview"></div>
                        {!! Form::file('cover_image', [
                            'id' => 'choose-file',
                            'style' => 'margin-bottom:1rem; object-fit: cover;',
                            'accept' => 'cover_image/*',
                        ]) !!}

                    </div>
                </div>
            </div> --}}

            <div class="form-group d-flex" style="flex-direction: column ">

                {!! Form::label('cover_image', 'Cover Image') !!}

                <div id="img-preview">

                    @if ($album->cover_image)
                        <img src="{{ url('public/Image/albums/' . $album->cover_image) }}" width="200px" height="150px"
                            style="object-fit: cover" alt="Image" />
                    @else
                        <img src="" width="200px" height="150px"
                            style="object-fit: cover" alt="No cover_image Provided" />
                    @endif

                </div>
                {!! Form::file('cover_image', [
                    'id' => 'choose-file',
                    'style' => 'margin-bottom:1rem; object-fit: cover;',
                    'accept' => 'image/*',
                ]) !!}

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
