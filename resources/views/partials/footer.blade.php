<div class="p-4 flex justify-between items-start max-w-screen-lg m-auto">

    <form method="POST" action="{{ route('language') }}" class="flex w-full">
        @csrf
        <div class="border border-gray-200 bg-gray-50 rounded-lg px-4 flex items-center justify-center border-r-0 rounded-r-none">
            @if (app()->getLocale() == 'pl')
            <svg class="border border-gray-300" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="6" width="16" height="6" fill="#E31D1C"/>
                <rect width="16" height="6" fill="#F5F8FB"/>
            </svg>
            @elseif (app()->getLocale() == 'en')
            <svg class="border border-gray-300" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0H16V12H0V0Z" fill="#41479B"/>
                <path d="M16 10.4375L10.0833 6.00001L16 1.5625V9.53674e-07H13.9167L8 4.43751L2.08333 9.53674e-07H0V1.5625L5.91667 6.00001L0 10.4375V12H2.08336L8 7.56251L13.9166 12H16V10.4375Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.47361e-06 0L0 3.29813e-06V0.625008L7.16667 6.00002L0 11.375V12H0.833366L8 6.62502L15.1666 12H16V11.375L8.83333 6.00002L16 0.625005V0H15.1667L8 5.37502L0.833323 0H2.47361e-06Z" fill="#DC251C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 4V0H10V4H16V8H10V12H6V8H0V4H6Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5V0H9V5H16V7H9V12H7V7H0V5H7Z" fill="#DC251C"/>
            </svg>
            @elseif (app()->getLocale() == 'uk')
            <svg class="border border-gray-300" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="16" height="6" fill="#3273D3"/>
                <rect y="6" width="16" height="6" fill="#FFD018"/>
            </svg>
            @elseif (app()->getLocale() == 'ru')
            <svg class="border border-gray-300" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="16" height="4" fill="#F5F8FB"/>
                <rect y="4" width="16" height="4" fill="#41479B"/>
                <rect y="8" width="16" height="4" fill="#DC251C"/>
            </svg>
            @endif
        </div>
        <select name="language" id="" class="border border-gray-200 rounded-lg rounded-l-none w-full sm:w-auto" onchange="this.form.submit()">
            @if (app()->getLocale() == 'pl')
            <option value="pl" selected>Język polski</option>
            @else
            <option value="pl">Język polski</option>
            @endif
            @if (app()->getLocale() == 'en')
            <option value="en" selected>English</option>
            @else
            <option value="en">English</option>
            @endif
            @if (app()->getLocale() == 'uk')
            <option value="uk" selected>Українська мова</option>
            @else
            <option value="uk">Українська мова</option>
            @endif
            @if (app()->getLocale() == 'ru')
            <option value="ru" selected>Pусский</option>
            @else
            <option value="ru">Pусский</option>
            @endif
        </select>
    </form>

    <div class="hidden md:flex space-x-24 whitespace-nowrap">
        <div class="flex flex-col">
            <p class="text-sm font-semibold mb-2">{{ __('Sitemap')}}</p>
            <ul>
                <li>
                    <a href="{{ route('index') }}" class="text-xs hover:underline">{{ __('Home')}}</a>
                </li>
                <li>
                    <a href="{{ route('offers.index') }}" class="text-xs hover:underline">{{ __('Offers')}}</a>
                </li>
                <li>
                    <a href="{{ route('companies.index') }}" class="text-xs hover:underline">{{ __('Companies')}}</a>
                </li>
                <li>
                    <a href="{{ route('students.index') }}" class="text-xs hover:underline">{{ __('Students')}}</a>
                </li>
                <li>
                    <a href="{{ route('dashboard.index') }}" class="text-xs hover:underline">{{ __('Dashboard')}}</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col">
            <p class="text-sm font-semibold mb-2">{{ __('Company')}}</p>
            <ul>
                <li>
                    <a href="{{ route('dashboard.offersCreate') }}" class="text-xs hover:underline">{{ __('Post an offer')}}</a>
                </li>
                <li>
                    <a href="{{ route('dashboard.applicants') }}" class="text-xs hover:underline">{{ __('Browse candidates')}}</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col">
            <p class="text-sm font-semibold mb-2">{{ __('Student')}}</p>
            <ul>
                <li>
                    <a href="{{ route('dashboard.favourites') }}" class="text-xs hover:underline">Favourites</a>
                </li>
                <li>
                    <a href="{{ route('dashboard.applications') }}" class="text-xs hover:underline">Applications</a>
                </li>
            </ul>
        </div>
    </div>
</div>