@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-8">
    {{-- 
        Form for students    
    --}}
    @if(Auth::user()->roleCheck('student'))
    <form action="{{ route('dashboard.student') }}" method="POST" class="flex flex-col space-y-2" enctype="multipart/form-data">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">{{ __('Update your profile')}}</h1>
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
            <div class="flex flex-col items-start space-y-2 w-full">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <p class="text-sm font-medium">{{ __('Image')}}</p>
                        <p class="text-sm text-gray-500">Recomended size is 64x64px</p>
                    </div>
                </div>
                <img id="imgOld" src="{{ asset(Auth::user()->student->image) }}" alt="" class="w-16 h-16">
                <img id="imgPreview" src="" alt="" class="w-16 h-16" style="display: none">
                <div>
                    <label for="imgInput" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer">
                        <input hidden id="imgInput" type="file" name="image" accept=".jpg, .jpeg, .png, .gif">
                        {{ __('Upload')}}
                    </label>
                </div>
                <script>
                    const imgOld = document.getElementById('imgOld');
                    const imgInput = document.getElementById('imgInput');
                    const imgPreview = document.getElementById('imgPreview');
                    imgInput.addEventListener('change', (event) => {
                        if(imgOld) {
                            imgOld.style.display = "none";
                            imgPreview.style.display = "block";
                        }
                        imgPreview.src = URL.createObjectURL(event.target.files[0]);
                    });
                </script>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- First Name --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="first_name" class="text-sm font-medium">{{ __('First name')}}</label>
                    <input name="first_name" type="text" class="border border-gray-200 rounded-lg" placeholder="First name" value="{{ Auth::user()->student->first_name }}">
                </div>
                {{-- Last Name --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="last_name" class="text-sm font-medium">{{ __('Second name')}}</label>
                    <input name="last_name" type="text" class="border border-gray-200 rounded-lg" placeholder="Last name" value="{{ Auth::user()->student->last_name }}">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- City --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="city" class="text-sm font-medium">{{ __('City')}}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('City')}}" value="{{ Auth::user()->student->city }}">
                </div>
                {{-- Location --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="location_id" class="text-sm font-medium">{{ __('Location')}}</label>
                    <select name="location_id" class="border border-gray-200 rounded-lg">
                        @foreach ($locations as $location)
                        @if ( Auth::user()->student->location_id === $location->id )
                            <option value="{{ $location->id }}" selected>{{ $location->name }}</option>
                        @else
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Category --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="category_id" class="text-sm font-medium">{{ __('Category*')}}</label>
                    <select name="category_id" class="border border-gray-200 rounded-lg">
                        @foreach ($categories as $category)
                        @if ( Auth::user()->student->category_id === $category->id )
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                {{-- Education --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="education" class="text-sm font-medium">Edukacja</label>
                    <input name="education" type="text" class="border border-gray-200 rounded-lg" placeholder="Edukacja" value="{{ Auth::user()->student->education }}">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Email --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="email" class="text-sm font-medium">Email kontaktowy</label>
                    <input name="email" type="email" class="border border-gray-200 rounded-lg" placeholder="Email kontaktowy" value="{{ Auth::user()->student->email }}">
                </div>
                {{-- Phone --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="phone" class="text-sm font-medium">Numer telefonu</label>
                    <input name="phone" type="tel" class="border border-gray-200 rounded-lg" placeholder="Numer telefonu" value="{{ Auth::user()->student->phone }}">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- LinkedIn --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="linkedin" class="text-sm font-medium">LinkedIn</label>
                    <input name="linkedin" type="url" class="border border-gray-200 rounded-lg" placeholder="Linkedin" value="{{ Auth::user()->student->linkedin }}">
                </div>
                {{-- Website --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="website" class="text-sm font-medium">Website</label>
                    <input name="website" type="url" class="border border-gray-200 rounded-lg" placeholder="Website" value="{{ Auth::user()->student->website }}">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- GitHub --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="github" class="text-sm font-medium">GitHub</label>
                    <input name="github" type="url" class="border border-gray-200 rounded-lg" placeholder="GitHub" value="{{ Auth::user()->student->github }}">
                </div>
            </div>
            {{-- Decription --}}
            <label for="description" class="text-sm font-medium">{{ __('Decription')}}</label>
            <textarea class="ckeditor" name="description" id="" cols="30" rows="10">{{ Auth::user()->student->description }}</textarea>
            {{-- Skills --}}
            <label for="skills" class="text-sm font-medium">Skills</label>
            <textarea class="ckeditor" name="skills" id="" cols="30" rows="10">{{ Auth::user()->student->skills }}</textarea>
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Update profile')}}">
        </div>
    </form>
    {{-- 
        Form for companies    
    --}}
    @elseif(Auth::user()->roleCheck('company'))
    <form action="{{ route('dashboard.company') }}" method="POST" class="flex flex-col space-y-2" enctype="multipart/form-data">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">{{ __('Update your profile')}}</h1>
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
            <div class="flex flex-col items-start space-y-2 w-full">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <p class="text-sm font-medium">{{ __('Image')}}</p>
                        <p class="text-sm text-gray-500">Recomended size is 64x64px</p>
                    </div>
                </div>
                <img id="imgOld" src="{{ asset(Auth::user()->company->image) }}" alt="" class="w-16 h-16">
                <img id="imgPreview" src="" alt="" class="w-16 h-16" style="display: none">
                <div>
                    <label for="imgInput" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer">
                        <input hidden id="imgInput" type="file" name="image" accept=".jpg, .jpeg, .png, .gif">
                        {{ __('Upload')}}
                    </label>
                </div>
                <script>
                    const imgOld = document.getElementById('imgOld');
                    const imgInput = document.getElementById('imgInput');
                    const imgPreview = document.getElementById('imgPreview');
                    imgInput.addEventListener('change', (event) => {
                        if(imgOld) {
                            imgOld.style.display = "none";
                            imgPreview.style.display = "block";
                        }
                        imgPreview.src = URL.createObjectURL(event.target.files[0]);
                    });
                </script>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Company Name --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="company_name" class="text-sm font-medium">Company name</label>
                    <input name="company_name" type="text" class="border border-gray-200 rounded-lg" placeholder="Company name" value="{{ Auth::user()->company->company_name }}">
                </div>
                {{-- Size --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="size_id" class="text-sm font-medium">Size</label>
                    <select name="size_id" class="border border-gray-200 rounded-lg">
                        @foreach ($sizes as $size)
                        @if ( Auth::user()->company->size_id === $size->id )
                            <option value="{{ $size->id }}" selected>{{ $size->name }}</option>
                        @else
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- City --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="city" class="text-sm font-medium">{{ __('City')}}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('City')}}" value="{{ Auth::user()->company->city }}">
                </div>
                {{-- Location --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="location_id" class="text-sm font-medium">{{ __('Location')}}</label>
                    <select name="location_id" class="border border-gray-200 rounded-lg">
                        @foreach ($locations as $location)
                        @if ( Auth::user()->company->location_id === $location->id )
                            <option value="{{ $location->id }}" selected>{{ $location->name }}</option>
                        @else
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Category --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="category_id" class="text-sm font-medium">{{ __('Category*')}}</label>
                    <select name="category_id" class="border border-gray-200 rounded-lg">
                        @foreach ($categories as $category)
                        @if ( Auth::user()->company->category_id === $category->id )
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Email --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="email" class="text-sm font-medium">Email kontaktowy</label>
                    <input name="email" type="email" class="border border-gray-200 rounded-lg" placeholder="Email kontaktowy" value="{{ Auth::user()->company->email }}">
                </div>
                {{-- Phone --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="phone" class="text-sm font-medium">Numer telefonu</label>
                    <input name="phone" type="tel" class="border border-gray-200 rounded-lg" placeholder="Numer telefonu" value="{{ Auth::user()->company->phone }}">
                </div>
            </div>
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                {{-- Website --}}
                <div class="flex flex-col space-y-2 w-full">
                    <label for="website" class="text-sm font-medium">Website</label>
                    <input name="website" type="url" class="border border-gray-200 rounded-lg" placeholder="Website" value="{{ Auth::user()->company->website }}">
                </div>
            </div>
            {{-- Decription --}}
            <label for="description" class="text-sm font-medium">{{ __('Decription')}}</label>
            <textarea class="ckeditor" name="description" id="" cols="30" rows="10">{{ Auth::user()->company->description }}</textarea>
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Update profile')}}">
        </div>
    </form>
    @endif
</div>
@endsection