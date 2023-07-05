@extends('layouts.backend')

@section('content')

    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h4 class="text-danger " style="color:red;">{{ $error }}</h4>
            @endforeach
        @endif
    </div>

    <h2 style="text-align: center;">Galleries</h2>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create New Galleries</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['route' => 'backend.gallery.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{-- {!! csrf_field() !!} --}}
            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('album_id ', 'Album Name') !!}
                            {!! Form::select('album_id', $album['album'], null, [
                                'class' => 'form-control',
                                'placeholder' => 'Select an Album',
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>
            Preview Image:
            <div id="imagePreviewContainer" style="display: none;">
                <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
            </div>
            <br>
            <table class="table table-striped table-bordered" id="image_wrapper">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>
                        {!! Form::file('image[]', [
                            'class' => 'form-control-file',
                            'placeholder' => 'Image',
                            'onchange' => 'previewImage(this)',
                            'accept' => 'image/*',
                        ]) !!}
                        @error('image.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td><input type="text" name="title[]" class="form-control" placeholder="Enter Image Title" />
                        @error('title.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <a class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </table>
            <button class="btn btn-info" type="button" id="addMoreImage" style="margin-bottom: 20px">
                <i class="fa fa-plus"></i>
                Add
            </button>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!} <br>
            </div>

        </div>
        {{ Form::close() }}

        <!-- /.card-body -->

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
    <script>
        var image_wrapper = $("#image_wrapper"); //Fields wrapper
        var add_button_image = $("#addMoreImage"); //Add button ID
        var x = 1;
        $(add_button_image).click(function(e) { //on add input button click
            e.preventDefault();
            var max_fields = 50; //maximum input boxes allowed
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                //add new row
                $("#image_wrapper tr:last").after(
                    '<tr>' +
                    '<td>{!! Form::file('image[]', [
                        'class' => 'form-control-file',
                        'placeholder' => 'Image',
                        'onchange' => 'previewImage(this)',
                        'accept' => 'image/*',
                    ]) !!}</td>' +
                    '<td><input type="text" name="title[]" class="form-control" placeholder="Enter Image Title"/></td>' +
                    '   <td>' +
                    '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>' +
                    '   </td>' +
                    '</tr>'
                );
            } else {
                alert('Maximum Image Limit is 50');
            }
        });
        $(image_wrapper).on("click", ".remove_row", function(e) {
            e.preventDefault();
            $(this).parents("tr").remove();
            x--;
        });
    </script>
@endsection
