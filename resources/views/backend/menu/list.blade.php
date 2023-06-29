@extends('layouts.backend')

@section('content')

    {{-- {{ dd($parent_id) }} --}}
<div class="d-flex justify-content-between menu-header">

    <h2 style="text-align: center;">{{ $parent_title ?? 'Menu List' }}</h2>
    <a href="{{ route('backend.menu.create') }}" class="btn btn-primary btn-menu">
        <i class="fas fa-plus"></i>
    </a>
    
</div>


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
                                <td>{{ $items->status }}</td>
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
            {{ __('There are no child! ') }} </div>
    @endif
@endsection
