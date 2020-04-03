<nav class="navbar | fixed-top | bg-white text-dark | shadow-sm">
    <div class="d-flex align-items-center justify-content-between | w-100">
        @yield(config('dash.sections.navbar_left'), view('dash::layouts.navbar-left'))

        @yield(config('dash.sections.navbar_right'))
    </div>
</nav>
