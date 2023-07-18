@extends('layouts.backend')
@section('Heading', 'Knowledge and Resources')

@section('content')

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update Knowledge and Resources</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open([
                'route' => ['backend.knowledge.update', $knowledge->id],
                'method' => 'POST',
                'enctype' => 'multipart/form-data',
            ]) !!}
            {!! csrf_field() !!}

            @method('put')
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $knowledge->title, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', $knowledge->description, [
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

                            @if ($knowledge->image)
                                <img src="{{ url('public/Image/knowledge-and-resources/images/' . $knowledge->image) }}"
                                    width="200px" height="150px" style="object-fit: fit" alt="Image" />
                            @else
                                {{-- <img src="" width="200px" height="150px"
                                    style="object-fit: fit" alt="No image Provided" /> --}}

                                <i>~~~ No Image ~~~</i>
                            @endif

                        </div>
                        {!! Form::file('image', [
                            'id' => 'choose-file',
                            'style' => 'margin-bottom:1rem; object-fit: cover;',
                            'accept' => 'image/*',
                        ]) !!}

                    </div>
                </div>
                
                <div class="col-sm">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('documents', 'Documents') !!}
                        <br>
                        <div id="doc-preview">

                            @if ($knowledge->documents)
                                <a href="{{ url('public/Image/knowledge-and-resources/documents/' . $knowledge->documents) }}"
                                    alt="Document" target="_blank"> {{ Str::substr($knowledge->documents, 12) }}
                                </a>
                            @else
                                <i>~~~ No Documents ~~~</i>
                            @endif

                        </div>

                        <span id="file-name"></span>
                        <br>

                        {!! Form::file('documents', [
                            'id' => 'choose-doc',
                            'accept' => '.pdf,.doc,.docx,.svg,.xlsx',
                        ]) !!}


                        <button id="preview-btn" style="display: none;">Preview</button>

                        {{-- <div id="img-preview"></div>
                        {!! Form::file('documents', [
                            'id' => 'choose-file',
                            'style' => 'margin-bottom:1rem; object-fit: cover;',
                            'accept' => '.pdf,.doc,.docx,.svg,.xlsx',
                        ]) !!} --}}

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
                    // chooseFile.style.display = "none";
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<div><img src="' + this.result + '" height=150px width=200px /></div>';
                });
            }
        }
    </script>

    <script>
        const fileInput = document.getElementById('choose-doc');
        const fileNameDisplay = document.getElementById('file-name');
        const previewButton = document.getElementById('preview-btn');
        const docPreviewDiv = document.getElementById('doc-preview');

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                fileNameDisplay.textContent = fileName;
                previewButton.style.display = 'inline'; // Show preview button
                docPreviewDiv.style.display = 'none'; // Hide doc preview div
            } else {
                fileNameDisplay.textContent = '';
                previewButton.style.display = 'none'; // Hide preview button
                docPreviewDiv.style.display = 'block'; // Show doc preview div
            }
        });

        previewButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            if (fileInput.files.length > 0) {
                const fileURL = URL.createObjectURL(fileInput.files[0]);
                window.open(fileURL, '_blank'); // Open document in a new tab/window
            }
        });
    </script>



@endsection
