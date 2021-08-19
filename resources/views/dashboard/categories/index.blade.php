@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2">
        <h1 class="text-xl font-semibold">{{ __('Categories')}}</h1>
    </div>
    <div class="py-2 flex flex-col space-y-2">
        @foreach ($categories as $category)
            <div class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
                <div class="flex space-x-4 items-center">
                    <div>
                        <span class="font-semibold">{{ $category->name }}</span>
                        <p class="text-sm">{{ __('Offers') }}: {{ $category->offers->count() }}</p>
                        <p class="text-sm">{{ __('Students') }}: {{ $category->students->count() }}</p>
                        <p class="text-sm">{{ __('Companies') }}: {{ $category->companies->count() }}</p>
                    </div>
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('dashboard.categories.edit', $category) }}">{{ __('Edit')}}</a>
                    @if($category->canDelete())
                        <form action="{{route('dashboard.categories.delete', $category)}}" method="post" onsubmit="return confirm('{{ __('Are you sure?')}}')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">{{ __('Delete')}}</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
