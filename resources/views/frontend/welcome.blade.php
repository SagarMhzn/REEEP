@extends('layouts.app')

@section('content')
    <section id="home"></section>
    <section id="hero" style="margin-bottom: 2rem">
        <div class="hero-container" data-aos="fade-up">
            <div id="carouselSection" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner col-8">
                    @foreach ($data['banner'] as $key => $banner)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('public/Image/banners/' . $banner->banner_file) }}" class="carousel-img"
                                alt="No file found">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $banner->title }}</h5>
                                <p>{{ $banner->caption }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev col-2" type="button" data-bs-target="#carouselSection"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next col-2" type="button" data-bs-target="#carouselSection"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </section>

    <section id="about" class="about">
        <div class="about-hero">
            <div class="container" data-aos="fade-up">
                <div class="about-hero">
                    <a href=" {{ route('frontend.about') }}">
                        <h2 align="center">About NEEEP</h2>
                    </a>
                    <h4 align="center">{{ $data['aboutmain']->title[session('locale')] }}</h4>
                    <p>{{ $data['aboutmain']->description[session('locale')] }}</p>
                </div>
            </div>
        </div>
    </section>



    <section id="workingareas" @if (count($data['area']) == 0) style="display: none;" @endif>
        <section id="works" class="works">
            <div class="work-hero">
                <div class="container" data-aos="fade-up">
                    <div class="work-hero">
                        <h2>Our Working Areas</h2>
                    </div>
                </div>
            </div>

            <div class="working_area_section row" data-aos="fade-up">
                @foreach ($data['area'] as $item)
                    <div class="col-md-4">
                        <div class="card mb-3" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $item->id }}">
                            <img src="{{ asset('public/Image/workingarea/' . $item->logo) }}" class="card-img-top"
                                alt="Working Area Image not Found" style="object-fit: cover; height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>

                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Learn More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </section>

    <section id="blog " class="blog">

        <div class="n_e-heading" data-aos="fade-up">
            <h2>News and Events</h2>
        </div>
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{ asset('public/Image/news-and-events/' . $data['NaE_latest']->image) }}"
                                alt="" class="img-fluid">
                        </div>
                        <div class="row">
                            <div class="col">

                                <h2 class="entry-title">
                                    <a href="#">{{ $data['NaE_latest']->title }}</a>
                                </h2>
                            </div>

                            <div class="entry-meta col" style="float: right">
                                <ul>
                                    {{-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">John
                                            Doe</a></li> --}}
                                    <li class="d-flex"><i class="bi bi-clock"></i> <a
                                            href="#"><time>{{ Str::substr($data['NaE_latest']->created_at, 0, 10) }}</time></a>
                                    </li>
                                    <li class="d-flex">
                                        <span
                                            class="badge rounded-pill {{ $data['NaE_latest']->category == 0 ? 'bg-primary' : 'bg-info text-dark' }}">
                                            {{ $data['NaE_latest']->category == 0 ? 'News' : 'Events' }}
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="entry-content">
                            <p>
                                {{-- {{ Str::substr($data['NaE_latest']->description,0, 255) }} --}}
                                {{ mb_strlen($data['NaE_latest']->description, 'UTF-8') > 255 ? mb_substr($data['NaE_latest']->description, 0, 255, 'UTF-8') . '...' : $data['NaE_latest']->description }}
                            </p>
                            <div class="read-more">
                                <a
                                    href="{{ route('frontend.news-and-events.view-article', ['id' => $data['NaE_latest']->id]) }}">Read
                                    More</a>
                            </div>

                        </div>

                    </article>
                </div>

                <div class="col-lg-4">

                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="sidebar-title">Recent Posts</h3>

                            </div>
                            <div class="col-lg-4">
                                <h6><a href="#">View All<i class="bi bi-arrow-right"></i></a></h6>
                            </div>
                        </div>
                        <div class="sidebar-item recent-posts">

                            @foreach ($data['NaE_latest_five'] as $items)
                                <div class="post-item clearfix" id="sidebar-item-{{ $items->id }}">
                                    <img src="{{ asset('public/Image/news-and-events/' . $items->image) }}"
                                        alt="">
                                    <h4><a href="#" class="sidebar-item-link"
                                            data-id="{{ $items->id }}">{{ $items->title }}</a></h4>
                                    <time>{{ Str::substr($items->created_at, 0, 10) }}</time>
                                </div>
                            @endforeach
                        </div>


                    </div>

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section>

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
                                        class="modal-main-img" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" alt="">
                                @else
                                    @if ($item->id == $item->gallery[0]->album_id)
                                        <img src="{{ asset('public/Image/gallery/' . $item->gallery[0]->image) }}"
                                            class="modal-main-img" type="button" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" alt="">
                                    @endif
                                @endif


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
        <br>
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
                            </div>
                            <div class="gallery-title">
                                <h5>{{ $item->title }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
{{-- 
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container" data-aos="fade-up">
                <div class="breadcrumb-hero">
                    <h2>Map</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="w-100">
            <p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.8668701992387!2d85.34139027536844!3d27.690509276192206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199225ddb01b%3A0x5bdcec622a9c4d75!2sYoung%20Minds%20Creation%20(P)%20Ltd!5e0!3m2!1sen!2snp!4v1687168123371!5m2!1sen!2snp"
                    width="20%" height="100" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </p>
        </div>

    </section> --}}
{{-- 

    <section id="partners"></section> --}}

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container" data-aos="fade-up">
                <div class="breadcrumb-hero">
                    <h2>Our Patners</h2>
                </div>
            </div>
        </div>
    </section>


    <section id="partner" class="partner section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @foreach ($data['partner'] as $item)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="{{ asset('public/Image/partners/' . $item->logo) }}"  width="300" height="150">
                        <h4>{{ $item->title }}</h4>
                        @if($item->abbreviations )
                            <h6>{{ $item->abbreviations }}</h6>
                        @endif
                        {{-- <span>Chief Executive Officer</span>
                        <p>
                            Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui
                            aut aut aut
                        </p> --}}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="knowledge">

    </section>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.working_area_section .card');
    
            cards.forEach((card) => {
                card.addEventListener('mouseenter', function() {
                    const img = this.querySelector('.card-img-top');
                    img.style.transform = 'scale(.8)';
                    card.style.backgroundColor = 'rgba(0, 0, 0, 0.6)';
                    card.classList.add('FadeIn-bottom');
                });
    
                card.addEventListener('mouseleave', function() {
                    const img = this.querySelector('.card-img-top');
                    img.style.transform = 'scale(1)';
                    card.style.backgroundColor = 'transparent';
                });
            });
        });
    </script> --}}




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarItemLinks = document.querySelectorAll('.sidebar-item-link');
            const entryContainer = document.querySelector('.entries');

            sidebarItemLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const itemId = this.dataset.id;
                    loadEntry(itemId);
                });
            });

            function loadEntry(itemId) {
                const url = '{{ route('backend.news-and-events.getEntry') }}';
                const formData = new FormData();
                formData.append('itemId', itemId);

                // Include CSRF token in headers
                const headers = {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                };

                fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: headers // Include headers
                    })
                    .then(response => response.text())
                    .then(data => {
                        entryContainer.innerHTML = data;
                    })
                    .catch(error => {
                        console.log('Error:', error);
                    });
            }
        });
    </script>
@endsection
