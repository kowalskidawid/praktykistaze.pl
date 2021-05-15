@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2">
        <h1 class="text-xl font-semibold">Your applications</h1>
    </div>
    <div class="py-4 flex flex-col space-y-4">
        @foreach ($applications as $application)
        <a href="{{ route('offers.show', $application) }}" class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
            <div class="flex space-x-4 items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 flex-shrink-0"></div>
                <div>
                    <p class="font-semibold">{{ $application->position }}</p>
                    <p class="text-sm">{{ $application->category->name }}</p>
                </div>
            </div>
            <div>
                <p class="font-semibold text-right">{{ $application->salary }} PLN</p>
                <p class="text-right text-sm">{{ $application->city }}<span class="hidden md:inline">, {{ $application->location->name }}</span></p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection