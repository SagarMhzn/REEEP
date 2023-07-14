<article class="entry">
    <div class="entry-img">
        <img src="{{ asset('public/Image/news-and-events/'. $entry->image) }}" alt="" class="img-fluid">
    </div>

    <div class="row">
        <div class="col">

            <h2 class="entry-title">
                <a href="#">{{ $entry->title }}</a>
            </h2>
        </div>

        <div class="entry-meta col" style="float: right">
            <ul>
                {{-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">John
                        Doe</a></li> --}}
                <li class="d-flex"><i class="bi bi-clock"></i> <a
                        href="#"><time>{{ Str::substr($entry->created_at, 0, 10) }}</time></a>
                </li>
                <li class="d-flex">
                    <span
                        class="badge rounded-pill {{ $entry->category == 0 ? 'bg-primary' : 'bg-info text-dark' }}">
                        {{ $entry->category == 0 ? 'News' : 'Events' }}
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="entry-content">
        <p>
            {!! nl2br($entry->description) !!}
        </p>
    </div>
</article>
