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
                    @foreach ($data['menu'] as $item)
                    <li><a href="/{{ $item->slug }}">{{ $item->title }}</a></li>
                        
                    @endforeach
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
                    @foreach ($data['social'] as $item )
                    <a href="{{ $item->source_url }}" class="{{ $item['slug'] }}" target="_blank"><i class="bi bi-{{ $item['slug'] }}"></i></a>
                    @endforeach
                </div>

            </div>

            <div class="col-lg-3 col-md-6 footer-contact">
                <h4>Our Map</h4>
                {{-- {{ dd( $data['contact']->location) }} --}}
                
                <div>
                    <iframe style="border:0; width: 100%; height: 180px;" src="{{ $data['contact']->url }}" frameborder="0"
                        allowfullscreen></iframe>
                </div>

            </div>

            
        </div>
    </div>
</div>