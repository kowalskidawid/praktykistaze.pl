@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.companies'])
{{-- Content --}}
<div class="p-4 mb-16 mt-8 max-w-screen-lg m-auto">
    <header>
        <div class="flex space-x-4 items-center">
            {{-- Avatar --}}
            <div class="w-20 h-20 bg-gray-300 rounded-full"></div>
            <div class="flex flex-col">
                <p class="text-2xl font-semibold">{{ $company->company_name }}</p>
                <p class="text-lg">Category</p>
            </div>
        </div>
    </header>
</div>

@endsection