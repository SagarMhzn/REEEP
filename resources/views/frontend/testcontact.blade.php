@extends('layouts.app')

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
@endsection
