<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
@includeIf(config('dash.layouts.head'))
<body class="d-flex align-items-center py-5 h-100">
    @includeIf(config('dash.layouts.loader'))

    <div id="{{ config('dash.root_id') }}" class="splash-container">
        @yield(config('dash.sections.content'))
    </div>

    @includeIf(config('dash.layouts.scripts'))
</body>
</html>
