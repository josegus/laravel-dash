<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="base-url" content="{{ url(config('dash.base_url', '/')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ config('dash.fontawesome.path') ?? config('dash.fontawesome.cdn') }}">
    <link rel="stylesheet" href="{{ asset(mix('app.css', 'vendor/dash')) }}">

    @if(config('dash.datatable.enabled') || isset($datatable) && $datatable)
        <link rel="stylesheet" href="{{ config('dash.datatable.css') ?? asset(mix('assets/datatables/datatables.min.css', 'vendor/dash')) }}">
    @endif

    @stack(config('dash.sections.head'))

    <title>{{ config('app.name') }}</title>
</head>
