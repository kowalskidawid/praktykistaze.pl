@extends('layouts.app')

@section('content')
{{-- Main --}}
<div class="p-4 m-auto max-w-screen-lg h-full">
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-8">
    {{-- Aside --}}
    <div class="flex flex-col space-y-4">
        <div class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-4">
            <ul class="flex flex-col space-y-2">
                <li class="flex">
                    <a href="{{ route('dashboard.index') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard') ? 'bg-blue-600 text-white' : ''}}">{{ __('Dashboard')}}</a>
                </li>
                <li class="flex">
                    <a href="{{ route('dashboard.settings') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/settings') ? 'bg-blue-600 text-white' : ''}}">{{ __('Settings')}}</a>
                </li>
                <li class="flex">
                    <a href="{{ route('dashboard.profile') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/profile') ? 'bg-blue-600 text-white' : ''}}">{{ __('Profile')}}</a>
                </li>
                {{-- Student links --}}
                @if(Auth::user()->roleCheck('student'))
                <li class="flex">
                    <a href="{{ route('dashboard.favourites') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/favourites') ? 'bg-blue-600 text-white' : ''}}">{{ __('Favourites')}}</a>
                </li>
                <li class="flex">
                    <a href="{{ route('dashboard.applications') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/applications') ? 'bg-blue-600 text-white' : ''}}">{{ __('Applications')}}</a>
                </li>
                @endif
                @if(Auth::user()->roleCheck('company'))
                {{-- Company links --}}
                <li class="flex">
                    <a href="{{ route('dashboard.offers') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/offers') ? 'bg-blue-600 text-white' : ''}}">{{ __('Offers')}}</a>
                </li>
                <li class="flex">
                    <a href="{{ route('dashboard.applicants') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/applicants') ? 'bg-blue-600 text-white' : ''}}">{{ __('Applicants')}}</a>
                </li>
                @endif
                {{-- Logout --}}
                <li>
                    <hr>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf
                        <button type="submit" class="w-full text-sm text-left font-medium px-4 py-2 rounded hover:bg-red-600 hover:text-white">{{ __('Logout')}}</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    {{-- Content --}}
    <div class="w-full flex flex-col space-y-4">
        @yield('main')
    </div>
</div>
</div>
@endsection