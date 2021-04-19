@extends('layouts.app')

@section('content')
{{-- Hero --}}
{{-- TODO: design --}}
<div class="w-full py-32 bg-indigo-600 mb-6 flex items-center">
    <div class="w-full max-w-screen-xl mx-auto p-4">
        <h1 class="text-5xl text-white font-bold">Poszukujesz <span class="text-red-300">praktyk</span>?</h1>
        <p class="text-indigo-100 max-w-xl mt-4 leading-relaxed tracking-wide text-xl">Przeglądaj najnowsze oferty staży i praktyk i zdobądź wymagane doświadczenie by być konkurencyjnym na rynku pracy.</p>
        <a href="{{route('offers.index')}}" class="border-2 border-indigo-500 rounded-lg py-2 px-4 text-white inline-block mt-6">Sprawdź oferty</a>
    </div>
</div>

{{-- Latest offers --}}
{{-- TODO: add responsivness --}}
<div class="max-w-screen-xl mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-6">Najnowsze oferty</h1>
    <div class="flex space-x-6">
        @foreach ($offers as $offer)
            <div class="bg-white rounded-xl p-6 max-w-xs shadow-lg w-96 flex flex-col justify-between">
                <div>
                    <div class="flex items-center">
                        {{-- Company avatar --}}
                        <div class="rounded-lg bg-gray-200 h-16 w-16 flex-shrink-0"></div>
                        {{-- Company details --}}
                        <div class="flex flex-col ml-4">
                            <p class="font-semibold text-lg">{{ Str::limit($offer->company->company_name, 18) }}</p>
                            <div class="flex items-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                <p class="ml-1 text-sm text-red-400 font-semibold">{{ $offer->city }}</p>
                                {{-- <p class="ml-1 text-sm text-red-400 font-semibold">{{ Str::limit($offer->city.', '.$offer->location->name, 20) }}</p> --}}
                            </div>
                        </div>
                    </div>
                    {{-- Offer position --}}
                    <p class="mt-4 text-lg font-semibold">{{ Str::limit($offer->position, 27) }}</p>
                    {{-- Offer description --}}
                    <p class="mt-2 text-sm">{{ Str::limit($offer->description, 150) }}</p>
                </div>
                <div class="mt-6">
                    <div class="w-min bg-blue-100 text-blue-500 py-2 px-4 rounded text-xs uppercase font-semibold whitespace-nowrap">{{ $offer->category->name }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection