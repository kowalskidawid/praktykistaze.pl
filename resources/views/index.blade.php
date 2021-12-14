@extends('layouts.app')

@section('content')
    <div class="flex flex-col space-y-8 md:space-y-16 pb-16">
        <div class="items-center justify-around"
             style="background: url({{ asset('images/search-banner.webp') }}); height: 150px">
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
            <div class="flex my-auto justify-center md:flex-row md:space-x-5 mt-3 text-white">
                <div class="flex-col">
                    albo szukaj według
                </div>
                <div class="flex-col">
                    <div class="font-normal flex items-center space-x-1 border-b-2 border-dotted px-3">
                        <x-dropdown align="right" width="48" contentClasses="py-1 bg-white grid grid-flow-col-dance grid-cols-4 grid-gap-1 categories-dropdown w-screen">
                            <x-slot name="trigger">
                                <button class="transition duration-150 ease-in-out focus:outline-none">
                                    {{ __('app/offers.category') }}
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach($categories as $category)
                                    <x-dropdown-link :href="route('offers.index', ['category' => $category->id])">
                                        {{ $category->name }}
                                    </x-dropdown-link>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <div class="flex-col">
                    <div class="font-normal flex items-center space-x-1 border-b-2 border-dotted px-3">
                        <x-dropdown align="right" width="48" contentClasses="py-1 bg-white w-96 grid grid-flow-dance grid-cols-4 locations-dropdown">
                            <x-slot name="trigger">
                                <button class="transition duration-150 ease-in-out focus:outline-none">
                                    {{ __('app/offers.location') }}
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @foreach($locations as $location)
                                    <div class="text-black px-2 my-2">
                                        <a href="{{ route('offers.index', ['location' => $location->id]) }}" class="text-blue-800 font-semibold">
                                            {{ $location->name }}:
                                        </a> <br>
                                        <?php $citiesQuantity = $location->cities->count(); $index = 1; ?>
                                        @foreach($location->cities as $city)
                                            <a href="{{ route('offers.index', ['city' => $city->name]) }}" class="text-blue-600 font-light">
                                                {{ $city->name }}
                                            </a>@if($index < $citiesQuantity),@endif
                                            <?php $index++ ?>
                                        @endforeach
                                    </div>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </div>
        @if (session('no-offers'))
            @include('partials.no-offers')
        @endif
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
