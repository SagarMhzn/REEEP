@extends('layouts.app')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs py-2">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>About Us</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>About us</li>
            </ol>
        </div>
    </section>

    <section id="about" class="about">
        <div class="about-hero">
            <div class="container" data-aos="fade-up">
                <div class="about-hero">
                    <h2 align="center">About NEEP</h2>
                    </a>
                    <h4>{{ $data['about-first']->title[session('locale')] }}</h4>
                    <p>{!! nl2br($data['about-first']->description[session('locale')]) !!}</p>
                </div>
            </div>
        </div>
    </section>



    <section id="work-process" class="work-process">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2 class="text-center">{{ $data['about-second']->title[session('locale')] }}</h2>
                <p>{!! nl2br($data['about-second']->description[session('locale')]) !!}</p>
            </div>

            @foreach ($data['about'] as $key => $item)
                @if ($key % 2 == 1)
                    <div class="row content">
                        <div class="col-md-5" data-aos="fade-right">
                            <img src="{{ asset('public/Image/aboutus/'. $item->image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-4" data-aos="fade-left">
                            <h3>{{ $item->title[session('locale')] }}</h3>
                                <p class="fst-italic">
                                    {!! nl2br($item->description[session('locale')]) !!}
                                </p>
                        </div>

                    </div>
                    @else
                    <div class="row content">
                        <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                            <img src="{{ asset('public/Image/aboutus/'. $item->image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                            <h3>{{ $item->title[session('locale')] }}</h3>
                                <p class="fst-italic">
                                    {!! nl2br($item->description[session('locale')]) !!}
                                </p>
                        </div>

                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
