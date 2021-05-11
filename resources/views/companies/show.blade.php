@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.companies'])
{{-- Content --}}
<p>Profil firmy</p>

@endsection