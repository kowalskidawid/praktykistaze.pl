@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2">
        <h1 class="text-xl font-semibold">Your applications</h1>
    </div>
    <div class="py-4 flex flex-col space-y-4">
        @foreach ($applications as $application)
        <div class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
            <div class="flex space-x-4 items-center">
                <div>
                    <a href="{{ route('offers.show', $application) }}" class="font-semibold hover:underline">{{ $application->position }}</a>
                    <p class="text-sm">{{ $application->pivot->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div>
                <span class="text-xs uppercase font-semibold px-2 py-1 border border-blue-500 rounded text-blue-600">Applied</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection