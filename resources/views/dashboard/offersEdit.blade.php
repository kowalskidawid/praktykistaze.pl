@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-8">
    <form action="{{ route('offers.update', $offer) }}" method="POST" class="flex flex-col space-y-2">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">{{ __('Edit an offer')}}</h1>
        </div>
        {{-- Errors --}}
        @if ($errors->any())
            <div>
                <div class="font-medium text-red-600">
                    {{ __('Whoops! Something went wrong.') }}
                </div>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Inputs --}}
        <div class="py-2 flex flex-col space-y-2 sm:w-80">
            {{-- Position --}}
            <label for="position" class="text-sm font-medium">{{ __('Position*')}}</label>
            <input name="position" type="text" class="border border-gray-200 rounded-lg" placeholder="Position" value="{{ $offer->position }}">
            {{-- Category --}}
            <label for="category_id" class="text-sm font-medium">{{ __('Category*')}}</label>
            <select name="category_id" class="border border-gray-200 rounded-lg">
                @foreach ($categories as $category)
                @if ( $offer->category_id === $category->id )
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
            {{-- City --}}
            <label for="city" class="text-sm font-medium">{{ __('City*')}}</label>
            <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="City" value="{{ $offer->city }}">
            {{-- Location --}}
            <label for="location_id" class="text-sm font-medium">{{ __('Location*')}}</label>
            <select name="location_id" class="border border-gray-200 rounded-lg">
                @foreach ($locations as $location)
                @if ( $offer->location_id === $location->id )
                    <option value="{{ $location->id }}" selected>{{ $location->name }}</option>
                @else
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endif
                @endforeach
            </select>
            {{-- Type --}}
            <label for="type_id" class="text-sm font-medium">{{ __('Type*')}}</label>
            <select name="type_id" class="border border-gray-200 rounded-lg">
                @foreach ($types as $type)
                @if ( $offer->type_id === $type->id )
                    <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                @else
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endif
                @endforeach
            </select>
            {{-- Offer duration --}}
            <label for="offer_duration" class="text-sm font-medium">{{ __('Offer duration (in days)*')}}</label>
            <input name="offer_duration" type="number" min="1" class="border border-gray-200 rounded-lg" placeholder="Offer duration" value="{{ $offer->offer_duration }}">
            {{-- Job start --}}
            <label for="job_start" class="text-sm font-medium">{{ __('Job start date')}}</label>
            <input name="job_start" type="date" min="{{ date("Y-m-d") }}" class="border border-gray-200 rounded-lg" placeholder="Job start" value="{{ $offer->job_start }}">
            {{-- Job duration --}}
            <label for="job_duration" class="text-sm font-medium">{{ __('Job duration (in days)')}}</label>
            <input name="job_duration" type="number" min="0" class="border border-gray-200 rounded-lg" placeholder="Job duration" value="{{ $offer->job_duration }}">
            {{-- Salary --}}
            <label for="salary" class="text-sm font-medium">{{ __('Salary')}}</label>
            <input name="salary" type="number" min="0" class="border border-gray-200 rounded-lg" placeholder="Salary" value="{{ $offer->salary }}">
            {{-- Vacancies --}}
            <label for="vacancies" class="text-sm font-medium">{{ __('Vacancies')}}</label>
            <input name="vacancies" type="number" min="1" class="border border-gray-200 rounded-lg" placeholder="Vacancies" value="{{ $offer->vacancies }}">
            {{-- Decription --}}
            <label for="description" class="text-sm font-medium">{{ __('Decription*')}}</label>
            <input name="description" type="text" class="border border-gray-200 rounded-lg" placeholder="Decription" value="{{ $offer->description }}">
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Update')}}">
        </div>
    </form>
</div>
@endsection