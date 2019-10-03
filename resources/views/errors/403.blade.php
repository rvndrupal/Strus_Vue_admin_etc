@extends('errors::layout')

@section('title', '403')
@section('message')

<h2>No cuenta con los Permisos Necesarios.</h2>
<hr>
<a href="{{ route('home') }}" class="btn btn-danger btn-sm">

    <img src="{{ asset('img/403.png') }}"

</a>
@endsection


