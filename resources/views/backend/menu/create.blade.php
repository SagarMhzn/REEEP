@extends('layouts.backend')

@section('content')
    <h2 style="text-align: center;">Create New Menus</h2>
    {{-- {{ dd($menus ->title) }} --}}
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Create New Menu</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['route' => 'backend.menu.store', 'method' => 'POST']) !!}
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status', ['' => 'Select status', '1' => 'Active', '0' => 'Inactive'], null, [
                            'class' => 'form-control',
                        ]) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                        {!! Form::label('parents', 'Select Parent Menu') !!}
                        {{-- {!! Form::select('parents', ['' => 'New Parent menu'] + $menus->pluck('title', 'id')->toArray(), null, ['class' => 'form-control', 'id' => 'parentMenuSelect']) !!} --}}

                        <select name="parents" id="" class="form-control">
                            <option value="">New Parent Menu</option>
                            @foreach ($menus as $item)
                                @include('partials.option', [
                                    'item' => $item,
                                    'parent_id' => '',
                                    'depth' => 0,
                                ])
                            @endforeach
                        </select>
                    </div>


                    {{-- <div class="form-group">
                            <div class="form-check">
                                {!! Form::checkbox('checked', null, false, ['class' => 'form-check-input', 'id' => 'newParentCheckbox']) !!}
                                {!! Form::label('newParentCheckbox', 'Check For a New Parent Menu.', ['class' => 'form-check-label']) !!}
                            </div>
                        </div> --}}
                </div>

                <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                        {!! Form::label('order', 'Select Order') !!}
                        {!! Form::text('order', null, ['class' => 'form-control', 'placeholder' => 'Enter Order']) !!}
                    </div>
                </div>
            </div>

            {!! Form::submit('Create Menu', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>

    {{-- <script>
        const checkbox = document.getElementById('newParentCheckbox');
        const select = document.getElementById('parentMenuSelect');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                select.disabled = true;
                select.selectedIndex = 0;
            } else {
                select.disabled = false;
            }
        });
    </script> --}}
@endsection
