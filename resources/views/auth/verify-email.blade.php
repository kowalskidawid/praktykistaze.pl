@extends('layouts.app')

@section('content')
{{-- Header --}}
<div class="p-4 flex items-center justify-between sticky top-0 bg-white">
    <div class="flex items-center">
        <button class="w-8 h-8 rounded flex justify-center items-center hover:bg-gray-200 md:hidden" onclick="toggleMobileMenu()">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 14.6667C18 15.403 17.403 16 16.6667 16H1.33333C0.596954 16 0 15.403 0 14.6667C0 13.9303 0.596954 13.3333 1.33333 13.3333H16.6667C17.403 13.3333 18 13.9303 18 14.6667ZM18 8C18 8.73638 17.403 9.33333 16.6667 9.33333H1.33333C0.596954 9.33333 0 8.73638 0 8C0 7.26362 0.596954 6.66667 1.33333 6.66667H16.6667C17.403 6.66667 18 7.26362 18 8ZM18 1.33333C18 2.06971 17.403 2.66667 16.6667 2.66667H1.33333C0.596954 2.66667 0 2.06971 0 1.33333C0 0.596954 0.596954 0 1.33333 0H16.6667C17.403 0 18 0.596954 18 1.33333Z" fill="#111827"/>
            </svg>
        </button>
        <button class="hidden w-8 h-8 rounded md:flex justify-center items-center hover:bg-gray-200" onclick="toggleMenu()">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 14.6667C18 15.403 17.403 16 16.6667 16H1.33333C0.596954 16 0 15.403 0 14.6667C0 13.9303 0.596954 13.3333 1.33333 13.3333H16.6667C17.403 13.3333 18 13.9303 18 14.6667ZM18 8C18 8.73638 17.403 9.33333 16.6667 9.33333H1.33333C0.596954 9.33333 0 8.73638 0 8C0 7.26362 0.596954 6.66667 1.33333 6.66667H16.6667C17.403 6.66667 18 7.26362 18 8ZM18 1.33333C18 2.06971 17.403 2.66667 16.6667 2.66667H1.33333C0.596954 2.66667 0 2.06971 0 1.33333C0 0.596954 0.596954 0 1.33333 0H16.6667C17.403 0 18 0.596954 18 1.33333Z" fill="#111827"/>
            </svg>
        </button>
        <p class="ml-4 text-xl font-semibold">Register</p>
    </div>
    <div>
        <div class="rounded-full w-8 h-8 bg-gray-900"></div>
    </div>
</div>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>

@endsection
