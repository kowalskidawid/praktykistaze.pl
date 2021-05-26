@extends('layouts.app')

@section('content')
<div class="p-4 m-auto max-w-screen-lg h-full">
    <div class="mt-8 grid grid-cols-1 gap-16 sm:grid-cols-2 md:grid-cols-3">
        @foreach ($articles as $article)
            @if ($loop->first)
            <div class="col-span-1 sm:col-span-2 md:col-span-3">
                <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-8">
                    <img src="{{ $article->image }}" alt="" class="w-full h-auto md:w-1/2 rounded-xl">
                    <div class="flex flex-col space-y-4">
                        <div class="flex flex-col">
                            <p class="text-sm text-blue-600 font-semibold">
                                {{ $article->created_at->translatedFormat('F d, Y') }}
                            </p>
                            <a href="{{ route('articles.show', $article) }}" class="text-3xl font-semibold hover:underline">
                                {{ $article->title }}
                            </a>
                        </div>
                        <div>
                            {!! Str::limit($article->content, 300) !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="flex flex-col space-y-4">
                <img src="{{ $article->image }}" alt="" class="w-full rounded-xl">
                <div class="flex flex-col">
                    <p class="text-sm text-blue-600 font-semibold">
                        {{ $article->created_at->translatedFormat('F d, Y') }}
                    </p>
                    <a href="{{ route('articles.show', $article) }}" class="text-xl font-semibold hover:underline">
                        {{ $article->title }}
                    </a>
                </div>
                <div>
                    {!! Str::limit($article->content, 100) !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection