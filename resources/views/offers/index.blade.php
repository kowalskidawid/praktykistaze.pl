@extends('layouts.app')

@section('content')
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
    {{-- Search --}}
    <div>
        <form class="p-4 bg-gray-50 border border-gray-200 rounded-lg flex flex-col space-y-8" role="form" action="{{ route('offers.index') }}" method="GET">
            {{-- <h1 class="text-lg font-medium">Search offers</h1> --}}
            {{-- Inputs --}}
            <div class="flex flex-col space-y-2">
                <div class="flex flex-col space-y-2">
                    <label for="position" class="text-sm font-medium">{{ __('app/offers.position') }}</label>
                    <input name="position" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/offers.position') }}" value="{{ Request::get('position') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="category" class="text-sm font-medium">{{ __('app/offers.category') }}</label>
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
                    <label for="city" class="text-sm font-medium">{{ __('app/offers.city') }}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/offers.city') }}" value="{{ Request::get('city') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="location" class="text-sm font-medium">{{ __('app/offers.location') }}</label>
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
                    <label for="salary" class="text-sm font-medium">{{ __('app/offers.salary') }}</label>
                    <select name="salary" class="border border-gray-200 rounded-lg">
                        @if ( Request::get('salary') === null )
                            <option value="0" selected>{{ __('app/offers.salary-all') }}</option>
                        @else
                            <option value="0">{{ __('app/offers.salary-all') }}</option>
                        @endif
                        @if ( (int)Request::get('salary') === 1 )
                            <option value="1" selected>{{ __('app/offers.salary-paid') }}</option>
                        @else
                            <option value="1">{{ __('app/offers.salary-paid') }}</option>
                        @endif
                    </select>
                </div>
            </div>
            {{-- Submit --}}
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer w-full" value="{{ __('app/offers.search') }}">
        </form>
    </div>
    {{-- Results --}}
    <div class="w-full flex flex-col space-y-4">
        @foreach ($offers as $offer)
        <a href="{{ route('offers.show', $offer) }}" class="p-4 border border-gray-200 rounded-lg flex items-center justify-between transition hover:shadow">
            <div class="flex space-x-4 items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 flex-shrink-0"></div>
                <div>
                    <p class="font-semibold">{{ $offer->position }}</p>
                    <p class="text-sm">{{ $offer->category->name }}</p>
                </div>
            </div>
            <div>
                <p class="font-semibold text-right">{{ $offer->salary }} PLN</p>
                <p class="text-right text-sm">{{ $offer->city }}<span class="hidden md:inline">, {{ $offer->location->name }}</span></p>
            </div>
        </a>
        @endforeach
        {{ $offers->links() }}
    </div>
</div>
@endsection