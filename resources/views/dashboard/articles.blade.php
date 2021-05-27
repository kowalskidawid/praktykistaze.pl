@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2 flex items-center justify-between">
        <h1 class="text-xl font-semibold">Articles</h1>
        <a href="{{ route('dashboard.articlesCreate') }}" class="px-4 py-1 text-sm font-medium text-gray-900 border bg-white border-gray-200 rounded-lg hover:bg-gray-100">Add article</a>
    </div>
    <div class="py-4 flex flex-col space-y-4">
        @foreach ($articles as $article)
        <div class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
            <div class="flex space-x-4 items-center">
                <div>
                    <a href="{{ route('articles.show', $article) }}" class="font-semibold hover:underline">{{ $article->title }}</a>
                    <p class="text-sm">{{ $article->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex flex-col">
                <a href="{{ route('dashboard.articlesEdit', $article) }}">{{ __('Edit')}}</a>
                <form action="{{route('articles.destroy', $article)}}" method="post" onsubmit="return confirm('{{ __('Are you sure?')}}')">
                    @csrf
                    <button type="submit">{{ __('Delete')}}</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection