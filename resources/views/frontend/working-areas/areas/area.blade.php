@extends('layouts.app')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Our Working Areas</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/areas') }}">Working Areas</a></li>
                <li>{{ $data['area']->title }}</li>
            </ol>
        </div>
    </section>
    <section id="about" class="about">
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('public/Image/workingarea/'.  $data['area']->logo ) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 content">
                    <h2 class="text-center">{{ $data['area']->title }}</h2>
                    <p class="fst-italic py-3">
                        {!! nl2br( $data['area']->description) !!}
                    </p>

                </div>

            </div>
    </section>
@endsection
