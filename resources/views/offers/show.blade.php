@extends('layouts.app')

@section('content')
<div class="max-w-screen-xl mx-auto p-4 flex space-x-4">
    {{-- Left Column --}}
    <div class="h-full flex flex-col space-y-4">
        {{-- Company info --}}
        <div class="flex flex-col space-y-2 bg-white rounded-lg p-6 shadow-sm">
            <div class="flex">
                {{-- Company avatar --}}
                <div class="rounded-lg bg-gray-200 h-14 w-14 flex-shrink-0"></div>
                {{-- Company details --}}
                <div class="flex flex-col ml-4">
                    <p class="font-semibold text-lg whitespace-nowrap">{{ Str::limit($offer->company->company_name) }}</p>
                    <div class="flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-1 text-sm text-red-400 font-semibold">{{ $offer->city }}</p>
                    </div>
                </div>
            </div>
            {{-- Company details --}}
            <ul class="">
                <li>Size</li>
                <li>Phone</li>
                <li>Website</li>
                <li>Email</li>
            </ul>
        </div>
        {{-- Offer info --}}
        <div class="flex flex-col space-y-2 bg-white rounded-lg p-6 shadow-sm">
            <ul class="">
                <li>Type</li>
                <li>isPaid?</li>
                <li>Salary</li>
                <li>FromDate</li>
                <li>ToDate</li>
            </ul>
            {{-- Guest --}}
            @guest
            <div class="flex space-x-4 justify-between">
                <a href="{{ route('login') }}" class="flex items-center h-10 rounded-lg px-5 bg-gray-800 text-white hover:bg-gray-700 font-medium text-sm">Login to apply</a>
            </div>
            @endguest
            {{-- Student --}}
            @if (Auth::user())
            <div class="flex space-x-4 justify-between">
                <a href="" class="flex items-center h-10 rounded-lg px-5 bg-gray-800 text-white hover:bg-gray-700 font-medium text-sm">Apply</a>
                <a href="" class="flex items-center h-10 border rounded-lg px-2 hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </a>
            </div>
            @endif
        </div>
    </div>
    {{-- Offer details --}}
    <div class="w-full bg-white rounded-lg p-6 shadow-sm">
        {{-- Offer header --}}
        <div class="mb-6">
            <p class="mb-2 font-semibold text-blue-400">{{ $offer->category->name }}</p>
            <h1 class="text-4xl font-bold">{{ $offer->position }}</h1>
            <div class="mt-4 flex space-x-4 text-sm text-gray-500">
                <div class="flex space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p>30 April 2021</p>
                </div>
                <div class="flex space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p>22 days left</p>
                </div>
                <div class="flex space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <p>5 applications</p>
                </div>
            </div>
        </div>
        {{-- Offer image --}}
        <div class="mb-6 rounded-lg bg-gray-200 h-72 w-full flex-shrink-0"></div>
        {{-- Offer description --}}
        <h1 class="text-2xl font-bold mb-2">Description</h1>
        <p>{{ $offer->description }}</p>
    </div>
</div>
@endsection