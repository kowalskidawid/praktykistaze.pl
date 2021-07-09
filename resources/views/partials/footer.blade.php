<div class="p-4 flex justify-center items-start max-w-screen-lg m-auto text-white">

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
                    <a href="{{ route('dashboard.favourites') }}" class="text-xs hover:underline">{{ __('Favourites')}}</a>
                </li>
                <li>
                    <a href="{{ route('dashboard.applications') }}" class="text-xs hover:underline">{{ __('Applications')}}</a>
                </li>
            </ul>
        </div>
    </div>
</div>