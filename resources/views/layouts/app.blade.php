<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('dash::layouts.head')
<body class="{{ config('dash.layouts.sidebar') ? '' : 'sidebar--closed' }}" data-sidebar-toggler="{{ config('dash.hooks.sidebar_toggler') }}">
    @includeIf(config('dash.layouts.loader'))

    <div id="{{ config('dash.root_id') }}">
        @includeIf(config('dash.layouts.navbar'))

        @includeIf(config('dash.layouts.sidebar'))

        <main class="main-content {{ config('dash.layouts.navbar') ? '' : 'mt-3'}}">
            @yield(config('dash.sections.content_header'))

            @yield(config('dash.sections.content'))
        </main>
    </div>

    @includeIf(config('dash.layouts.scripts'))
</body>
</html>
