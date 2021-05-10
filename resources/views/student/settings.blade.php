@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'student.title'])
{{-- Content --}}
<p>Twoje konto jest zweryfikowane</p>

@endsection