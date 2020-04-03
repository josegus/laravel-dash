<div>
    @if(config('dash.layouts.sidebar'))
        <!-- Sidebar toggler -->
        <a href="javascript:void(0);" class="{{ config('dash.hooks.sidebar_toggler') }} | text-reset | pr-4">
            <i class="fas fa-2x fa-bars"></i>
        </a>
    @endif

    <!-- Home url -->
    <a href="{{ config('dash.navbar.link') }}" class="text-2xl | text-reset text-decoration-none">{{ config('dash.navbar.text') }}</a>
</div>