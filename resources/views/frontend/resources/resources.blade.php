@extends('layouts.app')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs py-4">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Knowledge and Resources</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Knowledge and Resources</li>
            </ol>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="container">
            <div class="row">
                @foreach ($knowledge as $key => $item)
                    <div class="col-lg-3 col-md-6 my-2">
                        <div class="box" data-aos="fade-up">
                            <h3>{{ $item->title }}</h3>
                            <img src="{{ asset('public/Image/knowledge-and-resources/images/' . $item->image) }}"
                                alt="" width="200">
                            <h6>{{ $item->description }}</h6>

                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-warning">
                                        <a  href="{{ asset('public/Image/knowledge-and-resources/documents/' . $item->documents) }}"
                                            target="_blank" title="{{ substr($item->documents, 12) }}"><i
                                                class="bi bi-filetype-pdf"></i></a>
                                    </button>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary">
                                        <a  href="{{ asset('public/Image/knowledge-and-resources/documents/' . $item->documents) }}"
                                            title="{{ substr($item->documents, 12) }}" download="{{ substr($item->documents, 12) }}"><i
                                                class="bi bi-download"></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
