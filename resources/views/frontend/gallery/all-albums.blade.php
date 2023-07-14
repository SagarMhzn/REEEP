@extends('layouts.app')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container" data-aos="fade-up">
                <div class="breadcrumb-hero">
                    <h2>Gallery</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Gallery</li>
            </ol>
        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row portfolio-container" data-aos="fade-up">
                @foreach ($data['album'] as $key => $item)
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap">
                            @if ($item->cover_image)
                                <img src="{{ asset('public/Image/albums/' . $item->cover_image) }}" class="modal-main-img"
                                    alt="">
                            @else
                                @if ($item->id == $item->gallery[0]->album_id)
                                    <img src="{{ asset('public/Image/gallery/' . $item->gallery[0]->image) }}"
                                        class="modal-main-img" alt="">
                                @endif
                            @endif
                            <div class="portfolio-info">
                                <h4>{{ $item->title }}</h4>
                                <div class="portfolio-links">
                                    <a href="{{ asset('public/Image/news-and-events/' . $item->image) }}" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"
                                        title="{{ $item->title }}"><i class="bx bx-plus"></i></a>
                                    <a href="{{ route('frontend.gallery.album',$item->id) }}"
                                        title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>


                        </div>
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">
                                            {{ $item->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div id="carouselExampleControls{{ $item->id }}" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($item->gallery as $key => $galleryItem)
                                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                            <img src="{{ asset('public/Image/gallery/' . $galleryItem->image) }}"
                                                                class="modal-img">
                                                            <br>
                                                            <h5 class="modal-title text-center"
                                                                id="exampleModalLabel{{ $item->id }}">
                                                                {{ $galleryItem->title }}</h5>

                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls{{ $item->id }}"
                                                    data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls{{ $item->id }}"
                                                    data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
