@extends('adminlte::login')

<div class="container">
    @if(session('message'))
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="alert alert-{{ session('message')[0] }} ma" style="margin: 33px 0 0 169px;">
                <h4 class="alert-heading">{{ __("Mensaje informativo") }}</h4>
                <p>{{ session('message')[1] }}</p>
            </div>
        </div>
    </div>
    @endif

</div>
