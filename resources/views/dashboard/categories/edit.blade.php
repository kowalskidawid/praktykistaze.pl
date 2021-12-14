@extends('layouts.dashboard')

@section('main')
    <div class="flex flex-col space-y-2">
        <div class="border-b border-gray-200 py-2">
            <h1 class="text-xl font-semibold">{{ __('Edit category')}}</h1>
        </div>
        <form method="post" action="{{ route('dashboard.categories.update', $category) }}">
            @csrf
            @method('PUT')

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

            <div class="flex flex-col space-y-2 w-full">
                <label for="name" class="text-sm font-medium">{{ __('Name')}}</label>
                <input name="name" type="text" class="border border-gray-200 rounded-lg" placeholder="Name" value="{{ old('name', $category->name) }}">
            </div>

            <div class="pt-2">
                <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Edit')}}">
            </div>
        </form>
    </div>
@endsection
