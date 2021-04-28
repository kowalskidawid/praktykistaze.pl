@extends('layouts.app')

@section('content')

{{-- Nav --}}
<div class="w-full flex justify-between p-4">
    <a href="{{ url()->previous() }}" class="w-10 h-10 flex justify-center items-center rounded-lg border border-gray-200">
        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.83 5L7.41 1.41L6 0L0 6L6 12L7.41 10.59L3.83 7H16V5H3.83Z" fill="#111827"/>
        </svg>
    </a>
    @if(Auth::user())
    @if ($student == Auth::user()->student)
    <a href="" class="h-10 px-4 flex justify-center font-semibold items-center rounded-lg bg-white border border-gray-200">
        Edytuj
    </a>
    @endif
    @endif
</div>
{{-- Company --}}
<div class="p-4 flex w-full items-center border-b border-gray-200">
    <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $student->image }}); background-size: cover; background-repeat: no-repeat;"></div>
    <div class="ml-4">
        <p class="text-lg font-semibold">{{ $student->first_name }} {{ $student->last_name }}</p>
        <p class="text-sm">{{ $student->city }}, {{ $student->location->name }}</p>
    </div>
</div>
<div class="p-4 pb-0 border-b border-gray-200">
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">{{ $student->education }}</p>
            <p class="text-xs">Edukacja</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">{{ $student->email }}</p>
            <p class="text-xs">Email kontaktowy</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">{{ $student->phone }}</p>
            <p class="text-xs">Telefon</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">/{{ $student->linkedin }}</p>
            <p class="text-xs">LinkedIn</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">/{{ $student->github }}</p>
            <p class="text-xs">GitHub</p>
        </div>
    </div>
</div>
<div class="p-4">
    <h1 class="text-2xl font-bold mb-2">O mnie</h1>
    <p>{{ $student->description }}</p>
</div>
<div class="p-4">
    <h1 class="text-2xl font-bold mb-2">Umiejętności</h1>
    <p>{{ $student->skills }}</p>
</div>

@endsection