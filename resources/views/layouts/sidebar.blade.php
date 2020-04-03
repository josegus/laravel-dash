<aside class="sidebar {{ config('dash.layouts.navbar') ? '' : 'pt-3' }}">
    @include(config('dash.layouts.sidebar-single-item'), [
        'url' => Route::has(config('dash.route_prefix').'home')
                    ? route(config('dash.route_prefix').'home')
                    : '#',
        'icon' => 'fa fa-home',
        'text' => 'Home'
    ])

    @include(config('dash.layouts.sidebar-tree-item'), [
        'icon' => 'fa fa-cube',
        'text' => 'Pages',
        'items' => [
            [
                'url' => '#',
                'text' => 'UI Elements'
            ],
            [
                'url' => '#',
                'text' => 'Form'
            ],
            [
                'url' => '#',
                'text' => 'Tables'
            ],
        ]
    ])

    @include(config('dash.layouts.sidebar-tree-item'), [
        'icon' => 'fa fa-lock',
        'text' => 'Auth',
        'items' => [
            [
                'url' => Route::has(config('dash.route_prefix').'login')
                            ? route(config('dash.route_prefix').'login')
                            : '#',
                'text' => 'Login'
            ],
            [
                'url' => Route::has(config('dash.route_prefix').'register')
                            ? route(config('dash.route_prefix').'register')
                            : '#',
                'text' => 'Register'
            ],
            [
                'url' => Route::has(config('dash.route_prefix').'password.request')
                            ? route(config('dash.route_prefix').'password.request')
                            : '#',
                'text' => 'Password request'
            ],
            [
                'url' => Route::has(config('dash.route_prefix').'password.reset')
                            ? route(config('dash.route_prefix').'password.reset', ['token' => 123])
                            : '#',
                'text' => 'Password reset'
            ],
            [
                'url' => Route::has(config('dash.route_prefix').'verification.notice')
                            ? route(config('dash.route_prefix').'verification.notice')
                            : '#',
                'text' => 'Verify email'
            ],
        ]
    ])
</aside>
