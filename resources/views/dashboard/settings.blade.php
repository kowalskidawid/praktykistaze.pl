@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-8">
    <form action="{{ route('dashboard.email') }}" method="POST" class="flex flex-col space-y-2">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">{{ __('Change email adress')}}</h1>
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
            <label for="email" class="text-sm font-medium">{{ __('Email')}}</label>
            <input name="email" type="email" class="border border-gray-200 rounded-lg" placeholder="Email" value="{{ Auth::user()->email }}">
            <label for="password" class="text-sm font-medium">{{ __('Confirm your password')}}</label>
            <input name="password" type="password" class="border border-gray-200 rounded-lg" placeholder="{{ __('Confirm your password')}}" value="">
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Change email')}}">
        </div>
    </form>
    <form action="{{ route('dashboard.password') }}" method="POST" class="flex flex-col space-y-2">
        @csrf
        {{-- Title --}}
        <div class="pb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold">{{ __('Change your password')}}</h1>
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
            <label for="password" class="text-sm font-medium">{{ __('Your current password')}}</label>
            <input name="password" type="password" class="border border-gray-200 rounded-lg" placeholder="{{ __('Your current password')}}" value="">
            <label for="passwordNew" class="text-sm font-medium">{{ __('New password')}}</label>
            <input name="passwordNew" type="password" class="border border-gray-200 rounded-lg" placeholder="{{ __('New password')}}" value="">
            <label for="passwordConfirmed" class="text-sm font-medium">{{ __('Confirm new password')}}</label>
            <input name="passwordConfirmed" type="password" class="border border-gray-200 rounded-lg" placeholder="{{ __('Confirm new password')}}" value="">
        </div>
        {{-- Submit --}}
        <div class="pt-2">
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer" value="{{ __('Change password')}}">
        </div>
    </form>
</div>
@endsection