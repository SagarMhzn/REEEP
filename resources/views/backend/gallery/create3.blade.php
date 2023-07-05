@extends('layouts.backend')

@section('content')
    <style>
        #preview {
            display: flex;
            flex-wrap: wrap;
        }

        .preview-image {
            margin: 10px;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>

    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $errors)
                <h4 class="text-danger " style="color:red;">{{ $errors }}
                </h4>
            @endforeach
        @endif
    </div>

    <h2 style="text-align: center;">Galleries</h2>
    {{-- {{ dd($About Uss ->title) }} --}}
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create New Galleries</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['route' => 'backend.gallery.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {!! csrf_field() !!}

            {{-- <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('album_id', 'Album:') !!}
                        {!! Form::select('album_id', $albums, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-sm">
                    <div id="images-container">
                        <div class="form-group image-input">
                            {!! Form::label('images[0][image_title]', 'Image Title:') !!}
                            {!! Form::text('images[0][image_title]', null, ['class' => 'form-control']) !!}

                            {!! Form::label('images[0][image]', 'Image:') !!}

                            <div id="preview"></div>
                            {!! Form::file('images[0][image]', [
                                'class' => 'form-control-file',
                                // 'id' => 'choose-file',
                                'id' => 'imageInput',
                                'style' => 'margin-bottom:1rem; object-fit: cover;',
                                'accept' => 'image/*',
                                'multiple',
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <button type="button" class="btn btn-primary" id="add-image">+</button>
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <script>
        document.getElementById('add-image').addEventListener('click', function() {
            var container = document.getElementById('images-container');
            var index = container.getElementsByClassName('image-input').length;

            var newImageInput = document.createElement('div');
            newImageInput.classList.add('form-group', 'image-input');

            newImageInput.innerHTML = `
                {!! Form::label('images[${index}][image_title]', 'Image Title:') !!}
                {!! Form::text('images[${index}][image_title]', null, ['class' => 'form-control']) !!}
                
                {!! Form::label('images[${index}][image]', 'Image:') !!}

                <div id="img-preview[]"></div>
                            {!! Form::file('images[${index}][image]', [
                                'class' => 'form-control-file',
                                'id' => 'imageInput',
                                'style' => 'margin-bottom:1rem; object-fit: cover;',
                                'accept' => 'image/*',
                                'multiple',
                            ]) !!}
                
            `;

            container.appendChild(newImageInput);
        });
    </script>

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
                        '" height=150 width=225 style="padding:1rem;"/></div>';
                });
            }
        }
    </script>
    <script>
        function previewImages() {
          var previewContainer = document.getElementById('preview');
          var files = document.getElementById('imageInput').files;
    
          for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();
    
            reader.onload = function(event) {
              var img = document.createElement('img');
              img.setAttribute('class', 'preview-image');
              img.setAttribute('src', event.target.result);
              previewContainer.appendChild(img);
            }
    
            reader.readAsDataURL(file);
          }
        }
    
        document.getElementById('imageInput').addEventListener('change', previewImages);
      </script>
@endsection
