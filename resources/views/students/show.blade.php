@extends('layouts.app')

@section('content')
<div class="p-4 m-auto max-w-screen-lg h-full">
    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('students.index') }}" class="flex space-x-2 items-center">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.91988 2H16.0899C19.6199 2 21.9999 4.271 21.9999 7.66V16.33C21.9999 19.72 19.6199 22 16.0899 22H7.91988C4.37988 22 1.99988 19.72 1.99988 16.33V7.66C1.99988 4.271 4.37988 2 7.91988 2ZM9.72988 12.75H16.0799C16.4999 12.75 16.8299 12.41 16.8299 12C16.8299 11.58 16.4999 11.25 16.0799 11.25H9.72988L12.2099 8.78C12.3499 8.64 12.4299 8.44 12.4299 8.25C12.4299 8.061 12.3499 7.87 12.2099 7.72C11.9199 7.43 11.4399 7.43 11.1499 7.72L7.37988 11.47C7.09988 11.75 7.09988 12.25 7.37988 12.53L11.1499 16.28C11.4399 16.57 11.9199 16.57 12.2099 16.28C12.4999 15.98 12.4999 15.51 12.2099 15.21L9.72988 12.75Z" fill="#130F26"/>
            </svg>
            <span class="text-sm font-medium">{{ __('Back to students')}}</span>
        </a>
    </div>
    {{-- Main --}}
    <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-8">
        {{-- Aside --}}
        <div class="flex flex-col space-y-4 whitespace-nowrap flex-shrink-0">
            @if (Auth::user() && Auth::user()->roleCheck('student') && Auth::user()->student->id == $student->id)
                <a href="{{ route('dashboard.profile') }}" type="submit" class="w-full text-sm font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white text-center hover:bg-blue-500">
                {{ __('Edytuj profil')}}
                </a>
            @endif
            <div class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8">
                <div class="flex space-x-4 items-center">
                    <img src="{{ asset($student->image) }}" alt="" class="w-16 h-16">
                    <div>
                        <h1 class="whitespace-nowrap font-semibold">{{ $student->first_name }} {{ $student->last_name }}</h1>
                        <p class="text-sm">{{ $student->category->name }}</p>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8">
                <ul class="flex flex-col space-y-4">
                    @if ($student->education)
                    <li class="flex flex-col">
                        <span class="font-semibold">{{ $student->education }}</span>
                        <span class="text-xs font-medium">{{ __('Edukacja')}}</span>
                    </li>
                    @endif
                    @if ($student->city)
                    <li class="flex flex-col">
                        <span class="font-semibold">{{ $student->city }}{{ ', '.$student->location->name }}</span>
                        <span class="text-xs font-medium">{{ __('Lokalizacja')}}</span>
                    </li>
                    @endif
                    @if ($student->website)
                    <li class="flex flex-col">
                        <a href="{{ $student->website }}" class="font-semibold">{{ $student->website }}</a>
                        <span class="text-xs font-medium">{{ __('Strona internetowa')}}</span>
                    </li>
                    @endif
                    @if ($student->email)
                    <li class="flex flex-col">
                        <span class="font-semibold">{{ $student->email }}</span>
                        <span class="text-xs font-medium">{{ __('Email kontaktowy')}}</span>
                    </li>
                    @endif
                    @if ($student->phone)
                    <li class="flex flex-col">
                        <span class="font-semibold">{{ $student->phone }}</span>
                        <span class="text-xs font-medium">{{ __('Telefon')}}</span>
                    </li>
                    @endif
                    @if ($student->linkedin)
                    <li class="flex flex-col">
                        <a href="{{ $student->linkedin }}" class="font-semibold">{{ $student->linkedin }}</a>
                        <span class="text-xs font-medium">LinkedIn</span>
                    </li>
                    @endif
                    @if ($student->github)
                    <li class="flex flex-col">
                        <a href="{{ $student->github }}" class="font-semibold">{{ $student->github }}</a>
                        <span class="text-xs font-medium">Github</span>
                    </li>
                    @endif
                    @if ($student->cv)
                    <li class="flex flex-col">
                        <a href="{{ $student->cv }}" class="font-semibold">{{ $student->cv }}</a>
                        <span class="text-xs font-medium">CV</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        {{-- Content --}}
        <div class="w-full flex flex-col space-y-4">
            <div class="flex flex-col">
                <h1 class="text-2xl font-semibold">{{ $student->first_name }} {{ $student->last_name }}</h1>
                {{-- <div class="text-sm font-medium flex space-x-2 text-gray-500">
                    <span>{{ $company->offers->count() }} {{ __('ofert')}}</span>
                </div> --}}
            </div>
            <div class="flex flex-col space-y-4">{!! $student->description !!}</div>
            <h1 class="text-2xl font-semibold">{{ __('Umiejętności')}}</h1>
            <div class="flex flex-col space-y-4">{!! $student->skills !!}</div>
        </div>
    </div>
</div>
@endsection