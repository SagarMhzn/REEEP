@extends('layouts.backend')

@section('content')

    {{-- {{ dd($parent_id) }} --}}
    <div class="d-flex justify-content-between menu-header">

        <h2 style="text-align: center;">Gallery List</h2>


        <a href="{{ route('backend.gallery.create') }}" class="btn btn-primary btn-menu">
            <i class="fas fa-plus"></i>
        </a>
    </div>


    @if (count($gallery) != 0)
        <div class="card card-warning">

            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Album</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class="text-center">{{ $items->album->title }}</td>
                                <td class="text-center">{{ $items->title }}</td>
                                <td class="text-center">
                                    @if ($items->image)
                                        <img src="{{ url('public/Image/gallery/' . $items->image) }}" class="image-prev"
                                            alt="Image" />
                                    @else
                                        {{-- <img src="{{ url('public/Image/no-image.jpg') }}" width="250px" height="200px"
                                            style="object-fit: cover" alt="Image" /> --}}

                                        <i>~~~ No Image ~~~</i>
                                    @endif
                                </td>
                                <td class="d-flex text-center justify-content-xl-center">
                                    <a href="
                            {{ route('backend.gallery.edit', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>
                                    <form action="{{ route('backend.gallery.destroy', $items->id) }}" method="POST">
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
