@extends('layouts.app')

@section('content')
<div class="mb-8 p-4">
    <div class="flex space-x-2 items-center mb-4">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.9491 18.5399C12.4991 18.5399 9.58813 19.1037 9.58813 21.2794C9.58813 23.4561 12.5179 24 15.9491 24C19.3991 24 22.31 23.4363 22.31 21.2605C22.31 19.0839 19.3803 18.5399 15.9491 18.5399" fill="#111827"/>
            <path opacity="0.4" d="M15.949 16.467C18.2851 16.467 20.1583 14.5831 20.1583 12.2335C20.1583 9.88306 18.2851 8 15.949 8C13.6129 8 11.7397 9.88306 11.7397 12.2335C11.7397 14.5831 13.6129 16.467 15.949 16.467" fill="#111827"/>
            <path opacity="0.4" d="M25.0879 13.2193C25.6923 10.8418 23.9203 8.70657 21.6639 8.70657C21.4186 8.70657 21.184 8.73359 20.9548 8.77952C20.9243 8.78672 20.8903 8.80203 20.8724 8.82905C20.8518 8.86327 20.867 8.9092 20.8894 8.93892C21.5672 9.89531 21.9567 11.0597 21.9567 12.3097C21.9567 13.5074 21.5995 14.6241 20.9727 15.5508C20.9082 15.6463 20.9655 15.775 21.0792 15.7949C21.2368 15.8228 21.398 15.8372 21.5627 15.8417C23.2058 15.8849 24.6805 14.8213 25.0879 13.2193" fill="#111827"/>
            <path d="M26.8093 18.8169C26.5084 18.1721 25.7823 17.73 24.6782 17.5129C24.1571 17.3851 22.7468 17.2049 21.4351 17.2293C21.4154 17.232 21.4046 17.2455 21.4028 17.2545C21.4002 17.2671 21.4055 17.2887 21.4315 17.3022C22.0377 17.6039 24.381 18.916 24.0864 21.6834C24.0738 21.8032 24.1696 21.9068 24.2887 21.8887C24.8654 21.8059 26.349 21.4853 26.8093 20.4866C27.0636 19.9588 27.0636 19.3456 26.8093 18.8169" fill="#111827"/>
            <path opacity="0.4" d="M11.0448 8.77979C10.8165 8.73296 10.581 8.70685 10.3357 8.70685C8.07926 8.70685 6.30726 10.8421 6.91255 13.2195C7.31906 14.8216 8.79379 15.8852 10.4369 15.842C10.6016 15.8375 10.7637 15.8221 10.9204 15.7951C11.0341 15.7753 11.0914 15.6465 11.0269 15.5511C10.4001 14.6235 10.0429 13.5077 10.0429 12.31C10.0429 11.0591 10.4333 9.89468 11.1111 8.93919C11.1326 8.90947 11.1487 8.86354 11.1272 8.82932C11.1093 8.80141 11.0762 8.787 11.0448 8.77979" fill="#111827"/>
            <path d="M7.32156 17.5127C6.21752 17.7297 5.49225 18.1719 5.19139 18.8167C4.9362 19.3453 4.9362 19.9586 5.19139 20.4872C5.65163 21.485 7.13531 21.8065 7.71195 21.8885C7.83104 21.9065 7.92595 21.8038 7.91342 21.6831C7.61883 18.9166 9.9621 17.6045 10.5692 17.3028C10.5943 17.2884 10.5996 17.2677 10.5969 17.2542C10.5951 17.2452 10.5853 17.2317 10.5656 17.2299C9.25294 17.2047 7.84358 17.3848 7.32156 17.5127" fill="#111827"/>
        </svg>
        <h1 class="text-2xl font-semibold">Companies</h1>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum voluptatem, impedit odit rerum, obcaecati velit nesciunt quia aut, aspernatur necessitatibus unde eaque provident at enim assumenda in esse expedita quam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus incidunt cum, consequatur distinctio enim omnis quam. Magnam laudantium, similique voluptatum eligendi cumque eveniet dolorem, dolores dicta nemo excepturi aspernatur a?</p>
</div>
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
    {{-- Search --}}
    <div>
        <form class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8" role="form" action="{{ route('companies.index') }}" method="GET">
            {{-- <h1 class="text-lg font-medium">Search offers</h1> --}}
            {{-- Inputs --}}
            <div class="flex flex-col space-y-2">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-sm font-medium">{{ __('app/companies.name') }}</label>
                    <input name="name" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/companies.name') }}" value="{{ Request::get('position') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="city" class="text-sm font-medium">{{ __('app/companies.city') }}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/companies.city') }}" value="{{ Request::get('city') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="location" class="text-sm font-medium">{{ __('app/companies.location') }}</label>
                    <select name="location" class="border border-gray-200 rounded-lg">
                        @if ( Request::get('location') === null )
                            <option value="" selected></option>
                        @else
                            <option value=""></option>
                        @endif
                        @foreach ($locations as $location)
                            @if ( (int)Request::get('location') === $location->id )
                                <option value="{{ $location->id }}" selected>{{ $location->name }}  ({{ $location->companies()->count() }})</option>
                            @else
                                <option value="{{ $location->id }}">{{ $location->name }}  ({{ $location->companies()->count() }})</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Submit --}}
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-900 rounded-lg flex justify-center cursor-pointer w-full" value="{{ __('app/offers.search') }}">
        </form>
    </div>
    {{-- Results --}}
    <div class="w-full flex flex-col space-y-4">
        @foreach ($companies as $company)
        <a href="{{ route('companies.show', $company) }}" class="p-4 bg-white border border-gray-200 rounded-lg flex items-center justify-between transition hover:shadow">
            <div class="flex space-x-4 items-center">
                <div class="w-16 h-16 rounded-xl bg-gray-200 flex-shrink-0"></div>
                <div>
                    <p class="font-semibold">{{ $company->company_name }}</p>
                    <p class="text-sm">Company category</p>
                </div>
            </div>
            <div>
                <p class="font-semibold text-right">{{ $company->size->name }}</p>
                <p class="text-right text-sm">{{ $company->city }}<span class="hidden md:inline">, {{ $company->location->name }}</span></p>
            </div>
        </a>
        @endforeach
        {{ $companies->links() }}
    </div>
</div>
@endsection