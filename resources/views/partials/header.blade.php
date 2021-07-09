<div class="p-4 max-w-screen-lg flex items-center justify-between m-auto">
    {{-- Mobile burger --}}
    <div class="flex items-center sm:hidden">
        <button class="w-8 h-8 rounded flex justify-center items-center hover:bg-gray-200 md:hidden" onclick="toggleMobileMenu()">
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 14.6667C18 15.403 17.403 16 16.6667 16H1.33333C0.596954 16 0 15.403 0 14.6667C0 13.9303 0.596954 13.3333 1.33333 13.3333H16.6667C17.403 13.3333 18 13.9303 18 14.6667ZM18 8C18 8.73638 17.403 9.33333 16.6667 9.33333H1.33333C0.596954 9.33333 0 8.73638 0 8C0 7.26362 0.596954 6.66667 1.33333 6.66667H16.6667C17.403 6.66667 18 7.26362 18 8ZM18 1.33333C18 2.06971 17.403 2.66667 16.6667 2.66667H1.33333C0.596954 2.66667 0 2.06971 0 1.33333C0 0.596954 0.596954 0 1.33333 0H16.6667C17.403 0 18 0.596954 18 1.33333Z" fill="#111827"/>
            </svg>
        </button>
    </div>
    {{-- Desktop navigation --}}
    <div class="hidden sm:flex space-x-8 items-center">
        <a href="{{ route('index') }}" class="hidden sm:flex space-x-2 items-center">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6L0 26C0 27.5913 0.632141 29.1174 1.75736 30.2426C2.88258 31.3679 4.4087 32 6 32H7V16C7.00038 14.0431 7.63853 12.1397 8.81778 10.5781C9.99703 9.01649 11.6531 7.88177 13.5352 7.34584C15.4172 6.80992 17.4226 6.902 19.2476 7.60812C21.0727 8.31425 22.6178 9.59596 23.649 11.2591C24.6802 12.9222 25.1412 14.8761 24.9623 16.8247C24.7834 18.7734 23.9742 20.6106 22.6574 22.0581C21.3405 23.5056 19.5878 24.4845 17.6647 24.8464C15.7416 25.2084 13.753 24.9337 12 24.064V32H26C27.5913 32 29.1174 31.3679 30.2426 30.2426C31.3679 29.1174 32 27.5913 32 26V6C32 4.4087 31.3679 2.88258 30.2426 1.75736C29.1174 0.632141 27.5913 0 26 0L6 0Z" fill="#111827"/>
                <path d="M20 16C20 17.0609 19.5786 18.0783 18.8284 18.8284C18.0783 19.5786 17.0609 20 16 20C14.9391 20 13.9217 19.5786 13.1716 18.8284C12.4214 18.0783 12 17.0609 12 16C12 14.9391 12.4214 13.9217 13.1716 13.1716C13.9217 12.4214 14.9391 12 16 12C17.0609 12 18.0783 12.4214 18.8284 13.1716C19.5786 13.9217 20 14.9391 20 16Z" fill="#111827"/>
            </svg>
        </a>
        <div class="hidden sm:flex space-x-4 items-center font-semibold">
            <a href="{{ route('offers.index') }}" class="hover:text-blue-600 {{ request()->is('offers*') ? 'text-blue-600' : ''}}">{{ __('Offers')}}</a>
            <a href="{{ route('companies.index') }}" class="hover:text-blue-600 {{ request()->is('companies*') ? 'text-blue-600' : ''}}">{{ __('Companies')}}</a>
            <a href="{{ route('students.index') }}" class="hover:text-blue-600 {{ request()->is('students*') ? 'text-blue-600' : ''}}">{{ __('Students')}}</a>
            <div class="font-normal flex items-center space-x-1">
                <a href="{{ route('articles.index') }}" class="font-semibold hover:text-blue-600 {{ request()->is('articles*') ? 'text-blue-600' : ''}}">Articles</a>
                @if ($pinnedArticles->count() > 0)
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach($pinnedArticles as $pinnedArticle)
                        <x-dropdown-link :href="route('articles.show', $pinnedArticle)">
                        {{  Str::limit($pinnedArticle->title, 20) }}
                        </x-dropdown-link>
                        @endforeach
                        <hr>
                        <x-dropdown-link :href="route('articles.index')">
                            More articles
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
                @endif
            </div>
        </div>
    </div>
    {{-- User --}}
    @if (Auth::user())
    <div class="flex items-center space-x-2">
        <div class="flex items-center space-x-3">
            @if (Auth::user()->roleCheck('student'))
            <a href="{{ route('students.show', Auth::user()->student) }}" class="rounded-full w-8 h-8">
                <img src="{{ asset(Auth::user()->student->image) }}" alt="" class="">
            </a>
            @elseif (Auth::user()->roleCheck('company'))
            <a href="{{ route('companies.show', Auth::user()->company) }}" class="rounded-full w-8 h-8">
                <img src="{{ asset(Auth::user()->company->image) }}" alt="" class="">
            </a>
            @elseif (Auth::user()->roleCheck('admin'))
            <div class="rounded-full w-8 h-8 bg-gray-900 flex items-center justify-center text-white font-bold">A</div>
            @endif
            <div class="hidden sm:flex flex-col">
                @if (Auth::user()->roleCheck('student'))
                <p class="text-xs font-semibold">{{ Auth::user()->student->first_name }} {{ Auth::user()->student->last_name }}</p>
                @elseif (Auth::user()->roleCheck('company'))
                <p class="text-xs font-semibold">{{ Auth::user()->company->company_name }}</p>
                @elseif (Auth::user()->roleCheck('admin'))
                <p class="text-xs font-semibold">{{ __('Admin')}}</p>
                @endif
                <p class="text-xs">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>
            <x-slot name="content">
                <x-dropdown-link :href="route('dashboard.index')">
                {{ __('Dashboard')}}
                </x-dropdown-link>
                <hr>
                {{-- Student --}}
                @if (Auth::user()->roleCheck('student'))
                <x-dropdown-link :href="route('dashboard.favourites')">
                {{ __('Favourites')}}
                </x-dropdown-link>
                <x-dropdown-link :href="route('dashboard.applications')">
                {{ __('Applications')}}
                </x-dropdown-link>
                @endif
                @if (Auth::user()->roleCheck('company'))
                {{-- Company --}}
                <x-dropdown-link :href="route('dashboard.offersCreate')">
                {{ __('Add offer')}}
                </x-dropdown-link>
                <x-dropdown-link :href="route('dashboard.offers')">
                {{ __('Your offers')}}
                </x-dropdown-link>
                <x-dropdown-link :href="route('dashboard.applicants')">
                {{ __('Applicants')}}
                </x-dropdown-link>
                @endif
                @if (Auth::user()->roleCheck('admin'))
                {{-- Admin --}}
                <x-dropdown-link :href="route('dashboard.articlesCreate')">
                {{ __('Add new article')}}
                </x-dropdown-link>
                <x-dropdown-link :href="route('dashboard.articles')">
                {{ __('Articles')}}
                </x-dropdown-link>
                @endif
                <x-dropdown-link :href="route('dashboard.settings')">
                {{ __('Settings')}}
                </x-dropdown-link>
                <hr>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
        <form method="POST" action="{{ route('language') }}" class="flex">
        @csrf
        <select name="language" id="" class="border border-gray-200 rounded-lg rounded-2xl-none w-full sm:w-auto" onchange="this.form.submit()">
            @if (app()->getLocale() == 'en')
            <option value="en" selected>EN</option>
            @else
            <option value="en">EN</option>
            @endif
            @if (app()->getLocale() == 'pl')
            <option value="pl" selected>PL</option>
            @else
            <option value="pl">PL</option>
            @endif
            @if (app()->getLocale() == 'uk')
            <option value="uk" selected>UK</option>
            @else
            <option value="uk">UK</option>
            @endif
            @if (app()->getLocale() == 'ru')
            <option value="ru" selected>RU</option>
            @else
            <option value="ru">RU</option>
            @endif
        </select>
    </form>

    </div>
    @else
    <div class="flex space-x-2 items-center">
        <a href="{{ route('login') }}" class="text-sm font-medium px-4 py-2 rounded border border-gray-300 text-gray-900 hover:bg-gray-50 transition">{{ __('Login')}}</a>
        <a href="{{ route('register.index') }}" class="text-sm font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white hover:bg-blue-500 transition">{{ __('Register')}}</a>
        <form method="POST" action="{{ route('language') }}" class="flex">
        @csrf
        <select name="language" id="" class="border border-gray-200 rounded-lg rounded-2xl-none w-full sm:w-auto" onchange="this.form.submit()">
            @if (app()->getLocale() == 'en')
            <option value="en" selected>EN</option>
            @else
            <option value="en">EN</option>
            @endif
            @if (app()->getLocale() == 'pl')
            <option value="pl" selected>PL</option>
            @else
            <option value="pl">PL</option>
            @endif
            @if (app()->getLocale() == 'uk')
            <option value="uk" selected>UK</option>
            @else
            <option value="uk">UK</option>
            @endif
            @if (app()->getLocale() == 'ru')
            <option value="ru" selected>RU</option>
            @else
            <option value="ru">RU</option>
            @endif
        </select>
    </form>

    </div>
    @endif
</div>