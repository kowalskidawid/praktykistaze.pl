@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'students.title'])
{{-- Content --}}
<p>Profil studenta</p>

@endsection