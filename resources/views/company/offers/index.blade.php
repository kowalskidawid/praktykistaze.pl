@extends('layouts.app')

@section('content')

{{-- Offers --}}
<div class="flex justify-between items-center p-4">
    <h1 class="font-bold text-2xl">Twoje oferty</h1>
    <a href="{{ route('company.offers.create') }}" id="button" class="flex items-center space-x-2 px-4 py-2 rounded-md border border-gray-200">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="7" y="2" width="2" height="12" rx="1" fill="#515660"/>
            <rect x="2" y="9" width="2" height="12" rx="1" transform="rotate(-90 2 9)" fill="#515660"/>
        </svg>
        <span>Dodaj</span>
    </a>
</div>
<div class="p-4 flex flex-col space-y-4">
    @foreach ($offers as $offer)
    <a href="{{ route('offers.show', ['offer' => $offer]) }}" class="p-4 bg-white rounded-2xl border-2 border-gray-100 shadow-lg flex space-x-4 items-center">
        <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $offer->company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
        <div>
            <p class="text-lg font-semibold">{{ Str::limit($offer->position, 20) }}</p>
            <p class="text-sm">{{ $offer->category->name }}</p>
        </div>
    </a>
    @endforeach
</div>

@endsection