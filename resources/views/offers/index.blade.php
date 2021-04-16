@extends('layouts.app')

@section('content')
{{-- Search and filter --}}
{{-- TODO --}}
<div class="max-w-screen-xl mx-auto p-4">
    <div class="bg-white rounded-lg p-4 shadow-sm">

        <form id="searchForm" role="form" action="{{ route('offers.index') }}" method="GET">
            <label for="location">Location</label>
            <select id="location" name="location" class="w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @if ( Request::get('location') === null )
                    <option value="" selected></option>
                @else
                    <option value=""></option>
                @endif
                @foreach ($locations as $location)
                    @if ( (int)Request::get('location') === $location->id )
                        <option value="{{ $location->id }}" selected>{{ $location->name }}</option>
                    @else
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endif
                @endforeach
            </select>
            {{-- <label for="category">Category</label>
            <select id="category" name="category" class="w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach ($categories as $category)
                <option>{{ $category->name }}</option>
                @endforeach
            </select> --}}
            <button type="submit" class="mt-4 flex items-center h-10 border rounded-lg border-gray-800 px-5 bg-gray-800 text-white hover:bg-gray-700 hover:border-gray-700">{{ __('Search')}}</button>
        </form>

    </div>
</div>

{{-- Offers results --}}
<div class="max-w-screen-xl mx-auto p-4 flex flex-col space-y-2">
    @foreach ($offers as $offer)
        <div class="bg-white rounded-lg p-4 shadow-sm flex">
            <div class="w-full flex items-center justify-between">
                {{-- Left --}}
                <div class="flex items-center">
                    {{-- Company avatar --}}
                    <div class="rounded-lg bg-gray-200 h-14 w-14 flex-shrink-0"></div>
                    {{-- Offer details --}}
                    <div class="flex flex-col ml-4">
                        <p class="font-semibold text-lg">{{ Str::limit($offer->position) }}</p>
                        <div class="flex items-center mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <p class="ml-1 text-sm text-red-400 font-semibold">{{ $offer->city }}</p>
                            {{-- <p class="ml-1 text-sm text-red-400 font-semibold">{{ Str::limit($offer->city.', '.$offer->location->name, 20) }}</p> --}}
                        </div>
                    </div>
                </div>
                {{-- Right --}}
                <div class="">
                    <div class="w-min bg-blue-100 text-blue-500 py-2 px-4 rounded text-xs uppercase font-semibold">{{ $offer->category->name }}</div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $offers->links() }}
</div>
@endsection