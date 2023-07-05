@extends('layouts.backend')

@section('content')

    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h4 class="text-danger " style="color:red;">{{ $error }}</h4>
            @endforeach
        @endif
    </div>
    {{-- {{ dd($gallery) }} --}}
    <h2 style="text-align: center;">Galleries</h2>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update Galleries</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::model($gallery, [
                'route' => ['backend.gallery.update', $gallery],
                'method' => 'post',
                'enctype' => 'multipart/form-data',
            ]) !!}
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('album_id ', 'Album Name') !!}
                    {!! Form::select('album_id', $data['album'], null, ['class' => 'form-control']) !!}
                </div>

                <div class="row">
                    <div class="col">
                        Previous Image:
                        <br>
                        @if ($gallery)
                            <img src="{{ url('public/Image/gallery/' . $gallery->image) }}" alt="Banner Image" height="200"
                                width="300">
                        @endif
                        <br>
                    </div>
                    <div class="col">
                        New Image:
                        <div id="imagePreviewContainer" style="display: none;">
                            <img id="imagePreview" src="#" alt="Image Preview"
                                style="max-width: 300px; max-height: 200px; object-fit:cover">
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('image ', 'Image') !!}
                            {!! Form::file('image', [
                                'class' => 'form-control-file',
                                'placeholder' => 'Image',
                                'onchange' => 'previewImage(this)',
                                'accept' => 'image/*',
                            ]) !!}

                        </div>
                    </div>
                </div>



                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="card-footer d-flex justify-content-between m-auto">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!} <br>
                </div>
            </div>
            {{ Form::close() }}


            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    @endsection
    @section('js')
        <script>
            function previewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                        $('#imagePreviewContainer').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#imagePreview').attr('src', '#');
                    $('#imagePreviewContainer').hide();
                }
            }
        </script>
    @endsection
