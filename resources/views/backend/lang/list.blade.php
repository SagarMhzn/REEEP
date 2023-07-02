@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between menu-header">
        <h2 style="text-align: center;">Language List</h2>
        <div class="row">
            <div class="col-md col-md-offset-6 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md">
                <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="ne" {{ session()->get('locale') == 'ne' ? 'selected' : '' }}>Nepali</option>
                </select>
            </div>
        </div>
    </div>
{{-- {{ dd($lang) }} --}}
    @if (count($lang) != 0)
        <div class="card card-warning">
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark " style="text-align: center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lang as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-center">
                                    {{ $item->title[session('locale')] }}
                                   
                                </td>
                                <td class="text-center">
                                    {{ $item->description[session('locale')] }}
                                   
                                </td>
                                <td class="d-flex text-center justify-content-xl-between">
                                    <a href="
                                    {{-- {{ route('backend.lang.edit', $item->id) }} --}}
                                    " class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>

                                    <form action="{{ route('backend.lang.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                        <button
                                            class="btn btn-danger mr-1"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card-header">
            {{ __('There are currently no Language Articles!') }}
        </div>
    @endif

    <script type="text/javascript">
  
        var url = "{{ route('changeLang') }}";
      
        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });
      
    </script>

@endsection
