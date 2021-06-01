@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2">
        <h1 class="text-xl font-semibold">{{ __('Applicants of your offers')}}</h1>
    </div>
    <div class="py-2 flex flex-col space-y-2">
        @foreach ($offers as $offer)
        @if ($offer->applications->count() > 0)
        <div class="pb-4 bg-white border-gray-200 border rounded-lg flex flex-col">
            <h2 class="p-4 text-xl font-semibold">{{ $offer->position }}</h2>
            <div class="flex flex-col space-y-2">
                @foreach ($offer->applications as $student)
                <div class="flex justify-between items-center px-4">
                    <div class="flex space-x-4 items-center">
                        <div class="flex items-center space-x-2">
                            <div class="rounded-full bg-gray-700 h-8 w-8"></div>
                            <a href="{{ route('students.show', $student) }}" class="font-semibold hover:underline">{{ $student->first_name }} {{ $student->last_name }}</a>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm">{{ $student->pivot->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection