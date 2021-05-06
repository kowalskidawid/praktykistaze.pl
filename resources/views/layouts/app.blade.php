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
            @include('partials.menu.big')
        </div>
    </div>
    {{-- MAIN --}}
    <main class="flex items-start w-full">
        {{-- MENU --}}
        <div class="hidden md:block">
            {{-- MENU-SHRINKED --}}
            <div id="menuShrinked" style="display: block">
                @include('partials.menu.small')
            </div>
            {{-- MENU-EXPANDED --}}
            <div id="menuExpanded" style="display: none">
                @include('partials.menu.big')
            </div>
        </div>
        <div class="w-full h-screen flex flex-col justify-between overflow-y-auto">
            <div>
                @yield('content')
            </div>
            <div>
                @include('partials.footer')
            </div>
        </div>
    </main>
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
        function toggleMenu() {
            const x = document.getElementById("menuShrinked");
            const y = document.getElementById("menuExpanded");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "block";
            }
        }
    </script>
</body>
</html>
