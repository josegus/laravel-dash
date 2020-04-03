<script src="{{ asset(mix('app.js', 'vendor/dash')) }}"></script>

@if(config('dash.datatable.enabled') || isset($datatable) && $datatable)
    <script src="{{ config('dash.datatable.js') ?? asset(mix('assets/datatables/datatables.min.js', 'vendor/dash')) }}"></script>
@endif

@stack(config('dash.sections.scripts'))
