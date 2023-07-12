@extends('layouts.app')

@section('content')
    <section id="workingareas" @if (count($data['area']) == 0) style="display: none;" @endif>
        <section id="works" class="works">
            <div class="work-hero">
                <div class="container" data-aos="fade-up">
                    <div class="work-hero">
                        <h2>Our Working Areas</h2>
                    </div>
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row portfolio-container" data-aos="fade-up">
                    @foreach ($data['area'] as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap"  type="button" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $item->id }}">
                                <img src="{{ asset('public/Image/workingarea/' . $item->logo) }}" class="card-img-top"
                                    alt="Working Area Image not Found" style="object-fit: cover; height: 200px;">
                                <div class="portfolio-info">
                                    <h4>{{ $item->title }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">{{ $item->title }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('public/Image/workingarea/' . $item->logo) }}" class="img-fluid"
                                            alt="Working Area Image not Found">
                                        <p>{{ $item->description }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Learn More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </section>
    
@endsection
