{{-- @if(isset($menuItem['children']))
    <li class="nav-item dropdown">
        <a class="nav-link" href="{{ $menuItem['slug'] }}">
            {{ $menuItem['title'] }}
            @if(count($menuItem['children']) > 0)
                <div class="dropdown-toggle"></div>
            @endif
        </a> 
        <ul class="dropdown-menu">
            @foreach($menuItem['children'] as $childItem)
                @include('partials.home-menu-item', ['menuItem' => $childItem])
            @endforeach
        </ul>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{ $menuItem['slug'] }}">{{ $menuItem['title'] }}</a>
    </li>
@endif --}}


@if(isset($menuItem['children']) && count($menuItem['children']) > 0)
    <li class="nav-item dropdown">
        <a class="nav-link" href="{{ $menuItem['slug'] }}">
            {{ $menuItem['title'] }}
            <div class="dropdown-toggle"></div>
        </a> 
        <ul class="dropdown-menu">
            @foreach($menuItem['children'] as $childItem)
                @include('partials.home-menu-item', ['menuItem' => $childItem])
            @endforeach
        </ul>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{ $menuItem['slug'] }}">{{ $menuItem['title'] }}</a>
    </li>
@endif
