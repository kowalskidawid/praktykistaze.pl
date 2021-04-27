@extends('layouts.app')

@section('content')

{{-- Image --}}
<div class="bg-gray-200 p-4 w-full h-64 flex items-end" style="background: url({{ asset('images/offer.jpg') }}); background-size: cover; background-repeat: no-repeat;">
    <div class="w-full flex justify-between">
        <a href="{{ url()->previous() }}" class="w-10 h-10 flex justify-center items-center rounded-lg bg-white shadow-md">
            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.83 5L7.41 1.41L6 0L0 6L6 12L7.41 10.59L3.83 7H16V5H3.83Z" fill="#111827"/>
            </svg>
        </a>
        <a href="" class="w-10 h-10 flex justify-center items-center rounded-lg bg-white shadow-md">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 15.1972C7.484 14.7396 6.9008 14.2636 6.284 13.7572H6.276C4.10401 11.9812 1.64241 9.97163 0.555217 7.56364C0.198032 6.79702 0.00874142 5.96294 9.12476e-06 5.11725C-0.0023763 3.95684 0.463034 2.84444 1.29106 2.03147C2.11909 1.21849 3.23984 0.773571 4.40001 0.797256C5.34451 0.798747 6.26867 1.07172 7.0624 1.58365C7.41118 1.81003 7.72674 2.08386 8 2.39725C8.27479 2.08509 8.59044 1.81142 8.9384 1.58365C9.73178 1.07162 10.6557 0.79863 11.6 0.797256C12.7602 0.773571 13.8809 1.21849 14.7089 2.03147C15.537 2.84444 16.0024 3.95684 16 5.11725C15.9918 5.9643 15.8025 6.7998 15.4448 7.56764C14.3576 9.97563 11.8968 11.9844 9.7248 13.7572L9.7168 13.7636C9.0992 14.2668 8.5168 14.7428 8.0008 15.2036L8 15.1972ZM4.40001 2.39725C3.65482 2.38793 2.93607 2.67313 2.40001 3.19085C1.88352 3.69818 1.59486 4.39328 1.59995 5.11725C1.60908 5.73364 1.74868 6.34112 2.00961 6.89964C2.52282 7.9386 3.2153 8.87888 4.05521 9.67724C4.84801 10.4772 5.76 11.2516 6.5488 11.9028C6.7672 12.0828 6.9896 12.2644 7.212 12.446L7.352 12.5604C7.5656 12.7348 7.7864 12.9156 8 13.0932L8.0104 13.0836L8.0152 13.0796H8.02L8.0272 13.074H8.0312H8.0352L8.0496 13.062L8.0824 13.0356L8.088 13.0308L8.0968 13.0244H8.1016L8.1088 13.018L8.64 12.582L8.7792 12.4676C9.004 12.2844 9.2264 12.1028 9.4448 11.9228C10.2336 11.2716 11.1464 10.498 11.9392 9.69404C12.7792 8.89608 13.4717 7.95605 13.9848 6.91724C14.2504 6.35388 14.392 5.74005 14.4 5.11725C14.4033 4.39552 14.1148 3.70308 13.6 3.19725C13.065 2.67719 12.3461 2.38964 11.6 2.39725C10.6895 2.38951 9.81915 2.77115 9.208 3.44605L8 4.83805L6.792 3.44605C6.18085 2.77115 5.31047 2.38951 4.40001 2.39725Z" fill="#111827"/>
            </svg>
        </a>
    </div>
</div>
{{-- Header --}}
<div class="p-4 border-b border-gray-200">
    <p class="text-sm font-semibold text-indigo-700">{{ $offer->category->name }}</p>
    <h1 class="text-2xl font-bold">{{ $offer->position }}</h1>
    <ul class="mt-2 flex space-x-4 text-xs text-gray-700">
        <li>
            <span>2 days ago</span>
        </li>
        <li>
            <span>28 days left</span>
        </li>
        <li>
            <span>6 applications</span>
        </li>
    </ul>
</div>
{{-- Offer details --}}
<div class="p-4 pb-0 grid grid-cols-2 border-b border-gray-200">
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">1750 pln</p>
            <p class="text-xs">Staż</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">1750 pln</p>
            <p class="text-xs">Staż</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">1750 pln</p>
            <p class="text-xs">Staż</p>
        </div>
    </div>
    <div class="flex space-x-4 items-center pr-8 pb-4">
        <div class="w-10 h-10 flex justify-center items-center rounded-lg bg-indigo-500"></div>
        <div>
            <p class="text-sm font-semibold">1750 pln</p>
            <p class="text-xs">Staż</p>
        </div>
    </div>
</div>
{{-- Description --}}
<div class="p-4">
    <p>{{ $offer->description }}</p>
</div>
{{-- Buttons --}}
<div class="p-4">
    <button class="px-4 py-2 w-full whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center">Aplikuj</button>
</div>
{{-- Company details --}}
<div class="p-4">
    <a href="" class="bg-white rounded-xl border border-gray-200 shadow-lg p-4 flex flex-col space-y-4">
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

@endsection