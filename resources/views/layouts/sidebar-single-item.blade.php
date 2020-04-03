<div class="sidebar__item {{ isset($active) && $active ? 'active' : '' }}">
    <a href="{{ $url }}" target="{{ $target ?? '_self' }}" class="sidebar__link">
        <span>
            @if(isset($icon) && $icon)
                <i class="{{ $icon }}"></i>
            @endif
            {{ $text }}
        </span>
    </a>
</div>
