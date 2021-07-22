@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-8 md:space-y-16 pb-16">
        {{-- HEADER --}}
{{--        <div class="" style="background-image: url({{ asset('images/banner-01.jpg')}});">--}}
{{--            <div class="main_offer border-b border-blue-100 bg-holder">--}}
{{--                <div class="p-4 m-auto max-w-screen-lg h-full">--}}
{{--                    <div class="flex flex-col md:py-12 md:flex-row md:space-x-16 items-center">--}}
{{--                        <img src="images/hero.svg" alt="hero" class="hidden md:block w-full md:max-h-80 md:w-auto">--}}
{{--                        <div class="my-8 flex flex-col space-y-4 md:max-w-md">--}}
{{--                            <div class="flex flex-col space-y-2">--}}
{{--                                @if (!Auth::user())--}}
{{--                                    <a href="{{ route('register.index') }}" class="flex space-x-2 items-center">--}}
{{--                                        <h2 class="text-base md:text-lg text-blue-600 font-semibold hover:text-blue-500 transition">{{ __('Zarejestruj się')}}</h2>--}}
{{--                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none"--}}
{{--                                             class="HeroPill__StyledIncentiveArrow-sc-16ndsef-0 eOcbbt">--}}
{{--                                            <path--}}
{{--                                                d="M0 7h12.17l-3.28 3.28 1.41 1.41L16 6 10.3.31 8.89 1.72 12.17 5H0v2z"--}}
{{--                                                fill="#1652F0"></path>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                                <h1 class="text-3xl md:text-5xl font-bold">{{ __('Szukasz praktyk?')}}</h1>--}}
{{--                            </div>--}}
{{--                            <p class="text-base md:text-lg">{{ __('Przeglądaj oferty praktyk i stażów i zdobądź wymagane doświadczenie by być konkurencyjnym na rynku pracy.')}}</p>--}}
{{--                            <div class="pt-4">--}}
{{--                                <a href="{{ route('offers.index') }}"--}}
{{--                                   class="text-base font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white hover:bg-blue-500 transition">{{ __('Sprawdź oferty')}}</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        --}}

        <div class="text-white items-center justify-around" style="background: url('https://www.praca.pl/praca2/assets/images/mainSearch/background-xxlarge.webp'); height: 150px">
            <form role="form" action="{{ route('offers.search') }}" method="GET" class="mt-11">
                <div class="flex space-y-4 justify-center md:flex-row md:space-y-0 md:space-x-1.5 w-6/12 mx-auto">
                    <div class="flex-col w-6/12">
                        <input name="keyword" type="text" class="border border-gray-200 rounded-lg w-11/12"
                               placeholder="{{ __('Keyword')}}" value="{{ Request::get('keyword') }}">
                    </div>
                    <div class="flex-col w-4/12">
                        <input name="city" type="text" class="border border-gray-200 rounded-lg w-11/12"
                               placeholder="{{ __('City')}}" value="{{ Request::get('city') }}">
                    </div>
                    <div class="flex-col w-2/12">
                        <input type="submit"
                               class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-red-700 rounded-lg flex justify-center cursor-pointer w-full"
                               value="{{ __('app/offers.search') }}">
                    </div>
                </div>
            </form>
            <div class="flex my-auto justify-center md:flex-row md:space-x-5 mt-3">
                <div class="flex-col">
                    albo szukaj według
                </div>
                <div class="flex-col">
                    <div class="font-normal flex items-center space-x-1">
                        <a href="#!" class="font-semibold hover:text">{{ __('app/offers.category') }}</a>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach($categories as $category)
                                    <x-dropdown-link :href="route('offers.index', ['category' => $category->id])">
                                        {{ $category->name }}
                                    </x-dropdown-link>
                                @endforeach
                                <hr>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <div class="flex-col">
                    <div class="font-normal flex items-center space-x-1">
                        <a href="#!" class="font-semibold hover:text">{{ __('app/offers.location') }}</a>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach($locations as $location)
                                    <x-dropdown-link :href="route('offers.index', ['location' => $location->id])">
                                        {{ $location->name }}
                                    </x-dropdown-link>
                                @endforeach
                                <hr>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </div>

        {{-- Latest offers --}}
        <div class="p-4 m-auto max-w-screen-lg h-full flex flex-col space-y-8 md:space-y-12 md:items-center">
            <div class="px-2 flex flex-col md:items-center space-y-2">
                <div>
                    <span
                        class="px-2 py-1 font-semibold text-sm bg-white border border-gray-300 uppercase rounded-lg">{{ __('Oferty')}}</span>
                </div>
                <h1 class="text-2xl font-semibold">{{ __('Najnowsze oferty')}}</h1>
                <p class="md:text-center text-gray-500 max-w-md">{{ __('Oto kilka najnowszych ofert praktyk i stażu. W naszej bazie znajduje się')}} {{ $offersCount }} {{ __('ofert i regularnie dodawane są nowe.')}}</p>
            </div>
            <div class="flex flex-col space-y-4 justify-center md:flex-row md:space-y-0 md:space-x-16">
                @foreach($offers as $offer)
                    <div class="bg-white border border-gray-200 rounded-2xl md:shadow-lg p-4 flex flex-col space-y-2">
                        <div class="flex space-x-4 items-center">
                            <img src="{{ asset($offer->company->image) }}" alt="" class="w-16 h-16">
                            <div>
                                <h1 class="whitespace-nowrap font-semibold">{{ Str::limit($offer->position, 20) }}</h1>
                                <p class="text-sm">{{ Str::limit($offer->company->category->name, 40) }}</p>
                            </div>
                        </div>
                        <div>{!! Str::limit($offer->description, 100) !!}</div>
                        <a href="{{ route('offers.show', $offer) }}"
                           class="text-sm font-medium text-blue-600 hover:underline">{{ __('Czytaj dalej')}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
