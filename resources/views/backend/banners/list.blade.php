@extends('layouts.backend')

@section('content')

    {{-- {{ dd($parent_id) }} --}}
    <div class="d-flex justify-content-between menu-header">

        <h2 style="text-align: center;">Banner List</h2>


        <a href="{{ route('backend.banner.create') }}" class="btn btn-primary btn-menu">
            <i class="fas fa-plus"></i>
        </a>
    </div>


    @if (count($banner) != 0)
        <div class="card card-warning">

            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Banner Order</th>
                            <th scope="col">Caption</th>
                            <th scope="col">Banner File</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class="text-center">{{ $items->title }}</td>
                                <td class="text-center">
                                    {{ $items->banner_order }}
                                </td>
                                <td class="text-center">
                                    {{ $items->caption }}
                                </td>
                                <td class="text-center">
                                    @if ($items->banner_file)
                                        <img src="{{ url('public/Image/banners/' . $items->banner_file) }}"
                                            class="image-prev" alt="Image" />
                                    @else
                                        {{-- <img src="{{ url('public/Image/no-image.jpg') }}" width="250px" height="200px"
                                            style="object-fit: cover" alt="Image" /> --}}

                                        <i>~~~ No Image ~~~</i>
                                    @endif
                                    <p>

                                        {{ substr($items->banner_file, 12) }}
                                    </p>

                                </td>
                                <td class="d-flex text-center justify-content-xl-between">
                                    <a href="
                                    {{ route('backend.banner.edit', $items->id) }}
                                    "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>

                                    <form action="{{ route('backend.banner.destroy', $items->id) }}" method="POST">
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
            {{ __('There are currently no Banners! ') }} </div>
    @endif
@endsection
