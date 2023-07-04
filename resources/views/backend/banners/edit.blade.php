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

    <h2 style="text-align: center;">Banners</h2>
    {{-- {{ dd($About Uss ->title) }} --}}
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update Banners</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open([
                'route' => ['backend.banner.update', $banner->id],
                'method' => 'POST',
                'enctype' => 'multipart/form-data',
            ]) !!}
            {!! csrf_field() !!}

            @method('put')
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $banner->title, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('banner_order', 'Banner_order') !!}
                        {!! Form::text('banner_order', $banner->banner_order, ['class' => 'form-control', 'placeholder' => 'Enter Banner Order']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('caption', 'Caption') !!}
                        {!! Form::textarea('caption', $banner->caption, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Caption',
                            'rows' => 2,
                            'cols' => 50,
                        ]) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">

                    <div class="form-group d-flex" style="flex-direction: column ">

                        {!! Form::label('banner_file', 'Banner_file') !!}

                        <div id="img-preview">

                            @if ($banner->banner_file)
                                <img src="{{ url('public/Image/banners/' . $banner->banner_file) }}" width="200px" height="150px"
                                    style="object-fit: fit" alt="Image" />
                            @else
                                {{-- <img src="" width="200px" height="150px"
                                    style="object-fit: fit" alt="No image Provided" /> --}}

                                    <i >~~~ No Image ~~~</i>
                            @endif

                        </div>
                        {!! Form::file('banner_file', [
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
