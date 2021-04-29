@extends('layouts.app')

@section('content')

{{-- Nav --}}
<div class="w-full flex justify-between p-4">
    <a href="{{ url()->previous() }}" class="w-10 h-10 flex justify-center items-center rounded-lg border border-gray-200">
        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.83 5L7.41 1.41L6 0L0 6L6 12L7.41 10.59L3.83 7H16V5H3.83Z" fill="#111827"/>
        </svg>
    </a>
    @if(Auth::user())
    @if ($company == Auth::user()->company)
    <a href="{{ route('company.settings') }}" class="h-10 px-4 flex justify-center font-semibold items-center rounded-lg bg-white border border-gray-200">
        Edytuj
    </a>
    @endif
    @endif
</div>
{{-- Company --}}
<div class="p-4 flex w-full items-center border-b border-gray-200">
    <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
    <div class="ml-4">
        <p class="text-lg font-semibold">{{ $company->company_name }}</p>
        <p class="text-sm">{{ $company->city }}, {{ $company->location->name }}</p>
    </div>
</div>
<div class="p-4 pb-0 border-b border-gray-200">
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">{{ $company->size->size }}+</p>
            <p class="text-xs">{{ $company->size->name }}</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">{{ $company->email }}</p>
            <p class="text-xs">Email kontaktowy</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">{{ $company->phone }}</p>
            <p class="text-xs">Telefon</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">{{ $company->website }}</p>
            <p class="text-xs">Strona internetowa</p>
        </div>
    </div>
</div>
<div class="p-4">
    <h1 class="text-2xl font-bold mb-2">O nas</h1>
    <p>{{ $company->description }}</p>
</div>
<div class="p-4">
    <h1 class="font-bold text-2xl">Oferty firmy</h1>
    <div class="mt-4 mb-8 flex flex-col space-y-4">
        @if (count($offers) === 0)
        <p>Brak ofert tej firmy.</p>
        @else
        @foreach ($offers as $offer)
        <a href="{{ route('offers.show', ['offer' => $offer]) }}" class="p-4 bg-white rounded-2xl border-2 border-gray-100 shadow-lg flex space-x-4 items-center">
            <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $offer->company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
            <div>
                <p class="text-lg font-semibold">{{ Str::limit($offer->position, 25) }}</p>
                <p class="text-sm">{{ $offer->category->name }}</p>
            </div>
        </a>
        @endforeach
        @endif
    </div>
    <a href="{{ route('offers.index') }}" class="px-4 py-2 max-w-min whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center">Więcej ofert tej firmy</a>
</div>

@endsection