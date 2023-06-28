@extends('layouts.app')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
        <div class="container">
            <div class="breadcrumb-hero">
                <h2>Area 1</h2>

            </div>
        </div>
    </div>
    <div class="container">
        <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Area 1</li>
        </ol>
    </div>
</section>

<section>

    <div class="row">
        <div class="col">
            <div class="card">
                <img src="{{ asset('about/about1.jpg') }}" alt="">
                <div class="card-title">
                    atta tatta 
                </div>
            </div>
        </div>
    </div>
</section>


@endsection