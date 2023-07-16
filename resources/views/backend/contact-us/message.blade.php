@extends('layouts.backend')

@section('content')
    <div class="d-flex justify-content-between menu-header">
        <h2 style="text-align: center;">Feedback From : {{ $message->name }}</h2>
    </div>


    <div class="card card-warning">
        <div class="card-body">
            <div class="col-sm-12 row">
                Name : {{ $message->name }}
            </div>

            <div class="row">
                <div class="col-sm-4">
                    Phone : {{ $message->phone }}
                </div>
                <div class="col-sm-4">
                    E-mail : {{ $message->email }}
                </div>
                <div class="col-sm-4">
                    Submitted-at : <time>{{ Str::substr($message->created_at, 0, 10) }}</time>
                </div>
            </div>

            <div class="col-sm-12 row">
                Subject : {{ $message->subject }}
            </div>
            <br>
            <div class="col-sm-12 row">
                {!! nl2br($message->message) !!}
            </div>

            <div class="row">
                <div class="col-sm 6">
                    <a href="{{ route('backend.message.index') }}" class="btn btn-primary btn-menu" title="Update Contacts">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                </div>

                <div class="col-sm 6">
                    <form action="{{ route('backend.message.destroy', $message->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-menu"
                            title="Update Contacts">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
