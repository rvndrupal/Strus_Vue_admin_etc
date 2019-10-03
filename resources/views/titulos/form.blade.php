@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nuevo Título') }}</h3>
        </div>

        <div class="box-body">
            @if($titulos->exists)
                {{ Form::model($titulos, ['url' => route('titulos.update', ['id' => $titulos->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($titulos, ['url' => route('titulos.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nombre_titulo') ? ' has-error' : '' }}">
                {{ Form::label('nombre_titulo', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nombre_titulo', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_titulo') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('titulos.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
