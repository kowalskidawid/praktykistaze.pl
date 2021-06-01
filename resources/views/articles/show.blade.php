@extends('layouts.app')

@section('content')
<div class="p-4 m-auto max-w-screen-lg h-full">
    <div class="flex flex-col space-y-4">
        <div class="flex flex-col">
            <p class="text-sm text-blue-600 font-semibold">
                {{ $article->created_at->translatedFormat('F d, Y') }}
            </p>
            <h1 class="text-3xl font-semibold">
                {{ $article->title }}
            </h1>
        </div>
        <div class="w-full h-80 rounded-xl" style="background: url({{ $article->image }}); background-position: center;"></div>
        <div class="grid gap-8 grid-cols-1 md:grid-cols-3">
            <div class="flex flex-col space-y-2 md:col-span-2">
                {!! $article->content !!}
            </div>
            <div class="md:col-span-1 flex flex-col space-y-4">
                <h1 class="text-2xl font-semibold">{{ __('Other articles')}}</h1>
                <div class="flex flex-col space-y-4">
                    @foreach ($articles as $article)
                    <a href="{{ route('articles.show', $article) }}" class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
                        <div class="flex space-x-4 items-center">
                            <div>
                                <p class="font-semibold">{{ $article->title }}</p>
                                <p class="text-sm">{{ $article->created_at->translatedFormat('F d, Y') }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection