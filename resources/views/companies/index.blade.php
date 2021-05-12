@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.companies'])
{{-- Content --}}
<div class="p-4">
    <form class="p-4 bg-gray-100 rounded-2xl" id="searchForm" role="form" action="{{ route('companies.index') }}" method="GET">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
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
        <div class="mt-4 flex justify-center">
            <input type="submit" class="px-8 py-2 whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center cursor-pointer w-full md:w-auto" value="{{ __('app/companies.search') }}">
        </div>
    </form>
    <table class="w-full mt-8">
        {{-- <thead>
            <tr class="border-b border-gray-200">
                <th class="p-4 text-left font-medium text-gray-500">Nazwa</th>
                <th class="p-4 text-left font-medium text-gray-500">Miasto</th>
                <th class="p-4 text-left font-medium text-gray-500">Województwo</th>
                <th class="p-4 text-left font-medium text-gray-500">Rozmiar</th>
            </tr>
        </thead> --}}
        <tbody>
            @foreach ($companies as $company)
            <tr class="hover:bg-gray-200 transition">
                <td>
                    <a href="{{ route('companies.show', $company) }}" class="p-4 flex space-x-4 items-center">
                        <div class="rounded-full w-8 h-8 bg-gray-900 flex-shrink-0"></div>
                        <p class="font-medium">{{ $company->company_name }}</p>
                    </a>
                </td>
                <td class="p-4 hidden sm:table-cell">
                    <p class="">{{ $company->city }}</p>
                </td>
                <td class="p-4 hidden md:table-cell">
                    <p class="">{{ $company->location->name }}</p>
                </td>
                <td class="p-4 hidden md:table-cell">
                    <p class="">{{ $company->size->name }}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $companies->links() }}
    </div>
</div>

@endsection