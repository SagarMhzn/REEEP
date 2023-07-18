@extends('layouts.backend')
@section('Heading', 'Socials')

@section('content')
    <div class="flex-end" style="float:right">
        <a href="{{ route('backend.socials.create') }}" class="btn btn-primary btn-menu">
            Add more <i class="fas fa-plus"></i>
        </a>
    </div>
    <br><br>


    @if (count($data) != 0)
        <div class="card card-warning">

            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Network Title</th>
                            <th scope="col">Network Link</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['social'] as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class="text-center">{{ $items->network_title }}</td>
                                <td class="text-center">{{ $items->source_url }}</td>
                                <td class="d-flex text-center justify-content-xl-center">
                                    <a href="
                            {{ route('backend.socials.edit', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>
                                    <form action="{{ route('backend.socials.destroy', $items->id) }}" method="POST">
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
