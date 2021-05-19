@extends('layouts.app')

@section('content')
{{-- Breadcrumbs --}}
<div class="mb-4 flex justify-between items-center">
    <a href="{{ route('offers.index') }}" class="flex space-x-2 items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.91988 2H16.0899C19.6199 2 21.9999 4.271 21.9999 7.66V16.33C21.9999 19.72 19.6199 22 16.0899 22H7.91988C4.37988 22 1.99988 19.72 1.99988 16.33V7.66C1.99988 4.271 4.37988 2 7.91988 2ZM9.72988 12.75H16.0799C16.4999 12.75 16.8299 12.41 16.8299 12C16.8299 11.58 16.4999 11.25 16.0799 11.25H9.72988L12.2099 8.78C12.3499 8.64 12.4299 8.44 12.4299 8.25C12.4299 8.061 12.3499 7.87 12.2099 7.72C11.9199 7.43 11.4399 7.43 11.1499 7.72L7.37988 11.47C7.09988 11.75 7.09988 12.25 7.37988 12.53L11.1499 16.28C11.4399 16.57 11.9199 16.57 12.2099 16.28C12.4999 15.98 12.4999 15.51 12.2099 15.21L9.72988 12.75Z" fill="#130F26"/>
        </svg>
        <span class="text-sm font-medium">{{ __('Back to offers')}}</span>
    </a>
    @if (Auth::user() && Auth::user()->roleCheck('student'))
        @if ($offer->isFavourite(Auth::user()))
        <form action="{{ route('offers.unfavourite', [$offer->id]) }}" method="POST">
            @csrf
            <button type="submit" class="flex justify-center items-center bg-white rounded h-full px-2 py-1 border border-gray-200 space-x-2">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.284 13.7572C6.9008 14.2636 7.484 14.7396 8 15.1972L8.0008 15.2036C8.5168 14.7428 9.0992 14.2668 9.7168 13.7636L9.7248 13.7572C11.8968 11.9844 14.3576 9.97565 15.4448 7.56765C15.8025 6.79981 15.9918 5.96431 16 5.11726C16.0024 3.95685 15.537 2.84445 14.7089 2.03148C13.8809 1.21851 12.7602 0.773583 11.6 0.797267C10.6557 0.798642 9.73179 1.07163 8.9384 1.58367C8.59044 1.81143 8.27479 2.0851 8 2.39726C7.72674 2.08387 7.41118 1.81004 7.0624 1.58367C6.26867 1.07173 5.34451 0.798759 4.40001 0.797267C3.23984 0.773583 2.11909 1.21851 1.29106 2.03148C0.463034 2.84445 -0.0023763 3.95685 9.12476e-06 5.11726C0.00874142 5.96296 0.198032 6.79703 0.555217 7.56365C1.64013 9.96659 4.09369 11.9728 6.26233 13.7461L6.276 13.7572H6.284Z" fill="#EF4444"/>
                </svg>
                <span class="text-sm font-medium">{{ __('Unfavourite')}}</span>
            </button>
        </form>
        @else
        <form action="{{ route('offers.favourite', [$offer->id]) }}" method="POST">
            @csrf
            <button type="submit" class="flex justify-center items-center bg-white rounded h-full px-2 py-1 border border-gray-200 space-x-2">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.41564 13.8653C6.98377 14.3315 7.52085 14.7723 8 15.1972L8.0008 15.2036C8.5168 14.7428 9.0992 14.2668 9.7168 13.7636L9.7248 13.7572C11.8968 11.9844 14.3576 9.97565 15.4448 7.56765C15.8025 6.79981 15.9918 5.96431 16 5.11726C16.0024 3.95685 15.537 2.84445 14.7089 2.03148C13.8809 1.21851 12.7602 0.773583 11.6 0.797267C10.6557 0.798642 9.73179 1.07163 8.9384 1.58367C8.59044 1.81143 8.27479 2.0851 8 2.39726C7.72674 2.08387 7.41118 1.81004 7.0624 1.58367C6.26867 1.07173 5.34451 0.798759 4.40001 0.797267C3.23984 0.773583 2.11909 1.21851 1.29106 2.03148C0.463034 2.84445 -0.0023763 3.95685 9.12476e-06 5.11726C0.00874142 5.96296 0.198032 6.79703 0.555217 7.56365C1.64013 9.96659 4.09369 11.9728 6.26233 13.7461L6.276 13.7572H6.284C6.32806 13.7934 6.37194 13.8294 6.41564 13.8653ZM2.40001 3.19086C2.93607 2.67314 3.65482 2.38794 4.40001 2.39726C5.31047 2.38953 6.18086 2.77116 6.792 3.44606L8 4.83806L9.208 3.44606C9.81914 2.77116 10.6895 2.38953 11.6 2.39726C12.3461 2.38965 13.065 2.6772 13.6 3.19726C14.1148 3.70309 14.4033 4.39553 14.4 5.11726C14.392 5.74006 14.2504 6.35389 13.9848 6.91725C13.4717 7.95606 12.7792 8.8961 11.9392 9.69405C11.1464 10.498 10.2336 11.2716 9.4448 11.9228C9.2264 12.1028 9.004 12.2844 8.7792 12.4676L8.64 12.582L8 13.0932C7.7864 12.9156 7.5656 12.7348 7.352 12.5604L7.212 12.446C6.9896 12.2644 6.7672 12.0828 6.5488 11.9028C5.76001 11.2516 4.84801 10.4772 4.05521 9.67725C3.2153 8.87889 2.52282 7.93862 2.00961 6.89965C1.74868 6.34114 1.60908 5.73366 1.59995 5.11726C1.59486 4.3933 1.88352 3.69819 2.40001 3.19086Z" fill="#111827"/>
                </svg>
                <span class="text-sm font-medium">{{ __('Favourite')}}</span>
            </button>
        </form>
        @endif
    @endif
</div>
{{-- Main --}}
<div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-8">
    {{-- Aside --}}
    <div class="flex flex-col space-y-4 w-80">
        @if (Auth::user() && Auth::user()->roleCheck('student'))
            @if(!$offer->isApplied(Auth::user()))
            <form action="{{ route('offers.apply', $offer) }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-sm font-medium px-4 py-2 rounded border border-blue-600 bg-blue-600 text-white text-center">{{ __('Apply')}}</button>
            </form>
            @else
            <div class="text-sm font-medium px-4 py-2 rounded border text-center bg-white border-gray-300 text-gray-900">{{ __('Your application was send')}}</div>
            @endif
        @endif
        <a href="{{ route('companies.show', $offer->company) }}" class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8">
            <div class="flex space-x-4 items-center">
                <div class="w-12 h-12 bg-gray-400 rounded-lg flex-shrink-0"></div>
                <div>
                    <h1 class="whitespace-nowrap font-semibold">{{ $offer->company->company_name }}</h1>
                    <p class="text-sm">{{ __('Company category')}}</p>
                </div>
            </div>
        </a>
        <div class="p-4 bg-white border border-gray-200 rounded-lg flex flex-col space-y-8">
        {{ __('Offer details')}}
        </div>
    </div>
    {{-- Content --}}
    <div class="w-full flex flex-col space-y-4">
        @if(!$offer->isActive())
        <p>{{ __('Oferta archiwalna')}}</p>
        @endif
        {{-- Image --}}
        <div class="w-full h-48 bg-gray-400 rounded-lg"></div>
        <h1 class="text-2xl font-semibold">{{ $offer->position }}</h1>
        <p>{{ $offer->description }}</p>
    </div>
</div>
@endsection