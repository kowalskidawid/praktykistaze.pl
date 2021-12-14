@extends('layouts.fullscreen')

@section('content')
<div class="p-4 sm:p-8 sm:bg-white sm:border sm:border-gray-100 sm:rounded-2xl sm:shadow-lg flex flex-col space-y-8 w-full sm:max-w-md">
    <div class="mb-4 flex justify-between items-center">
        <a href="{{ route('index') }}" class="flex space-x-2 items-center">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.91988 2H16.0899C19.6199 2 21.9999 4.271 21.9999 7.66V16.33C21.9999 19.72 19.6199 22 16.0899 22H7.91988C4.37988 22 1.99988 19.72 1.99988 16.33V7.66C1.99988 4.271 4.37988 2 7.91988 2ZM9.72988 12.75H16.0799C16.4999 12.75 16.8299 12.41 16.8299 12C16.8299 11.58 16.4999 11.25 16.0799 11.25H9.72988L12.2099 8.78C12.3499 8.64 12.4299 8.44 12.4299 8.25C12.4299 8.061 12.3499 7.87 12.2099 7.72C11.9199 7.43 11.4399 7.43 11.1499 7.72L7.37988 11.47C7.09988 11.75 7.09988 12.25 7.37988 12.53L11.1499 16.28C11.4399 16.57 11.9199 16.57 12.2099 16.28C12.4999 15.98 12.4999 15.51 12.2099 15.21L9.72988 12.75Z" fill="#130F26"/>
            </svg>
            <span class="text-sm font-medium">{{ __('Back to Home')}}</span>
        </a>
    </div>
    {{-- Header --}}
    <div class="flex items-center space-x-4">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6L0 26C0 27.5913 0.632141 29.1174 1.75736 30.2426C2.88258 31.3679 4.4087 32 6 32H7V16C7.00038 14.0431 7.63853 12.1397 8.81778 10.5781C9.99703 9.01649 11.6531 7.88177 13.5352 7.34584C15.4172 6.80992 17.4226 6.902 19.2476 7.60812C21.0727 8.31425 22.6178 9.59596 23.649 11.2591C24.6802 12.9222 25.1412 14.8761 24.9623 16.8247C24.7834 18.7734 23.9742 20.6106 22.6574 22.0581C21.3405 23.5056 19.5878 24.4845 17.6647 24.8464C15.7416 25.2084 13.753 24.9337 12 24.064V32H26C27.5913 32 29.1174 31.3679 30.2426 30.2426C31.3679 29.1174 32 27.5913 32 26V6C32 4.4087 31.3679 2.88258 30.2426 1.75736C29.1174 0.632141 27.5913 0 26 0L6 0Z" fill="#111827"/>
                <path d="M20 16C20 17.0609 19.5786 18.0783 18.8284 18.8284C18.0783 19.5786 17.0609 20 16 20C14.9391 20 13.9217 19.5786 13.1716 18.8284C12.4214 18.0783 12 17.0609 12 16C12 14.9391 12.4214 13.9217 13.1716 13.1716C13.9217 12.4214 14.9391 12 16 12C17.0609 12 18.0783 12.4214 18.8284 13.1716C19.5786 13.9217 20 14.9391 20 16Z" fill="#111827"/>
            </svg>
        <h1 class="text-xl font-semibold">{{ __('Zaloguj się')}}</h1>
    </div>
    {{-- Main --}}
    <div class="flex flex-col space-y-4">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}" class="flex flex-col space-y-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="flex flex-col space-y-2">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
            </div>
            <label for="show_pwd" class="inline-flex items-center">
                <input id="show_pwd" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Show password')}}</span>
            </label>
            <script>
                document.getElementById("show_pwd").addEventListener("click", function(e){
                    var pwd = document.getElementById("password");
                    if(pwd.getAttribute("type")=="password"){
                        pwd.setAttribute("type","text");
                    } else {
                        pwd.setAttribute("type","password");
                    }
                });

            </script>
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            <div class="pt-2">
                <button type="submit" class="text-base font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white hover:bg-blue-500 transition">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>
    {{-- Footer --}}
    <div class="pt-4">
        @if (Route::has('password.request'))
        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request')}}">
            {{ __('Forgot your password?') }}
        </a>
        @endif
    </div>
</div>
@endsection