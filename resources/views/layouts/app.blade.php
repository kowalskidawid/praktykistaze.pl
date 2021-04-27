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
<body class="relative">
    {{-- MENU MOBILE --}}
    <div id="menu" class="fixed top-0 left-0 z-10 h-screen w-full bg-gray-900 bg-opacity-10 backdrop-filter backdrop-blur-sm transition" style="display: none">
        @include('partials.menu')
    </div>
    {{-- NAV --}}
    <nav class="sticky top-0 left-0 bg-white p-4 flex justify-between items-center">
        {{-- LOGO --}}
        <a href="{{ route('index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 32 32">
                <path fill="#111827" d="M6 0a6 6 0 00-6 6v20a6 6 0 006 6h1V16a9 9 0 115 8.064V32h14a6 6 0 006-6V6a6 6 0 00-6-6H6z"/>
                <path fill="#111827" d="M20 16a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </a>
        {{-- BURGER --}}
        <div onclick="toggleMobileMenu()" class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="22" fill="none" viewBox="0 0 32 22">
                <path fill="#111827" d="M32 19.889c0 .982-.796 1.778-1.778 1.778H14.778a1.778 1.778 0 010-3.556h15.444c.982 0 1.778.796 1.778 1.778zM32 11c0 .982-.796 1.778-1.778 1.778H1.778a1.778 1.778 0 010-3.556h28.444c.982 0 1.778.796 1.778 1.778zm0-8.889c0 .982-.796 1.778-1.778 1.778H1.778a1.778 1.778 0 110-3.556h28.444C31.204.333 32 1.13 32 2.111z"/>
            </svg>
        </div>
    </nav>
    {{-- MAIN --}}
    <main class="">
        @yield('content')
    </main>
    {{-- FOOTER --}}
    <footer>
        {{-- @include('partials.footer') --}}
    </footer>
    {{-- SCRIPTS --}}
    <script>
        function toggleMobileMenu() {
            const x = document.getElementById("menu");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>
</html>
