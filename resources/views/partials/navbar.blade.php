<div class="border-b">
    <div class="max-w-screen-xl mx-auto p-4 flex justify-between items-center">
        {{-- Logo --}}
        <a href="{{route('home')}}" class="mr-4 flex items-center">
            <svg width="32" height="32" fill="none" viewBox="0 0 32 32">
                <g class="logo">
                  <path fill="#202938" d="M6 0a6 6 0 00-6 6v20a6 6 0 006 6h1V16a9 9 0 115 8.064V32h14a6 6 0 006-6V6a6 6 0 00-6-6H6z"/>
                  <path fill="#202938" d="M20 16a4 4 0 11-8 0 4 4 0 018 0z"/>
                </g>
            </svg>              
            <span class="ml-3 text-2xl font-bold text-gray-800 hidden md:block">{{ config('app.name') }}</span>
        </a>
        {{-- Menu --}}
        <ul class="list-none w-full flex justify-around space-x-0 items-center font-medium sm:space-x-10 sm:justify-center">
            <li>
                <a href="" class="{{ (request()->is('/offers')) ? 'text-indigo-700 font-semibold' : '' }}">
                    <div class="h-10 w-10 bg-gray-300 rounded-lg sm:hidden"></div>
                    <span class="hidden sm:block">Oferty Pracy</span>
                </a>
            </li>
            <li class="flex items-center">
                <a href="" class="{{ (request()->is('/articles*')) ? 'text-indigo-700 font-semibold' : '' }}">
                    <div class="h-10 w-10 bg-gray-300 rounded-lg sm:hidden"></div>
                    <span class="hidden sm:block">Artykuły</span>
                </a>
                <div class="hidden sm:block">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 cursor-pointer hover:text-black" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link>
                                Lorem ipsum
                            </x-dropdown-link>
                            <x-dropdown-link>
                                Lorem ipsum
                            </x-dropdown-link>
                            <x-dropdown-link>
                                Lorem ipsum
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </li>
        </ul>
        {{-- Guest --}}
        @guest
        <div class="list-none hidden ml-4 sm:flex items-center space-x-4 font-medium text-sm">
            <a href="{{route('login')}}" class="flex items-center h-10 border rounded-lg px-5 hover:bg-gray-50">Login</a>
            <a href="{{route('register')}}" class="flex items-center h-10 border rounded-lg border-gray-800 px-5 bg-gray-800 text-white hover:bg-gray-700 hover:border-gray-700">Register</a>
        </div>
        @endguest
        {{-- User --}}
        @if (Auth::user())
        <div class="ml-4 flex items-center">
            <a href="" class="flex items-center">
                <div class="h-10 w-10 bg-gray-300 rounded-full"></div>
                <div class="ml-3 hidden md:block">
                    @if (Auth::user()->roleCheck('admin'))
                    <p class="text-sm font-semibold">Admin</p>
                    @endif
                    @if (Auth::user()->roleCheck('student'))
                    <p class="text-sm font-semibold">{{ Auth::user()->student->first_name }} {{ Auth::user()->student->last_name }}</p>
                    @endif
                    @if (Auth::user()->roleCheck('company'))
                    <p class="text-sm font-semibold">{{ Auth::user()->company->company_name }}</p>
                    @endif
                    <p class="text-xs">{{ Auth::user()->email }}</p>
                </div>
            </a>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="ml-1 md:ml-3 flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        @endif
    </div>
</div>