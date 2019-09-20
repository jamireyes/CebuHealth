<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cebu Health') }}</title>
    
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('include.navbar')
        <div class="container py-4">
            @yield('content')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
@toastr_render
</html>
