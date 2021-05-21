@extends('layouts.fullscreen')

@section('content')
<div class="p-4 sm:p-8 sm:bg-white sm:border sm:border-gray-100 sm:rounded-2xl sm:shadow-lg flex flex-col space-y-8 w-full sm:max-w-md">
    {{-- Header --}}
    <div class="flex items-center space-x-4">
        <a href="{{ route('index') }}" class="flex space-x-2 items-center">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6L0 26C0 27.5913 0.632141 29.1174 1.75736 30.2426C2.88258 31.3679 4.4087 32 6 32H7V16C7.00038 14.0431 7.63853 12.1397 8.81778 10.5781C9.99703 9.01649 11.6531 7.88177 13.5352 7.34584C15.4172 6.80992 17.4226 6.902 19.2476 7.60812C21.0727 8.31425 22.6178 9.59596 23.649 11.2591C24.6802 12.9222 25.1412 14.8761 24.9623 16.8247C24.7834 18.7734 23.9742 20.6106 22.6574 22.0581C21.3405 23.5056 19.5878 24.4845 17.6647 24.8464C15.7416 25.2084 13.753 24.9337 12 24.064V32H26C27.5913 32 29.1174 31.3679 30.2426 30.2426C31.3679 29.1174 32 27.5913 32 26V6C32 4.4087 31.3679 2.88258 30.2426 1.75736C29.1174 0.632141 27.5913 0 26 0L6 0Z" fill="#111827"/>
                <path d="M20 16C20 17.0609 19.5786 18.0783 18.8284 18.8284C18.0783 19.5786 17.0609 20 16 20C14.9391 20 13.9217 19.5786 13.1716 18.8284C12.4214 18.0783 12 17.0609 12 16C12 14.9391 12.4214 13.9217 13.1716 13.1716C13.9217 12.4214 14.9391 12 16 12C17.0609 12 18.0783 12.4214 18.8284 13.1716C19.5786 13.9217 20 14.9391 20 16Z" fill="#111827"/>
            </svg>
        </a>
        <h1 class="text-xl font-semibold">Zarejestruj się</h1>
    </div>
    {{-- Main --}}
    <div class="flex flex-col space-y-2">
        {{-- Select role --}}
        <form method="GET" action="{{ route('register.index') }}" class="flex flex-col space-y-2">
            {{-- <label for="role" class="block font-medium text-sm text-gray-700">{{ __('Create an account for')}}</label> --}}
            <select id="select" name="role" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @if ( Request::get('role') === null )
                <option value="" selected>Wybierz rodzaj konta</option>
                @else
                <option value="">Wybierz rodzaj konta</option>
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
        {{-- Role: student --}}
        @if (Request::get('role') === 'student')
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register.student') }}" class="flex flex-col space-y-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-2">
                <div class="flex flex-col space-y-2">
                    <label for="first_name" class="block font-medium text-sm text-gray-700">{{ __('First name')}}</label>
                    <input id="first_name" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="first_name" placeholder="First name" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="last_name" class="block font-medium text-sm text-gray-700">{{ __('Last name')}}</label>
                    <input id="last_name" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="last_name" placeholder="Last name" required />
                </div>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="category" class="block font-medium text-sm text-gray-700">Twoja specjalizacja</label>
                <select name="category" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" selected></option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-2">
                <div class="flex flex-col space-y-2">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="text-base font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white hover:bg-blue-500 transition">{{ __('Register') }}</button>
            </div>
        </form>
        {{-- Role: company --}}
        @elseif (Request::get('role') === 'company')
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register.student') }}" class="flex flex-col space-y-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="company_name" class="block font-medium text-sm text-gray-700">{{ __('Company name')}}</label>
                <input id="company_name" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="company_name" placeholder="Company name" required />
            </div>
            <div class="flex flex-col space-y-2">
                <label for="category" class="block font-medium text-sm text-gray-700">Kategoria firmy</label>
                <select name="category" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" selected></option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-2">
                <div class="flex flex-col space-y-2">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="text-base font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white hover:bg-blue-500 transition">{{ __('Register') }}</button>
            </div>
        </form>
        {{-- Role: not selected --}}
        @else
        <div>
            <p class="text-sm text-gray-600">Utwórz konto studenckie i znajdź wymarzone praktyki lub zarejestruj się jako firma, by móc dodawać oferty pracy.</p>
        </div>
        @endif
    </div>
    {{-- Footer --}}
    <div>
        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">{{ __('Already registered?') }}</a>
    </div>
</div>

<script>
    var select = document.getElementById('select');
    select.onchange = function(){
        this.form.submit();
    };
</script>
@endsection
