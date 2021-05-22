@extends('layouts.app')

@section('content')
<div class="flex flex-col space-y-8 md:space-y-16 pb-16">
    {{-- HEADER --}}
    <div class=" border-b border-blue-100 bg-blue-50">
        <div class="p-4 m-auto max-w-screen-lg h-full">
            <div class="flex flex-col md:py-12 md:flex-row md:space-x-16 items-center">
                <img src="images/hero.svg" alt="hero" class="hidden md:block w-full md:max-h-80 md:w-auto">
                <div class="my-8 flex flex-col space-y-4 md:max-w-md">
                    <div class="flex flex-col space-y-2">
                        <a href="{{ route('register.index') }}" class="flex space-x-2 items-center">
                            <h2 class="text-base md:text-lg text-blue-600 font-semibold hover:text-blue-500 transition">{{ __('Zarejestruj się')}}</h2>
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" class="HeroPill__StyledIncentiveArrow-sc-16ndsef-0 eOcbbt"><path d="M0 7h12.17l-3.28 3.28 1.41 1.41L16 6 10.3.31 8.89 1.72 12.17 5H0v2z" fill="#1652F0"></path></svg>
                        </a>
                        <h1 class="text-3xl md:text-5xl font-bold">{{ __('Szukasz praktyk?')}}</h1>
                    </div>
                    <p class="text-base md:text-lg">{{ __('Przeglądaj oferty praktyk i stażów i zdobądź wymagane doświadczenie by być konkurencyjnym na rynku pracy.')}}</p>
                    <div class="pt-4">
                        <a href="{{ route('offers.index') }}" class="text-base font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white hover:bg-blue-500 transition">{{ __('Sprawdź oferty')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Latest offers --}}
    <div class="p-4 m-auto max-w-screen-lg h-full flex flex-col space-y-8 md:space-y-12 md:items-center">
        <div class="px-2 flex flex-col md:items-center space-y-2">
            <div>
                <span class="px-2 py-1 font-semibold text-sm bg-white border border-gray-300 uppercase rounded-lg">Oferty</span>
            </div>
            <h1 class="text-2xl font-semibold">Najnowsze oferty</h1>
            <p class="md:text-center text-gray-500 max-w-md">Oto kilka najnowszych ofert praktyk i stażu. W naszej bazie znajduje się {{ $offersCount }} ofert i regularnie dodawane są nowe.</p>
        </div>
        <div class="flex flex-col space-y-4 justify-center md:flex-row md:space-y-0 md:space-x-16">
            @foreach($offers as $offer)
            <div class="bg-white border border-gray-200 rounded-2xl md:shadow-lg p-4 flex flex-col space-y-2">
                <div class="flex space-x-4 items-center">
                    <img src="{{ asset($offer->company->image) }}" alt="" class="w-16 h-16">
                    <div>
                        <h1 class="whitespace-nowrap font-semibold">{{ Str::limit($offer->position, 20) }}</h1>
                        <p class="text-sm">{{ $offer->company->category->name }}</p>
                    </div>
                </div>
                <div>{!! Str::limit($offer->description, 100) !!}</div>
                <a href="{{ route('offers.show', $offer) }}" class="text-sm font-medium text-blue-600 hover:underline">Czytaj dalej</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection