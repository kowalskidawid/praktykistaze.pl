@extends('layouts.app')

@section('content')
<div class="mb-8 p-4">
    <div class="flex space-x-2 items-center mb-4">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.3493 18.8577C9.38553 18.8577 6 19.47 6 21.9174C6 24.3666 9.364 25 13.3493 25C17.3131 25 20.6987 24.3877 20.6987 21.9404C20.6987 19.4911 17.3347 18.8577 13.3493 18.8577" fill="#111827"/>
            <path opacity="0.4" d="M13.3494 16.5248C16.049 16.5248 18.2124 14.4062 18.2124 11.7624C18.2124 9.11865 16.049 7 13.3494 7C10.6507 7 8.48633 9.11865 8.48633 11.7624C8.48633 14.4062 10.6507 16.5248 13.3494 16.5248" fill="#111827"/>
            <path opacity="0.4" d="M20.1734 11.8487C20.1734 13.1951 19.7605 14.4513 19.0364 15.4948C18.9611 15.6021 19.0276 15.7468 19.1587 15.7698C19.3407 15.7995 19.5276 15.8177 19.7184 15.8216C21.6167 15.8704 23.3202 14.6736 23.7908 12.8712C24.4885 10.1968 22.4415 7.79543 19.8339 7.79543C19.5511 7.79543 19.2801 7.82417 19.0159 7.87688C18.9797 7.88454 18.9405 7.90179 18.921 7.93245C18.8955 7.97174 18.9141 8.02253 18.9395 8.05606C19.7233 9.13216 20.1734 10.4421 20.1734 11.8487" fill="#111827"/>
            <path d="M25.7791 19.1693C25.4317 18.444 24.5932 17.9466 23.3172 17.7023C22.7155 17.5586 21.0853 17.3545 19.5697 17.3832C19.5472 17.3861 19.5344 17.4014 19.5325 17.411C19.5295 17.4263 19.5364 17.4493 19.5658 17.4656C20.2663 17.8048 22.9738 19.2805 22.6333 22.3928C22.6186 22.5289 22.7292 22.6439 22.8671 22.6247C23.5335 22.5318 25.2478 22.1705 25.7791 21.0475C26.0736 20.4534 26.0736 19.7634 25.7791 19.1693" fill="#111827"/>
        </svg>
        <h1 class="text-2xl font-semibold">{{ __('Students')}}</h1>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum voluptatem, impedit odit rerum, obcaecati velit nesciunt quia aut, aspernatur necessitatibus unde eaque provident at enim assumenda in esse expedita quam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus incidunt cum, consequatur distinctio enim omnis quam. Magnam laudantium, similique voluptatum eligendi cumque eveniet dolorem, dolores dicta nemo excepturi aspernatur a?</p>
</div>
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
    {{-- Search --}}
    <div>
        <form class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8" role="form" action="{{ route('students.index') }}" method="GET">
            {{-- <h1 class="text-lg font-medium">{{ __('Search offers')}}</h1> --}}
            {{-- Inputs --}}
            <div class="flex flex-col space-y-2">
                <div class="flex flex-col space-y-2">
                    <label for="city" class="text-sm font-medium">{{ __('app/students.city') }}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/students.city') }}" value="{{ Request::get('city') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="location" class="text-sm font-medium">{{ __('app/students.location') }}</label>
                    <select name="location" class="border border-gray-200 rounded-lg">
                        @if ( Request::get('location') === null )
                            <option value="" selected></option>
                        @else
                            <option value=""></option>
                        @endif
                        @foreach ($locations as $location)
                            @if ( (int)Request::get('location') === $location->id )
                                <option value="{{ $location->id }}" selected>{{ $location->name }}  ({{ $location->students()->count() }})</option>
                            @else
                                <option value="{{ $location->id }}">{{ $location->name }}  ({{ $location->students()->count() }})</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Submit --}}
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-blue-600 rounded-lg flex justify-center cursor-pointer w-full" value="{{ __('app/offers.search') }}">
        </form>
    </div>
    {{-- Results --}}
    <div class="w-full flex flex-col space-y-4">
        @foreach ($students as $student)
        <a href="{{ route('students.show', $student) }}" class="p-4 bg-white border border-gray-200 rounded-lg flex items-center justify-between transition hover:shadow">
            <div class="flex space-x-4 items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 flex-shrink-0"></div>
                <div>
                    <p class="font-semibold">{{ $student->first_name }} {{ $student->last_name }}</p>
                    <p class="text-sm whitespace-nowrap">{{ $student->category->name }}</p>
                </div>
            </div>
            <div>
                <p class="font-semibold text-right">{{ __('Nazwa uczelni')}}</p>
                <p class="text-right text-sm">{{ $student->city ?? '' }}<span class="hidden md:inline">, {{ $student->location->name ?? '' }}</span></p>
            </div>
        </a>
        @endforeach
        {{ $students->links() }}
    </div>
</div>
@endsection