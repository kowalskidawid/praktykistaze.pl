@extends('layouts.app')

@section('content')
{{-- Main --}}
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-8">
    {{-- Aside --}}
    <div class="flex flex-col space-y-4">
        <div class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-4">
            <ul class="flex flex-col space-y-2">
                <li class="flex">
                    <a href="{{ route('dashboard.index') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard') ? 'bg-blue-600 text-white' : ''}}">Dashboard</a>
                </li>
                <li class="flex">
                    <a href="{{ route('dashboard.settings') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/settings') ? 'bg-blue-600 text-white' : ''}}">Settings</a>
                </li>
                <li class="flex">
                    <a href="{{ route('dashboard.profile') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/profile') ? 'bg-blue-600 text-white' : ''}}">Profile</a>
                </li>
                {{-- Student links --}}
                @if(Auth::user()->roleCheck('student'))
                <li class="flex">
                    <a href="{{ route('dashboard.favourites') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/favourites') ? 'bg-blue-600 text-white' : ''}}">Favourites</a>
                </li>
                <li class="flex">
                    <a href="{{ route('dashboard.applications') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/applications') ? 'bg-blue-600 text-white' : ''}}">Applications</a>
                </li>
                @endif
                @if(Auth::user()->roleCheck('company'))
                {{-- Company links --}}
                <li class="flex">
                    <a href="{{ route('dashboard.offers') }}" class="w-full text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 hover:text-white {{ request()->is('dashboard/offers') ? 'bg-blue-600 text-white' : ''}}">Offers</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    {{-- Content --}}
    <div class="w-full flex flex-col space-y-4">
        @yield('main')
    </div>
</div>
@endsection