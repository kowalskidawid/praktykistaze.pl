@extends('layouts.app')

@section('content')

<div class="p-4">
    <h1 class="font-bold text-2xl">Złożone aplikacje</h1>
</div>
{{-- Applications --}}
<div class="p-4 flex flex-col space-y-4">
    @foreach ($applications as $application)
    <a href="{{ route('offers.show', ['offer' => $application]) }}" class="p-4 bg-white rounded-2xl border-2 border-gray-100 shadow-lg flex space-x-4 items-center">
        <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $application->company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
        <div>
            <p class="text-lg font-semibold">{{ Str::limit($application->position, 20) }}</p>
            <p class="text-sm">{{ $application->category->name }}</p>
        </div>
    </a>
    @endforeach
</div>

@endsection