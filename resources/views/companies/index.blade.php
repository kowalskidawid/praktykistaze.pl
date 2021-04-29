@extends('layouts.app')

@section('content')

{{-- Search --}}
<div class="flex justify-between items-center p-4">
    <h1 class="font-bold text-2xl">Przeglądaj firmy</h1>
    <button id="button" class="flex items-center space-x-2 px-4 py-2 rounded-md border border-gray-200" onclick="toggleFilterMenu()">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 15.2H2.4V13.6H0V12H2.4V10.4H4V15.2ZM16 13.6H5.6V12H16V13.6ZM12 10.4H10.4V8.8H0V7.2H10.4V5.6096H12V10.4ZM16 8.8H13.6V7.2H16V8.8ZM7.2 5.6H5.6V4H0V2.4H5.6V0.800003H7.2V5.6ZM16 4H8.8V2.4H16V4Z" fill="#111827"/>
        </svg>
        <span>Filtruj</span>
    </button>
</div>
<div id="filter" class="border-b border-gray-200 p-4 pt-0 shadow-md mb-4" style="display: none;">
    <form class="flex flex-col space-y-4" id="searchForm" role="form" action="{{ route('companies.index') }}" method="GET">
        <div class="flex flex-col space-y-2">
            <label for="name" class="text-sm font-medium">Nazwa firmy</label>
            <input name="name" type="text" class="border border-gray-200 rounded-lg bg-gray-100" placeholder="Nazwa firmy">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="city" class="text-sm font-medium">Miasto</label>
            <input name="city" type="text" class="border border-gray-200 rounded-lg bg-gray-100" placeholder="Miasto">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="location" class="text-sm font-medium">Województwo</label>
            <select name="location" class="border border-gray-200 rounded-lg bg-gray-100">
                @if ( Request::get('location') === null )
                    <option value="" selected></option>
                @else
                    <option value=""></option>
                @endif
                @foreach ($locations as $location)
                    @if ( (int)Request::get('location') === $location->id )
                        <option value="{{ $location->id }}" selected>{{ $location->name }}  ({{ $location->companies()->count() }})</option>
                    @else
                        <option value="{{ $location->id }}">{{ $location->name }}  ({{ $location->companies()->count() }})</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="py-4">
            <input type="submit" class="px-4 py-2 w-full whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center" value="Szukaj">
        </div>
    </form>
</div>
{{-- Offers --}}
<div class="p-4 flex flex-col space-y-4">
    @foreach ($companies as $company)
    <a href="{{ route('companies.show', ['company' => $company]) }}" class="p-4 bg-white rounded-2xl border-2 border-gray-100 shadow-lg flex space-x-4 items-center">
        <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
        <div>
            <p class="text-lg font-semibold">{{ $company->company_name }}</p>
            <p class="text-sm">{{ $company->city }}</p>
        </div>
    </a>
    @endforeach
    <div class="py-4">
        {{ $companies->links() }}
    </div>
</div>

{{-- Scripts --}}
<script>
    function toggleFilterMenu() {
        const x = document.getElementById("filter");
        const y = document.getElementById("button");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.background = "#F3F4F6";
        } else {
            x.style.display = "none";
            y.style.background = "#FFFFFF";
        }
    }
</script>

@endsection