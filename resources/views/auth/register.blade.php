@extends('layouts.fullscreen')

@section('content')

<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    {{-- Select form base on role --}}
    <form method="GET" action="{{ route('register.index') }}">
        <label for="role" class="block font-medium text-sm text-gray-700">{{ __('Create an account for')}}</label>
        <select id="select" name="role" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @if ( Request::get('role') === null )
            <option value="" selected></option>
            @else
            <option value=""></option>
            @endif
            @if ( Request::get('role') === 'student' )
            <option value="student" selected>{{ __('Student')}}</option>
            @else
            <option value="student">{{ __('Student')}}</option>
            @endif
            @if ( Request::get('role') === 'company' )
            <option value="company" selected>{{ __('Company')}}</option>
            @else
            <option value="company">{{ __('Company')}}</option>
            @endif
        </select>
    </form>
    {{-- Forms --}}
    @if (Request::get('role') === 'student')
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('register.student') }}">
        @csrf
        <!-- First name -->
        <div class="mt-4">
            <label for="first_name" class="block font-medium text-sm text-gray-700">{{ __('First name')}}</label>
            <input id="first_name" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="first_name" placeholder="First name" required />
        </div>
        <!-- Last name -->
        <div class="mt-4">
            <label for="last_name" class="block font-medium text-sm text-gray-700">{{ __('Last name')}}</label>
            <input id="last_name" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="last_name" placeholder="Last name" required />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>
        {{-- Category --}}
        <div class="mt-4">
            <label for="category" class="block font-medium text-sm text-gray-700">{{ __('Category')}}</label>
            <select name="category" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="" selected></option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center mt-4">
            <x-button class="mr-4">
                {{ __('Register') }}
            </x-button>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
    @elseif (Request::get('role') === 'company')
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('register.company') }}">
        @csrf
        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>
        <!-- Company name -->
        <div class="mt-4">
            <label for="company_name" class="block font-medium text-sm text-gray-700">{{ __('Company name')}}</label>
            <input id="company_name" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="company_name" placeholder="Company name" required />
        </div>
        {{-- Category --}}
        <div class="mt-4">
            <label for="category" class="block font-medium text-sm text-gray-700">{{ __('Category')}}</label>
            <select name="category" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="" selected></option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center mt-4">
            <x-button class="mr-4">
                {{ __('Register') }}
            </x-button>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
    {{-- @else
    <p>Select role</p> --}}
    @endif
</x-auth-card>


<script>
    var select = document.getElementById('select');
    select.onchange = function(){
        this.form.submit();
    };
</script>
@endsection
