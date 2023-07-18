@extends('layouts.backend')
@section('Heading', 'Menu')

@section('content')
    <div class="flex-end" style="float:right">
        <a href="{{ route('backend.menu.create') }}" class="btn btn-primary btn-menu">
            Add more <i class="fas fa-plus"></i>
        </a>
    </div>
    <br><br>


    @if (count($menus) != 0)
        <div class="card card-warning">

            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Status</th>
                            <th scope="col">Order</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td>{{ $items->title }}</td>
                                <td>
                                    @if ($items->parent_id)
                                        {{ $items->parent->title }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <button class="btn  {{ $items->status == 0 ? 'btn-danger' : 'btn-success' }}">
                                    <a href="{{ route('backend.menu.toggleStatus', ['id' => $items->id]) }}"
                                        style="text-decoration-color: white; color:white;">
                                        {{ $items->status == 0 ? 'In-Active!' : 'Active!' }}
                                    </a>
                                </button>


                                </td>
                                <td>{{ $items->order }}</td>
                                <td class="d-flex">
                                    <a href="
                            {{ route('backend.menu.childlist', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-success mr-1"><i class="fas fa-eye"></i></div>
                                    </a>
                                    <a href="
                            {{ route('backend.menu.edit', $items->id) }}
                            "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>
                                    <a href="
                            {{ route('backend.menu.delete', $items->id) }}
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
            {{ __('There are no Menus! ') }} </div>
    @endif
@endsection
