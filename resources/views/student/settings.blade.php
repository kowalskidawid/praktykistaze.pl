@extends('layouts.app')

@section('content')

{{-- Profile settings --}}
<div class="p-4 pb-0">
    <h1 class="font-bold text-2xl">Ustawienia profilu</h1>
</div>
<div class="p-4">
    <form class="flex flex-col space-y-4" id="profileForm" role="form" action="{{ route('student.profile') }}" method="POST">
        @csrf
        <div class="flex flex-col space-y-2">
            <label for="first_name" class="text-sm font-medium">Imię</label>
            <input name="first_name" type="text" class="border border-gray-200 rounded-lg bg-gray-100" placeholder="Imię" value="{{ Auth::user()->student->first_name }}">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="last_name" class="text-sm font-medium">Nazwisko</label>
            <input name="last_name" type="text" class="border border-gray-200 rounded-lg bg-gray-100" placeholder="Nazwisko" value="{{ Auth::user()->student->last_name }}">
        </div>
        <div class="py-4">
            <input type="submit" class="px-4 py-2 w-full whitespace-nowrap font-medium text-white bg-indigo-600 rounded-lg flex justify-center" value="Zapisz">
        </div>
    </form>
</div>
{{-- Account settings --}}
<div class="p-4 pb-0">
    <h1 class="font-bold text-2xl">Ustawienia konta</h1>
</div>

@endsection