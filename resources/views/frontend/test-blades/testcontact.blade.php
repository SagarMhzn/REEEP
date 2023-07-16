{{-- @extends('layouts.app')

@section('content')
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
                <iframe style="border:0; width: 100%; height: 270px;" src="{{ $contact->url }}" frameborder="0"
                    allowfullscreen></iframe>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4" data-aos="fade-right">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{ $contact->location }}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{ $contact->email }}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{ $contact->phone }}</p>
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
@endsection --}}


<!DOCTYPE html>
<html>
<head>
    <title>Laravel Google ReCaptcha V2 Example - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Laravel Google ReCaptcha V2 Example - ItSolutionStuff.com</h3>
                    </div>
                    <div class="card-body">
                   
                        <form method="POST" action="{{ route('frontend.message.store') }}">
                            {{ csrf_field() }}
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone:</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Subject:</strong>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Message:</strong>
                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                       
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>ReCaptcha:</strong>
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>