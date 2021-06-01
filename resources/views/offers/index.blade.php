@extends('layouts.app')

@section('content')
<div class="p-4 m-auto max-w-screen-lg h-full">
<div class="mb-8 p-4">
    <div class="flex space-x-2 items-center mb-4">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M20.0755 6H23.4615C24.8637 6 26 7.14585 26 8.55996V11.9745C26 13.3886 24.8637 14.5345 23.4615 14.5345H20.0755C18.6732 14.5345 17.537 13.3886 17.537 11.9745V8.55996C17.537 7.14585 18.6732 6 20.0755 6" fill="#111827"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53852 6H11.9245C13.3268 6 14.463 7.14585 14.463 8.55996V11.9745C14.463 13.3886 13.3268 14.5345 11.9245 14.5345H8.53852C7.13626 14.5345 6 13.3886 6 11.9745V8.55996C6 7.14585 7.13626 6 8.53852 6ZM8.53852 17.4655H11.9245C13.3268 17.4655 14.463 18.6114 14.463 20.0255V23.44C14.463 24.8532 13.3268 26 11.9245 26H8.53852C7.13626 26 6 24.8532 6 23.44V20.0255C6 18.6114 7.13626 17.4655 8.53852 17.4655ZM23.4615 17.4655H20.0755C18.6732 17.4655 17.537 18.6114 17.537 20.0255V23.44C17.537 24.8532 18.6732 26 20.0755 26H23.4615C24.8637 26 26 24.8532 26 23.44V20.0255C26 18.6114 24.8637 17.4655 23.4615 17.4655Z" fill="#111827"/>
        </svg>
        <h1 class="text-2xl font-semibold">{{ __('Offers')}}</h1>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum voluptatem, impedit odit rerum, obcaecati velit nesciunt quia aut, aspernatur necessitatibus unde eaque provident at enim assumenda in esse expedita quam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus incidunt cum, consequatur distinctio enim omnis quam. Magnam laudantium, similique voluptatum eligendi cumque eveniet dolorem, dolores dicta nemo excepturi aspernatur a?</p>
</div>
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4">
    {{-- Search --}}
    <div>
        <form class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8" role="form" action="{{ route('offers.index') }}" method="GET">
            {{-- <h1 class="text-lg font-medium">{{ __('Search offers')}}</h1> --}}
            {{-- Inputs --}}
            <div class="flex flex-col space-y-2">
                <div class="flex flex-col space-y-2">
                    <label for="company" class="text-sm font-medium">{{ __('Nazwa firmy')}}</label>
                    <input name="company" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('Nazwa firmy')}}" value="{{ Request::get('company') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="position" class="text-sm font-medium">{{ __('app/offers.position') }}</label>
                    <input name="position" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/offers.position') }}" value="{{ Request::get('position') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="category" class="text-sm font-medium">{{ __('app/offers.category') }}</label>
                    <select name="category" class="border border-gray-200 rounded-lg">
                        @if ( Request::get('category') === null )
                            <option value="" selected></option>
                        @else
                            <option value=""></option>
                        @endif
                        @foreach ($categories as $category)
                            @if ( (int)Request::get('category') === $category->id )
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="city" class="text-sm font-medium">{{ __('app/offers.city') }}</label>
                    <input name="city" type="text" class="border border-gray-200 rounded-lg" placeholder="{{ __('app/offers.city') }}" value="{{ Request::get('city') }}">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="location" class="text-sm font-medium">{{ __('app/offers.location') }}</label>
                    <select name="location" class="border border-gray-200 rounded-lg">
                        @if ( Request::get('location') === null )
                            <option value="" selected></option>
                        @else
                            <option value=""></option>
                        @endif
                        @foreach ($locations as $location)
                            @if ( (int)Request::get('location') === $location->id )
                                <option value="{{ $location->id }}" selected>{{ $location->name }}</option>
                            @else
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="type" class="text-sm font-medium">{{ __('Rodzaj zatrudnienia')}}</label>
                    <select name="type" class="border border-gray-200 rounded-lg">
                        @if ( Request::get('type') === null )
                            <option value="" selected></option>
                        @else
                            <option value=""></option>
                        @endif
                        @foreach ($types as $type)
                            @if ( (int)Request::get('type') === $type->id )
                                <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                            @else
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="salary" class="text-sm font-medium">{{ __('app/offers.salary') }}</label>
                    <select name="salary" class="border border-gray-200 rounded-lg">
                        @if ( Request::get('salary') === null )
                            <option value="0" selected>{{ __('app/offers.salary-all') }}</option>
                        @else
                            <option value="0">{{ __('app/offers.salary-all') }}</option>
                        @endif
                        @if ( (int)Request::get('salary') === 1 )
                            <option value="1" selected>{{ __('app/offers.salary-paid') }}</option>
                        @else
                            <option value="1">{{ __('app/offers.salary-paid') }}</option>
                        @endif
                    </select>
                </div>
            </div>
            {{-- Submit --}}
            <input type="submit" class="px-8 py-2 whitespace-nowrap text-sm font-medium text-white bg-blue-600 rounded-lg flex justify-center cursor-pointer w-full" value="{{ __('app/offers.search') }}">
        </form>
    </div>
    {{-- Results --}}
    <div class="w-full flex flex-col space-y-4">
        @foreach ($offers as $offer)
        <a href="{{ route('offers.show', $offer) }}" class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
            <div class="flex space-x-4 items-center">
                <img src="{{ asset($offer->company->image) }}" alt="" class="w-16 h-16">
                <div>
                    <p class="font-semibold">{{ $offer->position }}</p>
                    <p class="text-sm">{{ $offer->category->name }}</p>
                </div>
            </div>
            <div>
                <p class="font-semibold text-right">{{ $offer->salary }} PLN</p>
                <p class="text-right text-sm">{{ $offer->city }}<span class="hidden md:inline">, {{ $offer->location->name }}</span></p>
            </div>
        </a>
        @endforeach
        {{ $offers->links() }}
    </div>
</div>
</div>
@endsection