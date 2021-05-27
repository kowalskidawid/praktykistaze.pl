@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-8">
    <form action="{{ route('articles.store') }}" method="POST" class="flex flex-col space-y-2" enctype="multipart/form-data">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">Add new article</h1>
        </div>
        {{-- Errors --}}
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
        {{-- Inputs --}}
        <div class="py-2 flex flex-col space-y-2">
            {{-- Image --}}
            <div class="flex flex-col space-y-2 w-full">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <p class="text-sm font-medium">{{ __('Image')}}</p>
                        <p class="text-sm text-gray-500">{{ __('Recomended size is 1024x320px.')}}</p>
                    </div>
                    <label for="imgInput" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer">
                        <input hidden id="imgInput" type="file" name="image" accept=".jpg, .jpeg, .png, .gif">
                        {{ __('Upload')}}
                    </label>
                </div>
                <img id="imgPreview" src="" alt="" class="w-full">
                <script>
                    const imgInput = document.getElementById('imgInput');
                    const imgPreview = document.getElementById('imgPreview');
                    imgInput.addEventListener('change', (event) => {
                        imgPreview.src = URL.createObjectURL(event.target.files[0]);
                    });
                </script>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Title --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="title" class="text-sm font-medium">Title</label>
                    <input name="title" type="text" class="border border-gray-200 rounded-lg" placeholder="Title" value="">
                </div>
                {{-- Pinned --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="pinned" class="text-sm font-medium">Pinned</label>
                    <select name="pinned" class="border border-gray-200 rounded-lg">
                        <option selected></option>
                        <option value="0">Nie</option>
                        <option value="1">Tak</option>
                    </select>
                </div>
            </div>
            {{-- Decription --}}
            <label for="content" class="text-sm font-medium">Content</label>
            <textarea class="ckeditor" name="content" id="" cols="30" rows="10"></textarea>
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Add')}}">
        </div>
    </form>
</div>
@endsection