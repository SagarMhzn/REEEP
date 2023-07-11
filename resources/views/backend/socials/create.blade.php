@extends('layouts.backend')

@section('content')
    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h4 class="text-danger " style="color:red;">{{ $error }}</h4>
            @endforeach
        @endif
    </div>

    <h2 style="text-align: center;">Socials</h2>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create New Socials Informations</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            
                {!! Form::open(['route' => ['backend.socials.store'], 'method' => 'POST']) !!}
                <table class="table table-striped table-bordered" id="image_wrapper">
                    <tr>
                        <th>Network Title</th>
                        <th>Source Link</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="network_title[]" class="form-control" placeholder="Enter Network Title" />
                            @error('network_title.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td><input type="url" name="source_url[]" class="form-control" placeholder="Enter Networks Url" />
                            @error('source_url.*')
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
        var image_wrapper = $("#image_wrapper"); //Fields wrapper
        var add_button_image = $("#addMoreImage"); //Add button ID
        var x = 1;
        $(add_button_image).click(function(e) { //on add input button click
            e.preventDefault();
            var max_fields = 10; //maximum input boxes allowed
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                //add new row
                $("#image_wrapper tr:last").after(
                    '<tr>' +
                    '<td><input type="text" name="network_title[]" class="form-control" placeholder="Enter Network Title"/></td>' +
                    '<td><input type="text" name="source_url[]" class="form-control" placeholder="Enter Networks Url"/></td>' +
                    '   <td>' +
                    '       <a class="btn btn-block btn-warning sa-warning remove_row"><i class="fa fa-trash"></i></a>' +
                    '   </td>' +
                    '</tr>'
                );
            } else {
                alert('Maximum Image Limit is 10');
            }
        });
        $(image_wrapper).on("click", ".remove_row", function(e) {
            e.preventDefault();
            $(this).parents("tr").remove();
            x--;
        });
    </script>
@endsection
