<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- load ckeditor from public folder --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>

<body>
    <div id="app">

        {{-- Navbar     inc is short for include. Require cannot be used in this context --}}
        @include('inc.navbar')

        <div class="container mt-5">
            {{-- Flash messages --}}
            @include('inc.messages')
            {{-- Requires installation of extension Laravel Blade Snippets to highlight blade syntax --}}
            @yield('content')
        </div>
    </div>

    {{-- execute ckeditor script to add text editor toolbar. replace('your_textarea_name') --}}
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>
</body>

</html>
