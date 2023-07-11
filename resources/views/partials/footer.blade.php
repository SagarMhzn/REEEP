<div class="footer-top">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 footer-info">
                <h3>REEEP</h3>
                <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                    valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet
                    proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">News and Events</a></li>
                    <li><a href="#">Knowledge and Resources</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-contact">
                <h4>Contact Us</h4>
                {{-- {{ dd( $data['contact']->location) }} --}}
                <p>
                    {{ $data['contact']->location }}<br>
                    <strong>Phone:</strong> {{ $data['contact']->phone }}<br>
                    <strong>Email:</strong> {{ $data['contact']->email }}<br>
                </p>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="tiktok"><i class="bi bi-tiktok"></i></a>
                </div>

            </div>

            
        </div>
    </div>
</div>