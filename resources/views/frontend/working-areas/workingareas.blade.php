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
                <li>Working Areas</li>
            </ol>
        </div>
    </section>

    @if (count($data['area']) != 0)
        <section id="features" class="features">
            <div class="container">
                <div class="row">
                    @foreach ($data['area'] as $item )    
                    <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="card" style="background-image: url(public/Image/workingarea/{{ $item->logo }});">
                            <div class="card-body">
                                <h5 class="card-title"><a href="">{{ $item->title }}</a></h5>
                                <p class="card-text">{{ mb_strlen($item->description, 'UTF-8') > 255 ? mb_substr($item->description, 0, 255, 'UTF-8') . '...' : $item->description }}</p>
                                <div class="read-more"><a href="{{ route('frontend.workingareas.area', $item->id) }}"><i class="bi bi-arrow-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
    @else
    @endif
@endsection
