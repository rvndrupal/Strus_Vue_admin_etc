@extends('errors::layout')

@section('title', '404')
@section('message')

Página no encontrada
<hr>
<a href="{{ route('home') }}" class="btn btn-danger btn-sm">

    <img src="{{ asset('img/error_404.png') }}"

</a>
@endsection


