@extends('layouts.app')

@section('content')
    
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

    <section id="blog " class="blog">

        <section id="works" class="works">
            <div class="work-hero">
                <div class="container" data-aos="fade-up">
                    <div class="work-hero">
                        <h2>News and Events</h2>
                    </div>
                </div>
            </div>
        </section>
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
                                <h6><a href="{{ route('frontend.news-and-events.main') }}">View All<i class="bi bi-arrow-right"></i></a></h6>
                            </div>
                        </div>
                        <div class="sidebar-item recent-posts">

                            @foreach ($data['NaE_latest_five'] as $items)
                                <div class="post-item clearfix" id="sidebar-item-{{ $items->id }}">
                                    <img src="{{ asset('public/Image/news-and-events/' . $items->image) }}"
                                        alt="">
                                    <h4><a href="#" class="sidebar-item-link"
                                            data-id="{{ $items->id }}">{{ $items->title }}</a></h4>
                                    <div class="d-flex justify-content-between">

                                        <time>{{ Str::substr($items->created_at, 0, 10) }}</time>
                                        <span
                                            class="badge rounded-pill {{ $items->category == 0 ? 'bg-primary' : 'bg-info text-dark' }}">
                                            {{ $items->category == 0 ? 'News' : 'Events' }}
                                        </span>
                                    </div>
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
        <div class="gallery-body" data-aos="fade-up">
            <div class="gallery-section row">
                @foreach ($data['album'] as $item)
                    @if (count($item->gallery) > 0)
                        <div class="card">
                            <div class="gallery-item">
                                @if ($item->cover_image)
                                    <img src="{{ asset('public/Image/albums/' . $item->cover_image) }}"
                                        class="modal-main-img" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"
                                        alt="">
                                @else
                                    @if ($item->id == $item->gallery[0]->album_id)
                                        <img src="{{ asset('public/Image/gallery/' . $item->gallery[0]->image) }}"
                                            class="modal-main-img" type="button" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"
                                            alt="">
                                    @endif
                                @endif


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
                                                    <div id="carouselExampleControls{{ $item->id }}"
                                                        class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach ($item->gallery as $key => $galleryItem)
                                                                <div
                                                                    class="carousel-item {{ $key === 0 ? 'active' : '' }}">
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
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselExampleControls{{ $item->id }}"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
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


    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mt-1">
        <div class="container">

            <div>
                <iframe style="border:0; width: 100%; height: 270px;" src="{{ $data['contact']->url }}" frameborder="0"
                    allowfullscreen></iframe>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4" data-aos="fade-right">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{ $data['contact']->location }}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{ $data['contact']->email }}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{ $data['contact']->phone }}</p>
                        </div>

                    </div>

                </div>


                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open([
                        'route' => 'frontend.message.store',
                        'method' => 'POST',
                        'role' => 'form',
                        'class' => 'php-email-form',
                    ]) !!}
                    <div class="col-md-12 form-group">
                        {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'id' => 'name',
                            'placeholder' => 'Your Name',
                            'required',
                        ]) !!}
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            {!! Form::text('phone', null, [
                                'class' => 'form-control',
                                'id' => 'phone',
                                'placeholder' => 'Your Phone number',
                            ]) !!}
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Your Email']) !!}
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::text('subject', null, [
                            'class' => 'form-control',
                            'id' => 'subject',
                            'placeholder' => 'Subject',
                            'required',
                        ]) !!}
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::textarea('message', null, [
                            'class' => 'form-control',
                            'rows' => '5',
                            'placeholder' => 'Message',
                            'required',
                        ]) !!}
                    </div>
                    <div class="text-center">
                        {!! Form::submit('Send Message', ['class' => 'btn btn-primary']) !!}
                        {!! Form::reset('Clear Message', ['class' => 'btn btn-warning']) !!}
                    </div>
                    {!! Form::close() !!}


                </div>

            </div>

        </div>
    </section>

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
                            <img src="{{ asset('public/Image/partners/' . $item->logo) }}" width="300"
                                height="150">
                            <h4>{{ $item->title }}</h4>
                            @if ($item->abbreviations)
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

    <section id="workingareas" @if (count($data['knowledge']) == 0) style="display: none;" @endif class="workingareas py-4">
        <section id="works" class="works">
            <div class="work-hero">
                <div class="container" data-aos="fade-up">
                    <div class="work-hero">
                        <h2>Knowledge and Resources</h2>
                    </div>
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio py-3">
            <div class="container">

                <div class="row portfolio-container" data-aos="fade-up">
                    @foreach ($data['knowledge'] as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-wrap ">
                            <img src="{{ asset('public/Image/knowledge-and-resources/images/' . $item->image) }}" width="100%"
                            height="300">
                          <div class="portfolio-info">
                              <a href="">
                                  <h4>{{ $item->title }}</h4>
                            </a>
                              <div class="portfolio-links">
                              <a href="{{ asset('public/Image/knowledge-and-resources/documents/' . $item->documents) }}"  target="_blank" title="{{ substr($item->documents, 12) }}"><i class="bi bi-filetype-pdf"></i></a>
                              <a href="{{ asset('public/Image/knowledge-and-resources/documents/' . $item->documents) }}" title="{{ substr($item->documents, 12) }}" download=""><i class="bi bi-download"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                </div>

            </div>
        </section>
    </section>

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
                const url = '{{ route('frontend.news-and-events.getEntry') }}';
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
