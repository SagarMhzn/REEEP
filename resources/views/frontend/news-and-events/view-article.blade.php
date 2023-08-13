@extends('layouts.app')

@section('content')
    <section id="blog " class="blog">

        <section id="works" class="works">
            <div class="work-hero">
                <div class="container">
                    <div class="work-hero">
                        <h2>News and Events</h2>
                    </div>
                </div>
            </div>
        </section>
        <div class="container py-2">

            <div class="row">

                <div class="col-lg-8 entries" >

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

                            <div class="entry-meta col  float-end" >
                                <ul>
                                    <li><i class="bi bi-clock"></i> <a
                                            href="#"><small>{{ Str::substr($data['NaE_latest']->created_at, 0, 10) }}</small></a>
                                    </li>
                                    <li>
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
                                {!! nl2br($data['NaE_latest']->description) !!}
                            </p>
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
                                <small><a href="{{ route('frontend.news-and-events.main') }}">View All<i
                                            class="bi bi-arrow-right"></i></a></small>
                            </div>
                        </div>
                        <div class="sidebar-item recent-posts">

                            @foreach ($data['NaE_latest_five'] as $items)
                                <div class="post-item clearfix" id="sidebar-item-{{ $items->id }}">
                                    <img src="{{ asset('public/Image/news-and-events/' . $items->image) }}" alt="">
                                    <h4><a href="#" class="sidebar-item-link"
                                            data-id="{{ $items->id }}">{{ mb_strlen($items->title, 'UTF-8') > 25 ? mb_substr($items->title, 0, 25, 'UTF-8') . '...' : $items->title }}</a></h4>
                                            <div class="d-flex mx-4">
                                  
                                        <small class="mx-3 text-secondary">{{ Str::substr($items->created_at, 0, 10) }}</small>
                                        <span
                                            class="badge rounded-pill {{ $items->category == 0 ? 'bg-primary' : 'bg-info text-dark' }}">
                                            {{ $items->category == 0 ? 'News' : 'Events' }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>

                </div>

            </div>

        </div>
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
                const url = '{{ route('frontend.news-and-events.getEntry-inner') }}';
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
