<?php

return [

    /*
     * Hooks used in js file
     */
    'hooks' => [

        /*
         * Sidebar toggler hook
         */
        'sidebar_toggler' => 'js-sidebar-toggler',
    ],

    /*
     * Base url added as meta tag value
     */
    'base_url' => '/',

    /*
     * Prefix name for admin routes. Example: "admin." will be converted to "admin.login" in login form
     */
    'route_prefix' => '',

    /*
     * ID of the root wrapper element. Used for vue compatibility
     */
    'root_id' => 'app',

    /*
     * Layouts for different page sections
     */
    'layouts' => [
        /*
         * Base layout for auth pages
         */
        'auth' => 'dash::layouts.auth',

        /*
         * Base layout for dashboard
         */
        'app' => 'dash::layouts.app',

        /*
         * Base layout for head content
         */
        'head' => 'dash::layouts.head',

        /*
         * Base layout for scripts content
         */
        'scripts' => 'dash::layouts.scripts',

        /*
         * Base layout for navbar content. Set to "false" to disable it
         */
        'navbar' => 'dash::layouts.navbar',

        /*
         * Base layout for sidebar content. Set to "false" to disable it
         */
        'sidebar' => 'dash::layouts.sidebar',

        /*
         * Base layout for sidebar single item link
         */
        'sidebar-single-item' => 'dash::layouts.sidebar-single-item',

        /*
         * Base layout for sidebar tree item
         */
        'sidebar-tree-item' => 'dash::layouts.sidebar-tree-item',

        /*
         * Base layout for loader spinner. Set to "false" to disable it
         */
        'loader' => 'dash::layouts.loader',
    ],

    /*
     * Sections are areas where you can push content to views.
     * Each section represents a @yield blade directive.
     */
    'sections' => [
        'head' => 'head',

        'scripts' => 'scripts',

        'navbar_left' => 'navbar_left',

        'navbar_right' => 'navbar_right',

        'content_header' => 'content_header',

        'content' => 'content',
    ],

    /*
     * Logo used in auth and dashboard. Set "false" to disabled it
     */
    'logo' => 'img/logo.png',

    'navbar' => [
        /*
         * Text showed in navbar
         */
        'text' => env('APP_NAME', 'My App'),

        /*
         * Link applied to navbar text
         */
        'link' => '/admin'
    ],

    'fontawesome' => [
        /*
         * Path to fontawesome. Must be a full path to css file. Set to null if you will use a cdn link
         */
        'path' => null,

        /*
         * Link to fontawesome cdn. Set to null if you will use a path to css file
         */
        'cdn' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css',
    ],

    'datatable' => [
        /*
         * Determine if datatable will be enable by default in all views. Set "false" to disable it
         */
        'enabled' => false,

        /*
         * Path or cdn to datatables css. Set "null" to use default included css file
         */
        'css' => null,

        /*
         * Path or cdn to datatables js. Set "null" to use default included js file
         */
        'js' => null,
    ]
];
