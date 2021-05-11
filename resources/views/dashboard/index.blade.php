@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.dashboard'])
{{-- Content --}}
<p>Dashboard content</p>

@endsection