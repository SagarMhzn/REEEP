@php
    $menuItemsCount = count($menuItems);
@endphp

<ul class="ml-auto">
    @foreach($menuItems as $index => $menuItem)
        @if($index < 7)
            @include('partials.home-menu-item', ['menuItem' => $menuItem])
        @endif
    @endforeach

    @if($menuItemsCount > 4)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More
            </a>
            <ul class="dropdown-menu">
                @foreach($menuItems as $index => $menuItem)
                    @if($index >= 7)
                        @include('partials.home-menu-item', ['menuItem' => $menuItem])
                    @endif
                @endforeach
            </ul>
        </li>
    @endif
</ul>
