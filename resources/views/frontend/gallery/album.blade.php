@extends('layouts.app')

@section('content')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="breadcrumb-hero">
        <div class="container" >
            <div class="breadcrumb-hero">
                <h2>{{ $album->title }}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/gallery') }}">Gallery</a></li>
            <li>{{ $album->title }}</li>
        </ol>
    </div>
</section>
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row portfolio-container" >
            @foreach ($album['gallery'] as $key => $item)
                <div class="col-lg-3 col-md-6 portfolio-item">
                        <img src="{{ asset('public/Image/gallery/' . $item->image) }}" class="img-fluid" alt="" width="300" height="165">
                        <h4>{{ $item->title }}</h4>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection