@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.offers'])
{{-- Content --}}
<p>Lista ofert</p>

@endsection