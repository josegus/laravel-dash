<div class="sidebar__item {{ isset($active) && $active ? 'active' : '' }}">
    <a href="#" class="sidebar__link" data-toggle="collapse" data-target="#{{ str_replace(' ', '', $text) }}">
        <span>
            @if(isset($icon) && $icon)
                <i class="{{ $icon }}"></i>
            @endif
            {{ $text }}
        </span>
    </a>

    <div id="{{ str_replace(' ', '', $text) }}" class="submenu collapse {{ isset($active) && $active ? 'show' : '' }}">
        @foreach($items as $item)
            <div class="submenu__item {{ isset($item['active']) && $item['active'] ? 'active' : '' }}">
                <a class="submenu__link" href="{{ $item['url'] }}" target="{{ $item['target'] ?? '_self' }}">{{ $item['text'] }}</a>
            </div>
        @endforeach
    </div>
</div>
