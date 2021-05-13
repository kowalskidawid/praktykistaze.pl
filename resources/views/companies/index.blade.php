@extends('layouts.app')

@section('content')
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
    {{-- Search --}}
    <div>
        <form class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8" role="form" action="{{ route('companies.index') }}" method="GET">
            {{-- <h1 class="text-lg font-medium">Search offers</h1> --}}
            {{-- Inputs --}}
            <div class="flex flex-col space-y-2">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-sm font-medium">{{ __('app/companies.name') }}</label>
                    <input name="name" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/companies.name') }}" value="{{ Request::get('position') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="city" class="text-sm font-medium">{{ __('app/companies.city') }}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/companies.city') }}" value="{{ Request::get('city') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="location" class="text-sm font-medium">{{ __('app/companies.location') }}</label>
                    <select name="location" class="border border-gray-200 rounded-lg">
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
            </div>
            {{-- Submit --}}
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer w-full" value="{{ __('app/offers.search') }}">
        </form>
    </div>
    {{-- Results --}}
    <div class="w-full flex flex-col space-y-4">
        @foreach ($companies as $company)
        <a href="{{ route('companies.show', $company) }}" class="p-4 bg-white border border-gray-200 rounded-lg flex items-center justify-between transition hover:shadow">
            <div class="flex space-x-4 items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 flex-shrink-0"></div>
                <div>
                    <p class="font-semibold">{{ $company->company_name }}</p>
                    <p class="text-sm">Company category</p>
                </div>
            </div>
            <div>
                <p class="font-semibold text-right">{{ $company->size->name }}</p>
                <p class="text-right text-sm">{{ $company->city }}<span class="hidden md:inline">, {{ $company->location->name }}</span></p>
            </div>
        </a>
        @endforeach
        {{ $companies->links() }}
    </div>
</div>
@endsection