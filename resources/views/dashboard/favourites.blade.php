@extends('layouts.dashboard')

@section('main')
<div class="flex flex-col space-y-2">
    <div class="border-b border-gray-200 py-2">
        <h1 class="text-xl font-semibold">{{ __('Favourite offers')}}</h1>
    </div>
    <div class="py-4 flex flex-col space-y-4">
        @foreach ($favourites as $favourite)
        <div class="p-4 bg-white border-gray-200 border rounded-lg flex items-center justify-between transition hover:shadow-lg">
            <div class="flex space-x-4 items-center">
                <div>
                    <a href="{{ route('offers.show', $favourite) }}" class="font-semibold hover:underline">{{ $favourite->position }}</a>
                    <p class="text-sm">{{ $favourite->pivot->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div>
                <form action="{{ route('offers.unfavourite', [$favourite->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="flex justify-center items-center bg-white rounded h-full px-2 py-1 border border-gray-200 space-x-2">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.284 13.7572C6.9008 14.2636 7.484 14.7396 8 15.1972L8.0008 15.2036C8.5168 14.7428 9.0992 14.2668 9.7168 13.7636L9.7248 13.7572C11.8968 11.9844 14.3576 9.97565 15.4448 7.56765C15.8025 6.79981 15.9918 5.96431 16 5.11726C16.0024 3.95685 15.537 2.84445 14.7089 2.03148C13.8809 1.21851 12.7602 0.773583 11.6 0.797267C10.6557 0.798642 9.73179 1.07163 8.9384 1.58367C8.59044 1.81143 8.27479 2.0851 8 2.39726C7.72674 2.08387 7.41118 1.81004 7.0624 1.58367C6.26867 1.07173 5.34451 0.798759 4.40001 0.797267C3.23984 0.773583 2.11909 1.21851 1.29106 2.03148C0.463034 2.84445 -0.0023763 3.95685 9.12476e-06 5.11726C0.00874142 5.96296 0.198032 6.79703 0.555217 7.56365C1.64013 9.96659 4.09369 11.9728 6.26233 13.7461L6.276 13.7572H6.284Z" fill="#EF4444"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection