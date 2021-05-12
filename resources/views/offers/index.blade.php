@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.offers'])
{{-- Content --}}
<div class="p-4">
    <form class="p-4 bg-gray-100 rounded-2xl" id="searchForm" role="form" action="{{ route('offers.index') }}" method="GET">
        <div class="grid grid-cols-6 gap-4">
            <div class="flex flex-col space-y-2">
                <label for="position" class="text-sm font-medium">Stanowisko</label>
                <input name="position" type="text" class="border border-gray-200 rounded-lg" placeholder="Stanowisko" value="{{ Request::get('position') }}">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="category" class="text-sm font-medium">Kategoria</label>
                <select name="category" class="border border-gray-200 rounded-lg">
                    @if ( Request::get('category') === null )
                        <option value="" selected></option>
                    @else
                        <option value=""></option>
                    @endif
                    @foreach ($categories as $category)
                        @if ( (int)Request::get('category') === $category->id )
                            <option value="{{ $category->id }}" selected>{{ $category->name }} ({{ $category->offers()->count() }})</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}  ({{ $category->offers()->count() }})</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="city" class="text-sm font-medium">Miasto</label>
                <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="Miasto" value="{{ Request::get('city') }}">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="location" class="text-sm font-medium">Województwo</label>
                <select name="location" class="border border-gray-200 rounded-lg">
                    @if ( Request::get('location') === null )
                        <option value="" selected></option>
                    @else
                        <option value=""></option>
                    @endif
                    @foreach ($locations as $location)
                        @if ( (int)Request::get('location') === $location->id )
                            <option value="{{ $location->id }}" selected>{{ $location->name }}  ({{ $location->offers()->count() }})</option>
                        @else
                            <option value="{{ $location->id }}">{{ $location->name }}  ({{ $location->offers()->count() }})</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <p class="text-sm font-medium">Pensja</p>
                <div class="flex space-x-2 items-center h-full">
                    <input class="rounded" name="salary" type="checkbox" value="true">
                    <label for="salary" class="text-sm font-medium">Płatny</label>
                </div>
            </div>
            <div class="py-4">
                <input type="submit" class="px-4 py-2 w-full whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center" value="Szukaj">
            </div>
        </div>
    </form>
    <table class="w-full">
        {{-- <thead>
            <tr class="border-b border-gray-200">
                <th class="p-4 text-left font-medium text-gray-500">Stanowisko</th>
                <th class="p-4 text-left font-medium text-gray-500">Kategoria</th>
                <th class="p-4 text-left font-medium text-gray-500">Miasto</th>
                <th class="p-4 text-left font-medium text-gray-500">Województwo</th>
                <th class="p-4 text-left font-medium text-gray-500">Pensja</th>
            </tr>
        </thead> --}}
        <tbody>
            @foreach ($offers as $offer)
            <tr class="hover:bg-gray-200 transition">
                <td>
                    <a href="{{ route('offers.show', $offer) }}" class="p-4 flex space-x-4 items-center">
                        <div class="rounded-full w-8 h-8 bg-gray-900 flex-shrink-0"></div>
                        <p class="font-medium">{{ $offer->position }}</p>
                    </a>
                </td>
                <td class="p-4">
                    <span class="font-medium text-sm text-white bg-blue-500 px-2 py-1 rounded whitespace-nowrap">{{ $offer->category->name }}</span>
                </td>
                <td class="p-4 hidden sm:table-cell">
                    <p class="font-medium">{{ $offer->city }}</p>
                </td>
                <td class="p-4 hidden md:table-cell">
                    <p class="font-medium">{{ $offer->location->name }}</p>
                </td>
                <td class="p-4 hidden md:table-cell">
                    <p class="font-medium">{{ $offer->salary }} PLN</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $offers->links() }}
    </div>
</div>

@endsection