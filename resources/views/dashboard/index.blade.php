@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'dashboard.title'])
{{-- Content --}}
<p>Dashboard content</p>

@endsection