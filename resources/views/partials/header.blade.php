<div class="p-4 flex items-center justify-between sticky top-0 bg-white border-b border-gray-200">
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
        <p class="ml-4 text-lg font-semibold">{{ __($title) }}</p>
        {{-- <p class="ml-4 text-xl font-semibold">{{ __('index.title') }}</p> --}}
    </div>
    {{-- User avatar and details --}}
    @if (Auth::user())
    <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-3">
        <div class="rounded-full w-8 h-8 bg-gray-900"></div>
        <div class="hidden sm:flex flex-col">
            @if (Auth::user()->roleCheck('student'))
            <p class="text-xs font-semibold">{{ Auth::user()->student->first_name }} {{ Auth::user()->student->last_name }}</p>
            @elseif (Auth::user()->roleCheck('company'))
            <p class="text-xs font-semibold">{{ Auth::user()->company->company_name }}</p>
            @elseif (Auth::user()->roleCheck('admin'))
            <p class="text-xs font-semibold">Admin</p>
            @endif
            <p class="text-xs">{{ Auth::user()->email }}</p>
        </div>
    </a>
    @else
    <div class="flex space-x-2 items-center font-semibold text-sm text-gray-700">
        <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
        <span>|</span>
        <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>
    </div>
    @endif
</div>