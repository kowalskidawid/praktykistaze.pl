@extends('layouts.app')

@section('content')
{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'register.title'])
{{-- Content --}}
<x-auth-card>
    {{-- <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot> --}}
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('register', app()->getLocale()) }}">
        @csrf
        <!-- User role selection -->
        <div class="mt-4">
            {{-- <label for="role" class="block font-medium text-sm text-gray-700">I am</label> --}}
            <select id="role" name="role" class="w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option>Student</option>
                <option>Company</option>
            </select>
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
        <div class="flex items-center mt-4">
            <x-button class="mr-4">
                {{ __('Register') }}
            </x-button>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-auth-card>

@endsection
