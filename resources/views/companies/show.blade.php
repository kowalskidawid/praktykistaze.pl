@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'companies.title'])
{{-- Content --}}
<p>Profil firmy</p>

@endsection