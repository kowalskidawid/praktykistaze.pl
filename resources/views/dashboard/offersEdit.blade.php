@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-8">
    <form action="{{ route('offers.update', $offer) }}" method="POST" class="flex flex-col space-y-2" enctype="multipart/form-data">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200 flex items-center justify-between">
            <h1 class="text-xl font-semibold">{{ __('Edit an offer')}}</h1>
            <a href="{{ route('offers.show', $offer) }}" class="px-4 py-1 text-sm font-medium text-gray-900 border bg-white border-gray-200 rounded-lg hover:bg-gray-100">Podgląd</a>
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
            <img class="flex flex-col space-y-2 w-full">
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
                @if ($offer->image)
                <img id="imgOld" src="{{ asset($offer->image) }}" alt="" class="w-full border border-gray-200 rounded-2xl">
                @endif
                <img id="imgPreview" src="" alt="" class="w-full">
                <script>
                    const imgOld = document.getElementById('imgOld');
                    const imgInput = document.getElementById('imgInput');
                    const imgPreview = document.getElementById('imgPreview');
                    imgInput.addEventListener('change', (event) => {
                        if(imgOld) {
                            imgOld.style.display = "none";
                        }
                        imgPreview.src = URL.createObjectURL(event.target.files[0]);
                    });
                </script>
            </img>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Position --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="position" class="text-sm font-medium">{{ __('Position*')}}</label>
                    <input name="position" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('Position')}}" value="{{ $offer->position }}">
                </div>
                {{-- Category --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="category_id" class="text-sm font-medium">{{ __('Category*')}}</label>
                    <select name="category_id" class="border border-gray-200 rounded-lg">
                        @foreach ($categories as $category)
                        @if ( $offer->category_id === $category->id )
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- City --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="city" class="text-sm font-medium">{{ __('City*')}}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('City')}}" value="{{ $offer->city }}">
                </div>
                {{-- Location --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="location_id" class="text-sm font-medium">{{ __('Location*')}}</label>
                    <select name="location_id" class="border border-gray-200 rounded-lg">
                        @foreach ($locations as $location)
                        @if ( $offer->location_id === $location->id )
                            <option value="{{ $location->id }}" selected>{{ $location->name }}</option>
                        @else
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Type --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="type_id" class="text-sm font-medium">{{ __('Type*')}}</label>
                    <select name="type_id" class="border border-gray-200 rounded-lg">
                        @foreach ($types as $type)
                        @if ( $offer->type_id === $type->id )
                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                {{-- Offer duration --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="offer_duration" class="text-sm font-medium">{{ __('Offer duration (in days)*')}}</label>
                    <input name="offer_duration" type="number" min="1" class="border border-gray-200 rounded-lg" placeholder="{{ __('Offer duration')}}" value="{{ $offer->offer_duration }}">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Job start --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="job_start" class="text-sm font-medium">{{ __('Job start date')}}</label>
                    <input name="job_start" type="date" min="{{ date("Y-m-d") }}" class="border border-gray-200 rounded-lg" placeholder="{{ __('Job start')}}" value="{{ $offer->job_start }}">
                </div>
                {{-- Job duration --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="job_duration" class="text-sm font-medium">{{ __('Job duration (in days)')}}</label>
                    <input name="job_duration" type="number" min="0" class="border border-gray-200 rounded-lg" placeholder="{{ __('Job duration')}}" value="{{ $offer->job_duration }}">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Salary --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="salary" class="text-sm font-medium">{{ __('Salary')}}</label>
                    <input name="salary" type="number" min="0" class="border border-gray-200 rounded-lg" placeholder="{{ __('Salary')}}" value="{{ $offer->salary }}">
                </div>
                {{-- Vacancies --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="vacancies" class="text-sm font-medium">{{ __('Vacancies')}}</label>
                    <input name="vacancies" type="number" min="1" class="border border-gray-200 rounded-lg" placeholder="{{ __('Vacancies')}}" value="{{ $offer->vacancies }}">
                </div>
            </div>
            {{-- Decription --}}
            <label for="description" class="text-sm font-medium">{{ __('Decription*')}}</label>
            <textarea class="ckeditor" name="description" id="" cols="30" rows="10">{{ $offer->description }}</textarea>
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Update')}}">
        </div>
    </form>
</div>
@endsection