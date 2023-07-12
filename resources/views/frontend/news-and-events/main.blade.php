@extends('layouts.app')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>News and Events</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>News and Events</li>
            </ol>
        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
                    <ul id="portfolio-flters">
                        <li data-filter=".filter-app">News</li>
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-card">Events</li>
                    </ul>
                </div>
            </div>
            @foreach ($data['nae'] as $key => $item)
                <div class="row portfolio-container" data-aos="fade-up">
                    @if ($item->category == 0)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('public/Image/news-and-events/' . $item->image) }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $item->title }}</h4>
                                    <p><i class="bi bi-clock"></i> <time>{{ Str::substr($item->created_at, 0, 10) }}</time>
                                    </p>
                                    <div class="portfolio-links">
                                        <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title="{{ $item->title }}"><i
                                                class="bx bx-plus"></i></a>
                                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                    </div>
                                    
                                        <span
                                            class="badge rounded-pill {{ $item->category == 0 ? 'bg-primary' : 'bg-info text-dark' }}">
                                            {{ $item->category == 0 ? 'News' : 'Events' }}
                                        </span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('public/Image/news-and-events/' . $item->image) }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $item->title }}</h4>
                                    <p><i class="bi bi-clock"></i> <time>{{ Str::substr($item->created_at, 0, 10) }}</time>
                                    </p>
                                    <div class="portfolio-links">
                                        <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title="{{ $item->title }}"><i
                                                class="bx bx-plus"></i></a>
                                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                    </div>
                                    
                                        <span
                                            class="badge rounded-pill {{ $item->category == 0 ? 'bg-primary' : 'bg-info text-dark' }}">
                                            {{ $item->category == 0 ? 'News' : 'Events' }}
                                        </span>
                                   
                                </div>
                            </div>
                        </div>
                    @endif
            @endforeach
        </div>
    </section>
@endsection
