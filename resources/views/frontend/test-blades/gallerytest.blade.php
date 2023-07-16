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
    </section>
    <section class="gallery">
        <div class="gallery-body">
            <div class="gallery-section row">
                @foreach ($data['album'] as $item)
                    @if (count($item->gallery) > 0)
                        <div class="card">
                            <div class="gallery-item">
                                @if ($item->cover_image)
                                    <img src="{{ asset('public/Image/albums/' . $item->cover_image) }}"
                                        class="modal-main-img" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}" alt="">
                                @else
                                    @if ($item->id == $item->gallery[0]->album_id)
                                        <img src="{{ asset('public/Image/gallery/' . $item->gallery[0]->image) }}"
                                            class="modal-main-img" type="button" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"
                                            alt="">
                                    @endif
                                @endif
                            </div>
                            <div class="gallery-title">
                                <h5>{{ $item->title }}</h5>
                            </div>
                        </div>

                        <!-- Modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">{{ $item->title }}</h5>
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

                                                                <h5 class="modal-title text-center" id="exampleModalLabel{{ $item->id }}">{{ $galleryItem->title }}</h5>

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
                        <!-- End Modal -->

                        <!-- End Modal -->
                    @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection
