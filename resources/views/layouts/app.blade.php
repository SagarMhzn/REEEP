<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>REEEP</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex  justify-content-between flex-column">

            <div class="logo d-flex justify-content-sm-evenly">
                <div class="logo-items">
                    <a href="{{ url('/') }}"><img src="{{ asset('logo/Emblem_of_Nepal.png') }}" alt=""
                            class="img-fluid" id="logo"></a>
                </div>


                <div class="logo-items">
                    <a href="{{ url('/') }}"><img src="{{ asset('logo/reeep_logo_new-PhotoRoom.png') }}"
                            alt="" class="img-fluid" id="logo"></a>

                    <h6>Renewable Energy and Energy Efficiency Programme</h6>
                </div>



                <div class="logo-items align-items-center">
                    <a href="#"><img src="{{ asset('logo/giz-logo.png') }}" alt="" class="img-fluid"
                            id="logo2"></a>
                </div>

                <div class="logo-items">
                    <a href="#"><img src="{{ asset('logo/nepal-germany.jpg') }}" alt="" class=""
                            id="logo3"></a>
                </div>
            </div>
            <div class="align-items-center mx-auto">
                <nav id="navbar" class="navbar">

                    @include('partials.homemenu')
                    {{-- <li><a class="active" href="#home">Home</a></li>
                        <li><a href="#aboutus">About Us</a></li>
                        <li><a href="#workingareas">Working<br /> Areas</a></li>
                        <li><a href="#NaE">News <br />and Events</a></li>
                        <li><a href="#partners">Partners</a></li>
                        <li><a href="#KaR">Knowledge <br />and resources</a></li>
                        <li><a href="#contactus">Contact Us</a></li> --}}
                        <i class="bi bi-list mobile-nav-toggle"></i>
                        <label class="switch mx-4" >
                            <input type="checkbox" class="changeLang"
                                {{ session()->get('locale') == 'ne' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    
                </nav><!-- .navbar -->
            </div>
        </div>
    </header><!-- End Header -->

    <main class="" style="margin-top:60px">
        @yield('content')
    </main>


    <footer id="footer">
        @include('partials.footer')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfFgGrcAobgjJjdMgIXsQMIfm_VlBDaXM&callback=initMap" async
        defer></script>
    
        <script type="text/javascript">
            var url = "{{ route('changeLang') }}";
        
            $(".changeLang").change(function() {
                var lang = $(this).is(":checked") ? 'ne' : 'en';
                window.location.href = url + "?lang=" + lang;
            });
        </script>

    <script>
        function initMap() {
            // Define the coordinates for the requested place
            var latitude = 37.7749; // Replace with the actual latitude
            var longitude = -122.4194; // Replace with the actual longitude

            // Create a map instance
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: latitude,
                    lng: longitude
                },
                zoom: 15 // Adjust the zoom level as needed
            });

            // Add a marker to indicate the location
            var marker = new google.maps.Marker({
                position: {
                    lat: latitude,
                    lng: longitude
                },
                map: map,
                title: 'Requested Place'
            });
        }
    </script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
