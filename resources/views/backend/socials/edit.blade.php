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
            
                {!! Form::open(['route' => ['backend.socials.update', $social->id], 'method' => 'POST']) !!}

                @method('put')
                <table class="table table-striped table-bordered" id="image_wrapper">
                    <tr>
                        <th>Network Title</th>
                        <th>Source Link</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="network_title" class="form-control" placeholder="Enter Network Title" 
                            value="{{ $social->network_title }}"/>
                            @error('network_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td><input type="url" name="source_url" class="form-control" placeholder="Enter Networks Url"
                            value="{{ $social->source_url }}" />
                            @error('source_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                    
                        <td>
                            <a class="btn btn-block btn-warning sa-warning remove_row "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </table>
                
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
        $(image_wrapper).on("click", ".remove_row", function(e) {
            e.preventDefault();
            $(this).parents("tr").remove();
            x--;
        });
    </script>
@endsection
