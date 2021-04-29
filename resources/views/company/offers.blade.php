@extends('layouts.app')

@section('content')

{{-- Offers --}}
<div class="p-4">
    <h1 class="font-bold text-2xl">Twoje oferty</h1>
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