@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-8">
    {{-- 
        Form for students    
    --}}
    @if(Auth::user()->roleCheck('student'))
    <form action="{{ route('dashboard.student') }}" method="POST" class="flex flex-col space-y-2">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">Update your profile</h1>
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
        <div class="py-2 flex flex-col space-y-2 sm:w-80">
            <label for="first_name" class="text-sm font-medium">First name</label>
            <input name="first_name" type="text" class="border border-gray-200 rounded-lg" placeholder="First name" value="{{ Auth::user()->student->first_name }}">
            <label for="last_name" class="text-sm font-medium">Second name</label>
            <input name="last_name" type="text" class="border border-gray-200 rounded-lg" placeholder="Last name" value="{{ Auth::user()->student->last_name }}">
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="Update profile">
        </div>
    </form>
    {{-- 
        Form for companies    
    --}}
    @elseif(Auth::user()->roleCheck('company'))
    <form action="{{ route('dashboard.company') }}" method="POST" class="flex flex-col space-y-2">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">Update your profile</h1>
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
        <div class="py-2 flex flex-col space-y-2 sm:w-80">
            <label for="company_name" class="text-sm font-medium">Company name</label>
            <input name="company_name" type="text" class="border border-gray-200 rounded-lg" placeholder="Company name" value="{{ Auth::user()->company->company_name }}">
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="Update profile">
        </div>
    </form>
    @endif
</div>
@endsection