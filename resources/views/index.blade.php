@extends('layouts.app')

@section('content')

{{-- Hero --}}
<div class="px-4 py-12 flex flex-col space-y-8">
    <div class="flex flex-col space-y-4">
        <h1 class="text-4xl font-bold">Cześć,<br>szukasz <span class="text-indigo-600">praktyk</span>?</h1>
        <p class="text-gray-700">Przeglądaj najnowsze oferty staży i praktyk i zdobądź wymagane doświadczenie by być konkurencyjnym na rynku pracy.</p>
    </div>
    <div class="flex flex-col space-y-2">
        <a href="{{ route('offers.index') }}" class="px-4 py-2 max-w-min whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center">Sprawdź oferty</a>
        @guest
        <div class="text-xs">
            <span>lub </span>
            <a href="{{ route('register') }}" class="font-medium text-indigo-600">zarejestruj się</a>
            <span> by aplikować</span>
        </div>
        @endguest
    </div>
</div>
{{-- New offers --}}
<div class="p-4">
    <h1 class="font-bold text-2xl">Najnowsze oferty</h1>
    <div class="mt-4 mb-8 flex flex-col space-y-4">
        @foreach ($offers as $offer)
        <a href="{{ route('offers.show', ['offer' => $offer]) }}" class="p-4 bg-white rounded-2xl border-2 border-gray-100 shadow-lg flex space-x-4 items-center">
            <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $offer->company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
            <div>
                <p class="text-lg font-semibold">{{ Str::limit($offer->position, 25) }}</p>
                <p class="text-sm">{{ $offer->category->name }}</p>
            </div>
        </a>
        @endforeach
    </div>
    <a href="{{ route('offers.index') }}" class="px-4 py-2 max-w-min whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center">Więcej ofert</a>
</div>
{{-- New articles --}}
<div class="p-4">
    <h1 class="font-bold text-2xl">Nowe artykuły</h1>
    <div class="mt-4 mb-8 flex flex-col space-y-4">
        <div class="bg-white rounded-2xl border-2 border-gray-100 shadow-lg flex flex-col">
            <div class="rounded-t-lg w-full h-36 bg-gray-200"></div>
            <div class="p-4 flex flex-col space-y-2">
                <p class="text-lg font-semibold">Jak napisać dobre CV?</p>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at lectus nec velit volutpat ullamcorper at vitae magna. Donec et tincidunt tellus. Nulla facilisi... </p>
            </div>
        </div>
    </div>
    <a href="" class="px-4 py-2 max-w-min whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center">Więcej artykułów</a>
</div>

@endsection