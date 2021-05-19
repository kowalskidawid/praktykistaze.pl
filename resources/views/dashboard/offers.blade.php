@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2 flex items-center justify-between">
        <h1 class="text-xl font-semibold">Your offers</h1>
        <a href="{{ route('dashboard.offersCreate') }}">Add new offer</a>
    </div>
    <div class="py-4 flex flex-col space-y-4">
        @foreach ($offers as $offer)
        <div class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
            <div class="flex space-x-4 items-center">
                <div>
                    <a href="{{ route('offers.show', $offer) }}" class="font-semibold hover:underline">{{ $offer->position }}</a>
                    <p class="text-sm">{{ $offer->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex flex-col">
                <span class="text-xs uppercase font-semibold px-2 py-1 text-blue-600">{{ $offer->applications->count() }} applicants</span>
                <a href="{{ route('dashboard.offersEdit', $offer) }}">Edit</a>
                <form action="{{route('offers.destroy', $offer)}}" method="post" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection