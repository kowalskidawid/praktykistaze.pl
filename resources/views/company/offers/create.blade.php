@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center p-4">
    <h1 class="font-bold text-2xl">Dodaj ofertę</h1>
</div>
<div class="p-4">
    <form class="flex flex-col space-y-4" id="addOfferForm" role="form" action="{{ route('company.offers.store') }}" method="POST">
        @csrf
        {{-- Position --}}
        <div class="flex flex-col space-y-2">
            <label for="position" class="text-sm font-medium">Nazwa stanowiska</label>
            <input name="position" type="text" class="border border-gray-200 rounded-lg bg-gray-100" placeholder="Stanowisko">
        </div>
        {{-- City --}}
        <div class="flex flex-col space-y-2">
            <label for="city" class="text-sm font-medium">Miasto</label>
            <input name="city" type="text" class="border border-gray-200 rounded-lg bg-gray-100" placeholder="Miasto">
        </div>
        {{-- Location --}}
        <div class="flex flex-col space-y-2">
            <label for="location" class="text-sm font-medium">Województwo</label>
            <select name="location" class="border border-gray-200 rounded-lg bg-gray-100">
                <option value="">Wybierz województwo</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Category --}}
        <div class="flex flex-col space-y-2">
            <label for="category" class="text-sm font-medium">Kategoria</label>
            <select name="category" class="border border-gray-200 rounded-lg bg-gray-100">
                <option value="">Wybierz kategorię</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Type --}}
        <div class="flex flex-col space-y-2">
            <label for="type" class="text-sm font-medium">Rodzaj zatrudnienia</label>
            <select name="type" class="border border-gray-200 rounded-lg bg-gray-100">
                <option value="">Wybierz rodzaj zatrudnienia</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- Job duration --}}
        <div class="flex flex-col space-y-2">
            <label for="job_duration" class="text-sm font-medium">Czas zatrudnienia (w dniach)</label>
            <input name="job_duration" type="number" class="border border-gray-200 rounded-lg bg-gray-100">
        </div>
        {{-- Job start --}}
        <div class="flex flex-col space-y-2">
            <label for="job_start" class="text-sm font-medium">Data rozpoczęcia pracy</label>
            <input name="job_start" type="date" class="border border-gray-200 rounded-lg bg-gray-100">
        </div>
        {{-- Salary --}}
        <div class="flex flex-col space-y-2">
            <label for="salary" class="text-sm font-medium">Pensja</label>
            <input name="salary" type="number" class="border border-gray-200 rounded-lg bg-gray-100" value="0">
        </div>
        {{-- Vacancies --}}
        <div class="flex flex-col space-y-2">
            <label for="vacancies" class="text-sm font-medium">Ilość miejsc</label>
            <input name="vacancies" type="number" class="border border-gray-200 rounded-lg bg-gray-100">
        </div>
        {{-- Description --}}
        <div class="flex flex-col space-y-2">
            <label for="description" class="text-sm font-medium">Opis pracy</label>
            <textarea name="description" type="text" class="border border-gray-200 rounded-lg bg-gray-100" placeholder="Opis stanowiska" style="min-height: 300px;"></textarea>
        </div>

        {{-- Offer duration --}}
        <div class="flex flex-col space-y-2">
            <label for="offer_duration" class="text-sm font-medium">Czas trwania oferty (w dniach)</label>
            <input name="offer_duration" type="number" class="border border-gray-200 rounded-lg bg-gray-100" value="30">
        </div>
        {{-- Submit --}}
        <div class="py-4">
            <input type="submit" class="px-4 py-2 w-full whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center" value="Dodaj ofertę">
        </div>
    </form>
</div>

@endsection