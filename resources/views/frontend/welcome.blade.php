@extends('layouts.app')

@section('content')
    <section id="home"></section>
    <section id="hero" style="margin-bottom: 2rem">
        <div class="hero-container" data-aos="fade-up">
            <div id="carouselSection" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner col-8">
                    @foreach ($data['banner'] as $key=>$banner )
                    
                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('public/Image/banners/' . $banner->banner_file) }}" class="carousel-img" alt="No file found">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $banner->title }}</h5>
                            <p>{{ $banner->caption }}</p>
                        </div>
                    </div>

                    @endforeach
                    {{-- <div class="carousel-item">
                        <img src="{{ asset('banners/solar_to_electric.jpg') }}" class="carousel-img" alt="b">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('banners/NEEEP_working.jpg') }}" class="carousel-img" alt="c">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div> --}}
                </div>
                <button class="carousel-control-prev col-2" type="button" data-bs-target="#carouselSection" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next col-2" type="button" data-bs-target="#carouselSection" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        {{-- <hr> --}}


    </section>
    <section id="aboutus"></section>


    <section id="about" class="about">
        <div class="about-hero">
            <div class="container" data-aos="fade-up">
                <div class="about-hero" align="center">
                    <a href=" {{ route('frontend.about') }}">
                        <h2>About NEEEP</h2>
                    </a>
                    <h4>Nepal Energy Efficiency Programme</h4>
                    <p>The new consitution of Nepal underlines the role of reliable and affordable energy and its
                        sustainable use for the fulfillment of basic needs and the economic growth of the country. However,
                        despite continuous endeavors Nepal's energy supply and demand balance, particularly electricity
                        still remains in deficit. According to international energy statistics and by regional comparison
                        Nepal shows a high energy intensity, indicating a generally inefficient use of energy in the
                        country. The Government of Nepal has recognised the problem and as part of its Nationally Determined
                        Contributions (NDCs) committed to adopt a low-carbon development pathway. Nepal intends to develop
                        cross-sectoral approaches for an economy based on low emissions. Hereby, energy efficiency is
                        particularly important for the Government of Nepal. However, so far energy efficiency is not yet
                        recognized as an essential component of energy supply in Nepal.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="workingareas"></section>

    

    <section id="works" class="works">
        <div class="work-hero">
            <div class="container" data-aos="fade-up">
                <div class="work-hero">
                    <h2>Our Working Areas</h2>
                </div>
            </div>
        </div>

        <div class="working_area_section">
            <div class="row">
                <div class=" col">
                    <a href="{{ route('frontend.workingareas') }}">

                        <img src="{{ asset('banners/img1.jpg') }}" class="working-img" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h1> area 1 </h1>
                            </div>
                            <div class="work-body">
                                <h5> This is area 1 description.</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class=" col">
                    <a href="{{ route('frontend.workingareas') }}">

                        <img src="{{ asset('banners/img1.jpg') }}" class="working-img" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h1> area 1 </h1>
                            </div>
                            <div class="work-body">
                                <h5> This is area 1 description.</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class=" col">
                    <a href="{{ route('frontend.workingareas') }}">

                        <img src="{{ asset('banners/img1.jpg') }}" class="working-img" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h1> area 1 </h1>
                            </div>
                            <div class="work-body">
                                <h5> This is area 1 description.</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class=" col">
                    <a href="{{ route('frontend.workingareas') }}">

                        <img src="{{ asset('banners/img1.jpg') }}" class="working-img" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h1> area 1 </h1>
                            </div>
                            <div class="work-body">
                                <h5> This is area 1 description.</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class=" col">
                    <a href="{{ route('frontend.workingareas') }}">

                        <img src="{{ asset('banners/img1.jpg') }}" class="working-img" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h1> area 1 </h1>
                            </div>
                            <div class="work-body">
                                <h5> This is area 1 description.</h5>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <section id="NaE"></section>

    <section id="blog " class="blog">

        <div class="n_e-heading" data-aos="fade-up">
            <h2>News and Events</h2>
        </div>
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{ asset('news_events/ne_1.jpg') }}" alt="" class="img-fluid">


                        </div>

                        <h2 class="entry-title">
                            <a href="#">Renewable Energy and Energy Efficiency Programme</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">John
                                        Doe</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                            datetime="2020-01-01">Jan 1, 2020</time></a></li>

                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                The Renewable Energy and Energy Efficiency Programme (REEEP) supports
                                the creation of necessary regulatory, institutional, and private-sector
                                conditions for the promotion of renewable energy and energy effi-ciency
                                in Nepal. The programme is being implemented by the Ministry of Energy,
                                Water Resources, and Irrigation (MoEWRI), Government of Nepal with
                                technical assistance provided by the Deutsche Gesellschaft für
                                Internationale Zusammenarbeit (GIZ) on behalf of ...
                            </p>
                            <div class="read-more">
                                <a href="#">Read More</a>
                            </div>
                        </div>

                    </article>





                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            <div class="post-item clearfix">
                                <img src="{{ asset('news_events/ne_1.jpg') }}" alt="">
                                <h4><a href="#">Renewable Energy and Energy Efficiency Programme</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
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
                <div class="card">
                    <div class="gallery-item">
                        <img src="{{ asset('logo/Emblem_of_Nepal.png') }}" class="modal-main-img" type="button"
                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            alt="">
                        {{-- <div class="gallery-links d-flex align-items-center justify-content-center">
                            <a href="assets/img/gallery/gallery-2.jpg" title="Gallery 2"
                                class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                            <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div> --}}


                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Gallery 1</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
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
                        <h3>Gallery 1</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="gallery-item">
                        <img src="{{ asset('logo/img1.jpg') }}" class="modal-main-img" type="button"
                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            alt="">
                        {{-- <div class="gallery-links d-flex align-items-center justify-content-center">
                            <a href="assets/img/gallery/gallery-2.jpg" title="Gallery 2"
                                class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                            <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div> --}}

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
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
                        <h3>Gallery 1</h3>
                    </div>

                </div>
                <div class="card">
                    <div class="gallery-item">
                        <img src="{{ asset('logo/img1.jpg') }}" class="modal-main-img" type="button"
                            class="btn btn-primary" alt="">
                        {{-- <div class="gallery-links d-flex align-items-center justify-content-center">
                            <span  title="Gallery 2"
                                class="glightbox preview-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-arrows-angle-expand"></i></span>
                            <span  class="details-link"><i class="bi bi-link-45deg"></i></span>
                        </div> --}}

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
                                                <div class="col-md-4"><img src="{{ asset('logo/img1.jpg') }}"
                                                        class="modal-img">
                                                </div>
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
                        <h3>Gallery 1</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>

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

    </section>


    <section id="partners"></section>

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container" data-aos="fade-up">
                <div class="breadcrumb-hero">
                    <h2>Our Patners</h2>
                    <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                        sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
                </div>
            </div>
        </div>
    </section>


    <section id="partner" class="partner section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="{{ asset('logo/Emblem_of_Nepal.png') }}" alt="">
                        <h4>Government Of Nepal</h4>
                        {{-- <span>Chief Executive Officer</span>
                        <p>
                            Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui
                            aut aut aut
                        </p> --}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="{{ asset('logo/giz.png') }}" alt="">
                        <h4>GIZ</h4>
                        {{--   <span>Product Manager</span>
                        <p>
                            Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum
                            temporibus
                        </p> --}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="{{ asset('logo/nepal-germany.jpg') }}" alt="">
                        {{-- <h4>William Anderson</h4>
                        <span>CTO</span>
                        <p>
                            Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des
                            clara
                        </p> --}}
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="knowledge">

    </section>

    <script>
        const components = document.querySelectorAll('.working_area_section .col');

        components.forEach((component) => {
            component.addEventListener('mouseenter', function() {
                const workBody = this.querySelector('.work-body');
                workBody.style.display = 'block';
            });

            component.addEventListener('mouseleave', function() {
                const workBody = this.querySelector('.work-body');
                workBody.style.display = 'none';
            });
        });
    </script>
@endsection
