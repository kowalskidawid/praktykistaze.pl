@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2 flex items-center justify-between">
        <h1 class="text-xl font-semibold">{{ __('Your offers')}}</h1>
        <a href="{{ route('dashboard.offersCreate') }}" class="px-4 py-1 text-sm font-medium text-gray-900 border bg-white border-gray-200 rounded-lg hover:bg-gray-100">{{ __('Add new offer')}}</a>
    </div>
    <div class="py-4 flex flex-col space-y-4">
        @foreach ($offers as $offer)
        <div class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
            <div class="flex space-x-4 items-center">
                <div>
                    <a href="{{ route('offers.show', $offer) }}" class="text-xl font-semibold hover:underline">{{ $offer->position }}</a>
                    <p class="text-sm">{{ $offer->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex flex-col">
                <span class="text-xs uppercase font-semibold py-1 px-1 text-blue-600">{{ $offer->applications->count() }} {{ __('applicants')}}</span>
                <button class="text-xs bg-transparent hover:bg-blue-400 text-blue-600 font-semibold hover:text-white py-1 px-1 border border-blue-500 hover:border-transparent rounded"><a href="{{ route('dashboard.offersEdit', $offer) }}">{{ __('Edit')}}</a></button>
                <form action="{{route('offers.destroy', $offer)}}" method="post" onsubmit="return confirm('{{ __('Are you sure?')}}')">
                    @csrf
                    <button class="text-xs bg-transparent hover:bg-blue-400 text-blue-600 font-semibold hover:text-white w-24 py-1 px-5 border border-blue-500 hover:border-transparent rounded" type="submit">{{ __('Delete')}}</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection