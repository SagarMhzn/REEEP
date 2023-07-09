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

    <h2 style="text-align: center;">About Us</h2>
    {{-- {{ dd($About Uss ->title) }} --}}
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update About Us</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open([
                'route' => ['backend.aboutus.update', $aboutus->id],
                'method' => 'POST',
                'enctype' => 'multipart/form-data',
            ]) !!}
            {!! csrf_field() !!}

            @method('put')
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title[en]', 'Title(EN)') !!}
                        {!! Form::text('title[en]', $aboutus->title['en'], ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title[ne]', 'Title(NE)') !!}
                        {!! Form::text('title[ne]', $aboutus->title['ne'], ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('description[en]', 'Description(EN)') !!}
                        {!! Form::textarea('description[en]', $aboutus->description['en'], [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Description',
                            'rows' => 4,
                            'cols' => 50,
                        ]) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('description[ne]', 'Description(NE)') !!}
                        {!! Form::textarea('description[ne]', $aboutus->description['ne'], [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Description',
                            'rows' => 4,
                            'cols' => 50,
                        ]) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">

                    <div class="form-group d-flex" style="flex-direction: column ">

                        {!! Form::label('image', 'Image') !!}

                        <div id="img-preview">

                            @if ($aboutus->image)
                                <img src="{{ url('public/Image/aboutus/' . $aboutus->image) }}" width="200px" height="150px"
                                    style="object-fit: cover" alt="Image" />
                            @else
                                <img src="" width="200px" height="150px"
                                    style="object-fit: cover" alt="No image Provided" />
                            @endif

                        </div>
                        {!! Form::file('image', [
                            'id' => 'choose-file',
                            'style' => 'margin-bottom:1rem; object-fit: cover;',
                            'accept' => 'image/*',
                        ]) !!}

                    </div>
                </div>
            </div>


            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}

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
                    imgPreview.innerHTML = '<div><img src="' + this.result + '" height=150px width=200px /></div>';
                });
            }
        }
    </script>
@endsection
