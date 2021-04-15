<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            min-height: 100vh;
            display: grid;
            grid-template-rows: min-content auto min-content;
        }
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    {{-- <nav class="bg-white p-4 shadow-sm">
        @include('partials.navbar')
    </nav> --}}
    <nav>
        @include('partials.navbar')
    </nav>
    <main class="bg-gray-100 pb-12">
        @yield('content')
    </main>
    <footer>
        @include('partials.footer')
    </footer>
</body>
</html>
