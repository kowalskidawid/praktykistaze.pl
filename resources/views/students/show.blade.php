@extends('layouts.app')

@section('content')
<div class="p-4 flex space-x-8 max-w-screen-xl m-auto">
    <div class="w-full">
        {{-- Image --}}
        <div class="w-full h-80 bg-gray-800 rounded-xl"></div>
        {{-- Title --}}
        <div class="my-8 flex flex-col ">
            <div class="mb-2 text-xs text-white font-medium bg-blue-500 px-2 py-1 rounded w-min whitespace-nowrap">Category</div>
            <h1 class="text-4xl font-semibold">{{ $student->first_name }} {{ $student->last_name }}</h1>
        </div>
        {{-- About --}}
        <p>{{ $student->about }}</p>
    </div>
</div>
@endsection