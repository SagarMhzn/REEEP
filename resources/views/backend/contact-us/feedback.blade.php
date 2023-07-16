@extends('layouts.backend')

@section('content')

    {{-- {{ dd($parent_id) }} --}}
    <div class="d-flex justify-content-between menu-header">

        <h2 style="text-align: center;">Feedback List</h2>


        <a href="{{ route('backend.contact.create') }}" class="btn btn-primary btn-menu" title="Update Contacts">
            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
        </a>
    </div>


    @if (count($message) != 0)
        <div class="card card-warning">

            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($message as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td class="text-center">{{ $items->name }}</td>
                                <td class="text-center">
                                    {{ $items->phone }}
                                </td>
                                <td class="text-center">
                                    {{ $items->email }}
                                </td>
                                <td class="text-center">
                                    <p>
                                        {{ substr($items->subject, 0,20) }}
                                    </p>
                                </td>
                                <td class="d-flex text-center justify-content-xl-around">
                                    <a href="
                                    {{ route('backend.message.show', $items->id) }}
                                    "
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-eye"></i></div>
                                    </a>

                                    <form action="{{ route('backend.message.destroy', $items->id) }}" method="POST">
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
