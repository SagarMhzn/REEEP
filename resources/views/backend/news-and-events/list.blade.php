@extends('layouts.backend')

@section('content')
    <div class="d-flex justify-content-between menu-header">
        <h2 style="text-align: center;">News and Events List</h2>
        <a href="{{ route('backend.news-and-events.create') }}" class="btn btn-primary btn-menu">
            <i class="fas fa-plus"></i>
        </a>
    </div>

    @if (count($nae) != 0)
        <div class="card card-warning">
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nae as $keys => $items)
                            <tr>
                                <th scope="row">{{ $keys + 1 }}</th>
                                <td>{{ $items->title }}</td>
                                <td>
                                <td>
                                    @if (mb_strlen($items->description, 'UTF-8') > 255)
                                          <div class="description" style="display:block">
                                            <div class="truncated-description">
                                              {{ nl2br(mb_strlen($items->description, 'UTF-8') > 255 ? mb_substr($items->description, 0, 255, 'UTF-8') . '...' : $items->description) }}
                                            </div>
                                            <div class="full-description" style="display: none">
                                                {!! nl2br($items->description) !!}
                                            </div>
                                          </div>
                                         
                                        @else
                                        {!! nl2br($items->description) !!}
                                        @endif
                                    
                                </td>

                                </td>
                                <td>
                                    @if ($items->category == 0)
                                        News
                                    @elseif ($items->category == 1)
                                        Events
                                    @endif
                                </td>
                                <td>
                                    @if ($items->image)
                                        <img src="{{ url('public/Image/news-and-events/' . $items->image) }}"
                                            class="image-prev" alt="Image" />
                                    @else
                                        <i>~~~ No Image ~~~</i>
                                    @endif
                                </td>
                                <td class="d-flex text-center justify-content-xl-between">
                                    <a href="{{ route('backend.news-and-events.edit', $items->id) }}"
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-warning mr-1"><i class="fas fa-edit"></i></div>
                                    </a>
                                    <a href="{{ route('backend.news-and-events.delete', $items->id) }}"
                                        class="text-decoration-none fs-4">
                                        <div class="btn btn-danger mr-1"><i class="fas fa-trash"></i></div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card-header">
            {{ __('There are currently no News and Events Articles!') }}
        </div>
    @endif

    <script>
        // JavaScript code
        document.addEventListener('DOMContentLoaded', function() {
            var descriptions = document.querySelectorAll('.description');

            descriptions.forEach(function(description) {
                var fullDescription = description.querySelector('.full-description').innerHTML.trim();
                var truncatedDescription = fullDescription.substr(0, 255);

                if (fullDescription.length > 255) {
                    description.querySelector('.truncated-description').innerHTML = truncatedDescription +
                        '...';

                    var showMoreButton = document.createElement('button');
                    showMoreButton.classList.add('show-more','btn','btn-warning');
                    showMoreButton.innerText = 'Show More';
                    showMoreButton.style.display = 'inline';

                    var showLessButton = document.createElement('button');
                    showLessButton.classList.add('show-less','btn','btn-warning');
                    showLessButton.innerText = 'Show Less';
                    showLessButton.style.display = 'none';

                    description.parentNode.appendChild(showMoreButton);
                    description.parentNode.appendChild(showLessButton);

                    showMoreButton.addEventListener('click', function() {
                        description.querySelector('.truncated-description').style.display = 'none';
                        description.querySelector('.full-description').style.display = 'block';
                        showMoreButton.style.display = 'none';
                        showLessButton.style.display = 'inline';
                    });

                    showLessButton.addEventListener('click', function() {
                        description.querySelector('.truncated-description').style.display = 'block';
                        description.querySelector('.full-description').style.display = 'none';
                        showMoreButton.style.display = 'inline';
                        showLessButton.style.display = 'none';
                    });
                }
            });
        });
    </script>
@endsection
