@extends('layouts.app')

@section('content')

{{-- Header: Pass a lang file as $title --}}
@include('partials.header', ['title' => 'layout/header.students'])
{{-- Content --}}
<p>Lista studentów</p>

@endsection