@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nuevo Idioma') }}</h3>
        </div>

        <div class="box-body">
            @if($idiomas->exists)
                {{ Form::model($idiomas, ['url' => route('idiomas.update', ['id' => $idiomas->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($idiomas, ['url' => route('idiomas.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nombre_idioma') ? ' has-error' : '' }}">
                {{ Form::label('nombre_idioma', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nombre_idioma', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_idioma') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('idiomas.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
