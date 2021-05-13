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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="relative">
    {{-- MENU-MOBILE --}}
    <div class="fixed top-0 left-0 z-10 md:hidden">        
        <div id="menuMobile" style="display: none">
            @include('partials.menu')
        </div>
    </div>
    {{-- MAIN --}}
    <div style="min-height: 100vh; display: grid; grid-template-rows: min-content auto min-content;">
        <header class="sticky top-0 bg-white border-b border-gray-200">
            @include('partials.header')
        </header>
        <main class="bg-gray-50 pb-8">
            <div class="p-4 m-auto max-w-screen-lg">
                @yield('content')
            </div>
        </main>
        <footer class="border-t border-gray-200">
            @include('partials.footer')
        </footer>
    </div>
    {{-- SCRIPTS --}}
    <script>
        function toggleMobileMenu() {
            const x = document.getElementById("menuMobile");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>
</html>
