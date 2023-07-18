@extends('layouts.backend')
@section('Heading', 'Working Areas')

@section('content')
    <div class="flex-end" style="float:right">
        <a href="{{ route('backend.workingareas.create') }}" class="btn btn-primary btn-menu">
            Add more <i class="fas fa-plus"></i>
        </a>
    </div>
    <br><br>


    @if (count($workingarea) != 0)
        <div class="card card-warning">
            @include('backend.includes.flash')
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workingarea as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class="text-center">{{ $items->title }}</td>
                                <td class="text-center">
                                    {{ $items->description }}
                                </td>
                                <td class="text-center">
                                    @if ($items->logo)
                                        <img src="{{ url('public/Image/workingarea/' . $items->logo) }}" class="image-prev" alt="Image" />
                                    @else
                                        {{-- <img src="{{ url('public/Image/no-image.jpg') }}" width="250px" height="200px"
                                            style="object-fit: cover" alt="Image" /> --}}

                                            <i >~~~ No Image ~~~</i>
                                    @endif
                                </td>
                                <td class="d-flex text-center justify-content-xl-between">
                                    <a href="
                            {{ route('backend.workingareas.edit', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>
                                    <a href="
                            {{ route('backend.workingareas.delete', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-danger mr-1"><i class="fas fa-trash"></i></div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="d-flex row w-100 justify-content-between h-20" style="margin:auto;">
    {{ $menus->links() }}
</div> --}}
    @else
        <div class="card-header">
            {{ __('There are currently no Working Areas Articles! ') }} </div>
    @endif
@endsection
