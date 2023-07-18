@extends('layouts.backend')
@section('Heading', 'Socials')

@section('content')

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

