<div class="bg-white h-screen w-min absolute top-0 right-0" style="box-shadow: -5px 0px 10px rgba(0, 0, 0, 0.25);">
    <div class="h-full flex flex-col justify-between">
        {{-- Navigation --}}
        <div class="flex flex-col">
            {{-- CLOSE --}}
            <div class="p-4 pl-52 border-b border-gray-200 flex justify-end">
                <div class="w-8 h-8 flex items-center justify-center cursor-pointer" onclick="toggleMobileMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#111827" d="M22.791 1.209a1.71 1.71 0 00-2.417 0l-6.96 6.96a2 2 0 01-2.828 0l-6.96-6.96a1.71 1.71 0 00-2.417 2.417l6.96 6.96a2 2 0 010 2.828l-6.96 6.96a1.71 1.71 0 102.417 2.417l6.96-6.96a2 2 0 012.828 0l6.96 6.96a1.71 1.71 0 102.417-2.417l-6.96-6.96a2 2 0 010-2.828l6.96-6.96a1.71 1.71 0 000-2.417z"/>
                        <path fill="#111827" fill-rule="evenodd" d="M.855.855a2.21 2.21 0 013.124 0l6.96 6.96a1.5 1.5 0 002.122 0l6.96-6.96a2.21 2.21 0 013.124 3.124l-6.96 6.96a1.5 1.5 0 000 2.122l6.96 6.96a2.21 2.21 0 01-3.124 3.124l-6.96-6.96a1.5 1.5 0 00-2.122 0l-6.96 6.96a2.21 2.21 0 01-3.124-3.124l6.96-6.96a1.5 1.5 0 000-2.122L.855 3.98a2.21 2.21 0 010-3.124zm2.417.707a1.21 1.21 0 10-1.71 1.71l6.96 6.96a2.5 2.5 0 010 3.536l-6.96 6.96a1.21 1.21 0 001.71 1.71l6.96-6.96a2.5 2.5 0 013.536 0l6.96 6.96a1.21 1.21 0 001.71-1.71l-6.96-6.96a2.5 2.5 0 010-3.536l6.96-6.96a1.21 1.21 0 00-1.71-1.71l-6.96 6.96a2.5 2.5 0 01-3.536 0l-6.96-6.96z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            {{-- Links --}}
            <ul class="p-4 border-b border-gray-200 flex flex-col space-y-4">
                <li class="text-2xl font-semibold">
                    <a href="{{ route('offers.index') }}">Oferty</a>
                </li>
                <li class="text-2xl font-semibold">
                    <a href="{{ route('articles.index') }}">Artykuły</a>
                </li>
                <li class="text-2xl font-semibold">
                    <a href="{{ route('companies.index') }}">Firmy</a>
                </li>
                <li class="text-2xl font-semibold">
                    <a href="{{ route('students.index') }}">Studenci</a>
                </li>
            </ul>
            {{-- User profile --}}
            @if (Auth::user())
            <div class="p-4 flex items-center space-x-4">
                @if (Auth::user()->roleCheck('admin'))
                <div class="rounded-full h-9 w-9 bg-gray-200"></div>
                <div class="flex flex-col">
                    <p class="text-sm font-semibold">Admin</p>
                    <p class="text-sm">{{ Auth::user()->email }}</p>
                </div>
                @endif
                @if (Auth::user()->roleCheck('company'))
                <div class="rounded-full h-9 w-9 bg-gray-200" style="background: url({{ Auth::user()->company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
                <div class="flex flex-col">
                    <p class="text-sm font-semibold">{{ Auth::user()->company->company_name }}</p>
                    <p class="text-sm">{{ Auth::user()->email }}</p>
                </div>
                @endif
                @if (Auth::user()->roleCheck('student'))
                <div class="rounded-full h-9 w-9 bg-gray-200" style="background: url({{ Auth::user()->student->image }}); background-size: cover; background-repeat: no-repeat;"></div>
                <div class="flex flex-col">
                    <p class="text-sm font-semibold">{{ Auth::user()->student->first_name }} {{ Auth::user()->student->last_name }}</p>
                    <p class="text-sm">{{ Auth::user()->email }}</p>
                </div>
                @endif
            </div>
            {{-- Links --}}
            <ul class="p-4 pt-0 border-b border-gray-200 flex flex-col space-y-4">
                <li class="font-semibold flex space-x-6 items-center pl-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="none" viewBox="0 0 16 14">
                        <path fill="#111827" d="M4.8 13.4A3.2 3.2 0 011.7 11H0V9.4h1.7a3.2 3.2 0 113.1 4zm0-4.8a1.6 1.6 0 101.6 1.672v.32-.392a1.6 1.6 0 00-1.6-1.6zM16 11H8.8V9.4H16V11zM8.8 7a3.2 3.2 0 01-3.1-2.4H0V3h5.7a3.2 3.2 0 113.1 4zm0-4.8a1.6 1.6 0 101.6 1.672v.32V3.8a1.6 1.6 0 00-1.6-1.6zM16 4.6h-3.2V3H16v1.6z"/>
                    </svg>
                    <span>Ustawienia</span>
                </li>
                @if (Auth::user()->roleCheck('company'))
                <li class="font-semibold flex space-x-6 items-center pl-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16">
                        <path fill="#111827" d="M12.571 16a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857zM3.43 16a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857zm9.142-9.143a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857zm-9.142 0a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857z"/>
                    </svg>
                    <span>Oferty</span>
                </li>
                @endif
                @if (Auth::user()->roleCheck('student'))
                <li class="font-semibold flex space-x-6 items-center pl-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16">
                        <path fill="#111827" d="M12.571 16a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857zM3.43 16a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857zm9.142-9.143a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857zm-9.142 0a3.429 3.429 0 110-6.857 3.429 3.429 0 010 6.857z"/>
                    </svg>
                    <span>Aplikacje</span>
                </li>
                <li class="font-semibold flex space-x-6 items-center pl-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16">
                        <path fill="#111827" d="M8 15.197c-.516-.457-1.1-.933-1.716-1.44h-.008C4.104 11.981 1.642 9.972.556 7.564A5.938 5.938 0 010 5.117 4.312 4.312 0 014.4.797a4.926 4.926 0 012.662.787c.35.226.665.5.938.813.275-.312.59-.586.938-.813A4.921 4.921 0 0111.6.797a4.312 4.312 0 014.4 4.32 5.939 5.939 0 01-.555 2.45c-1.087 2.409-3.548 4.417-5.72 6.19l-.008.007c-.618.503-1.2.979-1.716 1.44L8 15.197zm-3.6-12.8a2.828 2.828 0 00-2 .794 2.674 2.674 0 00-.8 1.926c.01.617.149 1.224.41 1.783a9.852 9.852 0 002.045 2.777c.793.8 1.705 1.575 2.494 2.226.218.18.44.361.663.543l.14.114.648.533.01-.01.005-.003h.005l.007-.006h.008l.015-.012.032-.026.006-.005.009-.007h.005l.007-.006.531-.436.14-.114.665-.545c.789-.651 1.701-1.425 2.494-2.229a9.841 9.841 0 002.046-2.777 4.352 4.352 0 00.415-1.8 2.675 2.675 0 00-.8-1.92 2.828 2.828 0 00-2-.8 3.19 3.19 0 00-2.392 1.05L8 4.837 6.792 3.446A3.19 3.19 0 004.4 2.397z"/>
                    </svg>
                    <span>Ulubione</span>
                </li>
                @endif
            </ul>
            @endif
        </div>
        {{-- Buttons --}}
        <div class="p-4 flex flex-col space-y-4">
            @guest
            <a href="{{ route('register') }}" class="px-4 py-2 font-medium text-white bg-indigo-600 rounded-lg flex justify-center">Utwórz konto</a>
            <a href="{{ route('login') }}" class="px-4 py-2 font-semibold text-indigo-600 border-2 border-indigo-600 rounded-lg flex justify-center">Zaloguj się</a>
            @endguest
            @if (Auth::user())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" class="w-full px-4 py-2 font-medium text-white bg-indigo-600 rounded-lg flex justify-center" value="Wyloguj">
            </form>
            @endif
        </div>
    </div>
</div>