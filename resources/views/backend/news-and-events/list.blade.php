@extends('layouts.backend')

@section('content')

    {{-- {{ dd($parent_id) }} --}}
    <div class="d-flex justify-content-between menu-header">

        <h2 style="text-align: center;">Working Areas List</h2>


        <a href="{{ route('backend.news-and-events.create') }}" class="btn btn-primary btn-menu">
            <i class="fas fa-plus"></i>
        </a>
    </div>


    @if (count($nae) != 0)
        <div class="card card-warning">

            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nae as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class="text-center">{{ $items->title }}</td>
                                <td class="text-center">
                                    {{ $items->description }}
                                </td>
                                <td class="text-center">
                                    @if($items->category == 0)
                                        News
                                    @elseif($items->category == 1)
                                        Events
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($items->image)
                                        <img src="{{ url('public/Image/news-and-events/' . $items->image) }}" width="150px" height="100px"
                                            style="object-fit: fit" alt="Image" />
                                    @else
                                        {{-- <img src="{{ url('public/Image/no-image.jpg') }}" width="250px" height="200px"
                                            style="object-fit: cover" alt="Image" /> --}}

                                            <i >~~~ No Image ~~~</i>
                                    @endif
                                </td>
                                <td class="d-flex text-center justify-content-xl-between">
                                    <a href="
                            {{ route('backend.news-and-events.edit', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>
                                    <a href="
                            {{ route('backend.news-and-events.delete', $items->id) }}
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
            {{ __('There are currently no About Us Articles! ') }} </div>
    @endif
@endsection
