@extends('layouts.backend')
@section('Heading', 'Albums')

@section('content')
    <div class="flex-end" style="float:right">
        <a href="{{ route('backend.album.create') }}" class="btn btn-primary btn-menu">
            Add more <i class="fas fa-plus"></i>
        </a>
    </div>
    <br><br>


    @if (count($album) != 0)
        <div class="card card-warning">
            @include('backend.includes.flash')
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Cover Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($album as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class="text-center">{{ $items->title }}</td>
                                <td class="text-center">
                                    @if ($items->cover_image)
                                        <img src="{{ url('public/Image/albums/' . $items->cover_image) }}" class="image-prev" alt="Image" />
                                    @else
                                        {{-- <img src="{{ url('public/Image/no-image.jpg') }}" width="250px" height="200px"
                                            style="object-fit: cover" alt="Image" /> --}}

                                            <i >~~~ No Image ~~~</i>
                                    @endif
                                </td>
                                <td class="d-flex text-center justify-content-xl-around">
                                    <a href="
                            {{ route('backend.album.edit', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>
                                    <form action="{{ route('backend.album.destroy', $items->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="text-decoration-none fs-4 btn btn-danger mr-1"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
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
            {{ __('There are currently no Albums! ') }} </div>
    @endif
@endsection
