@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.offers'])
{{-- Content --}}
<div class="p-4 flex space-x-8 max-w-screen-xl m-auto">
    <div class="w-full">
        {{-- Image --}}
        <div class="w-full h-80 bg-gray-800 rounded-2xl"></div>
        {{-- Title --}}
        <div class="my-8 flex flex-col ">
            <div class="mb-2 text-xs text-white font-medium bg-blue-500 px-2 py-1 rounded w-min whitespace-nowrap">{{ $offer->category->name }}</div>
            <h1 class="text-4xl font-semibold">{{ $offer->position }}</h1>
        </div>
        {{-- Decription --}}
        <p>{{ $offer->description }}</p>
    </div>
    <div class="flex flex-col space-y-4">
        {{-- Actions --}}
        <div class="flex flex-col space-y-4">
            @if (Auth::user())
                @if (Auth::user()->roleCheck('student'))
                    {{-- Favourites --}}
                    @if ($offer->isFavourite(Auth::user()))
                    <form action="{{ route('offers.unfavourite', [$offer->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 w-full h-10 flex justify-center space-x-2 items-center rounded bg-white border border-gray-300">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.284 13.7572C6.9008 14.2636 7.484 14.7396 8 15.1972L8.0008 15.2036C8.5168 14.7428 9.0992 14.2668 9.7168 13.7636L9.7248 13.7572C11.8968 11.9844 14.3576 9.97565 15.4448 7.56766C15.8025 6.79981 15.9918 5.96431 16 5.11726C16.0024 3.95685 15.537 2.84445 14.7089 2.03148C13.8809 1.21851 12.7602 0.773587 11.6 0.797271C10.6557 0.798646 9.73179 1.07163 8.9384 1.58367C8.59044 1.81143 8.27479 2.0851 8 2.39727C7.72674 2.08387 7.41118 1.81004 7.0624 1.58367C6.26867 1.07174 5.34451 0.798763 4.40001 0.797271C3.23984 0.773587 2.11909 1.21851 1.29106 2.03148C0.463034 2.84445 -0.0023763 3.95685 9.12476e-06 5.11726C0.00874142 5.96296 0.198032 6.79704 0.555217 7.56366C1.64013 9.9666 4.09369 11.9728 6.26233 13.7461L6.276 13.7572H6.284Z" fill="#DB2777"/>
                            </svg>
                            <span class="text-sm font-medium">Remove from favourites</span>
                        </button>
                    </form>
                    @else
                    <form action="{{ route('offers.favourite', [$offer->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 w-full h-10 flex justify-center space-x-2 items-center rounded bg-white border border-gray-300 transition hover:bg-pink-200 hover:border-pink-300">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15.1972C7.484 14.7396 6.9008 14.2636 6.284 13.7572H6.276C4.10401 11.9812 1.64241 9.97163 0.555217 7.56364C0.198032 6.79702 0.00874142 5.96294 9.12476e-06 5.11725C-0.0023763 3.95684 0.463034 2.84444 1.29106 2.03147C2.11909 1.21849 3.23984 0.773571 4.40001 0.797256C5.34451 0.798747 6.26867 1.07172 7.0624 1.58365C7.41118 1.81003 7.72674 2.08386 8 2.39725C8.27479 2.08509 8.59044 1.81142 8.9384 1.58365C9.73178 1.07162 10.6557 0.79863 11.6 0.797256C12.7602 0.773571 13.8809 1.21849 14.7089 2.03147C15.537 2.84444 16.0024 3.95684 16 5.11725C15.9918 5.9643 15.8025 6.7998 15.4448 7.56764C14.3576 9.97563 11.8968 11.9844 9.7248 13.7572L9.7168 13.7636C9.0992 14.2668 8.5168 14.7428 8.0008 15.2036L8 15.1972ZM4.40001 2.39725C3.65482 2.38793 2.93607 2.67313 2.40001 3.19085C1.88352 3.69818 1.59486 4.39328 1.59995 5.11725C1.60908 5.73364 1.74868 6.34112 2.00961 6.89964C2.52282 7.9386 3.2153 8.87888 4.05521 9.67724C4.84801 10.4772 5.76 11.2516 6.5488 11.9028C6.7672 12.0828 6.9896 12.2644 7.212 12.446L7.352 12.5604C7.5656 12.7348 7.7864 12.9156 8 13.0932L8.0104 13.0836L8.0152 13.0796H8.02L8.0272 13.074H8.0312H8.0352L8.0496 13.062L8.0824 13.0356L8.088 13.0308L8.0968 13.0244H8.1016L8.1088 13.018L8.64 12.582L8.7792 12.4676C9.004 12.2844 9.2264 12.1028 9.4448 11.9228C10.2336 11.2716 11.1464 10.498 11.9392 9.69404C12.7792 8.89608 13.4717 7.95605 13.9848 6.91724C14.2504 6.35388 14.392 5.74005 14.4 5.11725C14.4033 4.39552 14.1148 3.70308 13.6 3.19725C13.065 2.67719 12.3461 2.38964 11.6 2.39725C10.6895 2.38951 9.81915 2.77115 9.208 3.44605L8 4.83805L6.792 3.44605C6.18085 2.77115 5.31047 2.38951 4.40001 2.39725Z" fill="#111827"/>
                            </svg>
                            <span class="text-sm font-medium">Add to favourites</span>
                        </button>
                    </form>
                    @endif
                    {{-- Applications --}}
                    @if ($offer->isApplied(Auth::user()))
                    <div type="submit" class="h-10 px-4 flex justify-center items-center rounded-lg bg-white border border-gray-200">Application sent!</div>
                    @else
                    <form action="{{ route('offers.apply', [$offer->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="h-10 px-4 w-full flex justify-center items-center rounded-lg bg-blue-500 border border-gray-200">Apply</button>
                    </form>
                    @endif
                @elseif (Auth::user()->roleCheck('company'))
                    @if($offer->company->id === Auth::user()->company->id)
                    {{-- <a href="{{ route('company.offers.edit', [$offer->id]) }}" class="h-10 px-4 flex justify-center font-semibold items-center rounded-lg bg-white border border-gray-200">
                        Edytuj
                    </a> --}}
                    @endif
                @endif
            @endif
        </div>
        {{-- Offer details --}}
        <div class="bg-gray-100 rounded-2xl border border-gray-200 p-4 flex flex-col space-y-4">
            Offer details TODO
        </div>
        {{-- Company details --}}
        <a href="{{ route('companies.show', [$offer->company]) }}" class="bg-gray-100 rounded-2xl border border-gray-200 p-4 flex flex-col space-y-4">
            <div class="flex w-full justify-between items-center">
                <div>
                    <p class="text-lg font-semibold">{{ $offer->company->company_name }}</p>
                    <p class="text-sm">{{ $offer->company->city }}</p>
                </div>
                <div class="rounded-lg w-16 h-16 bg-gray-200" style="background: url({{ $offer->company->image }}); background-size: cover; background-repeat: no-repeat;"></div>
            </div>
            <div>
                <p class="text-lg font-semibold">{{ $offer->company->size->size }}+</p>
                <p class="text-sm">{{ $offer->company->size->name }}</p>
            </div>
            <div>
                <p class="text-lg font-semibold">{{ $offer->company->email }}</p>
                <p class="text-sm">Email kontaktowy</p>
            </div>
            <div>
                <p class="text-lg font-semibold">{{ $offer->company->phone }}</p>
                <p class="text-sm">Numer telefonu</p>
            </div>
            <div>
                <p class="text-lg font-semibold">{{ $offer->company->website }}</p>
                <p class="text-sm">Strona internetowa</p>
            </div>
        </a>
    </div>
</div>

@endsection