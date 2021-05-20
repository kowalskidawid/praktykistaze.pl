@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-8">
    <form action="{{ route('offers.store') }}" method="POST" class="flex flex-col space-y-2" enctype="multipart/form-data">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">{{ __('Add new offer')}}</h1>
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
                        <p class="text-sm font-medium">Image</p>
                        <p class="text-sm text-gray-500">Recomended size is 1024x320px.</p>
                    </div>
                    <label for="imgInput" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer">
                        <input hidden id="imgInput" type="file" name="image" accept=".jpg, .jpeg, .png, .gif">
                        Upload
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
                {{-- Position --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="position" class="text-sm font-medium">Position*</label>
                    <input name="position" type="text" class="border border-gray-200 rounded-lg" placeholder="Position" value="">
                </div>
                {{-- Category --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="category_id" class="text-sm font-medium">Category*</label>
                    <select name="category_id" class="border border-gray-200 rounded-lg">
                        <option value=""></option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- City --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="city" class="text-sm font-medium">City*</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="City" value="">
                </div>
                {{-- Location --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="location_id" class="text-sm font-medium">Location*</label>
                    <select name="location_id" class="border border-gray-200 rounded-lg">
                        <option value=""></option>
                        @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Type --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="type_id" class="text-sm font-medium">Type*</label>
                    <select name="type_id" class="border border-gray-200 rounded-lg">
                        <option value=""></option>
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Offer duration --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="offer_duration" class="text-sm font-medium">Offer duration (in days)*</label>
                    <input name="offer_duration" type="number" min="1" class="border border-gray-200 rounded-lg" placeholder="Offer duration" value="30">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Job start --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="job_start" class="text-sm font-medium">Job start date</label>
                    <input name="job_start" type="date" min="{{ date("Y-m-d") }}" class="border border-gray-200 rounded-lg" placeholder="Job start" value="">
                </div>
                {{-- Job duration --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="job_duration" class="text-sm font-medium">Job duration (in days)</label>
                    <input name="job_duration" type="number" min="0" class="border border-gray-200 rounded-lg" placeholder="Job duration" value="">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Salary --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="salary" class="text-sm font-medium">Salary</label>
                    <input name="salary" type="number" min="0" class="border border-gray-200 rounded-lg" placeholder="Salary" value="">
                </div>
                {{-- Vacancies --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="vacancies" class="text-sm font-medium">Vacancies</label>
                    <input name="vacancies" type="number" min="1" class="border border-gray-200 rounded-lg" placeholder="Vacancies" value="">
                </div>
            </div>
            {{-- Decription --}}
            <label for="description" class="text-sm font-medium">Decription*</label>
            <textarea class="ckeditor" name="description" id="" cols="30" rows="10"></textarea>
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Add')}}">
        </div>
    </form>
</div>
@endsection