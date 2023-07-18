@extends('layouts.backend')
@section('Heading', 'Knowledge and Resources')

@section('content')
    <div class="flex-end" style="float:right">
        <a href="{{ route('backend.knowledge.create') }}" class="btn btn-primary btn-menu">
            Add more <i class="fas fa-plus"></i>
        </a>
    </div>
    <br><br>


    @if (count($knowledge) != 0)
        <div class="card card-warning">

            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Document</th>
                            {{-- <th scope="col">Source Link</th> --}}
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($knowledge as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class=" text-center">{{ $items->title }}</td>
                                <td class=" text-center">
                                    {{ $items->description }}
                                </td>
                                <td class=" text-center">
                                    @if ($items->image)
                                        <img src="{{ url('public/Image/knowledge-and-resources/images/' . $items->image) }}"
                                        class="image-prev" alt="Image" />
                                    @else
                                        {{-- <img src="{{ url('public/Image/no-image.jpg') }}" width="250px" height="200px"
                                            style="object-fit: cover" alt="Image" /> --}}

                                        <i>~~~ No Image ~~~</i>
                                    @endif
                                </td>
                                <td class=" text-center">
                                    @if ($items->documents)
                                        <a href="{{ asset('public/Image/knowledge-and-resources/documents/' . $items->documents) }}"
                                            target="_blank">
                                            {{ substr($items->documents, 12) }}
                                        </a>
                                    @else
                                        {{-- <img src="{{ url('public/Image/no-image.jpg') }}" width="250px" height="200px"
                                            style="object-fit: cover" alt="Image" /> --}}

                                        <i>~~~ No Image ~~~</i>
                                    @endif
                                </td>
                                {{-- <td class="-2 text-center">{{ $items->source }}</td> --}}

                                <td class=" d-flex text-center justify-content-xl-between">
                                    <a href="
                            {{ route('backend.knowledge.edit', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>

                                    <form action="{{ route('backend.knowledge.destroy', $items->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger mr-1"><i class="fas fa-trash"></i></button>

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
            {{ __('There are currently no Knowledge and Resources Articles! ') }} </div>
    @endif
@endsection
