<article class="entry">
    <div class="entry-img">
        <img src="{{ asset('public/Image/news-and-events/'. $entry->image) }}" alt="" class="img-fluid">
    </div>
    <h2 class="entry-title">
        <a href="#">{{ $entry->title }}</a>
    </h2>
    <div class="entry-meta">
        <ul>
            <li class="d-flex align-items-center">
                <i class="bi bi-clock"></i> <a href="#"><time
                        >{{ Str::substr($entry->created_at, 0, 10) }}</time></a>
            </li>
        </ul>
    </div>
    <div class="entry-content">
        <p>
            {{ mb_strlen($entry->description, 'UTF-8') > 255 ? mb_substr($entry->description, 0, 255, 'UTF-8') . '...' : $entry->description }}
        </p>
        <div class="read-more">
            <a href="{{ route('frontend.news-and-events.view-article', ['id' => $entry->id]) }}">Read More</a>
        </div>
    </div>
</article>
