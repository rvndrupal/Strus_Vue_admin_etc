@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nuevo Pais') }}</h3>
        </div>

        <div class="box-body">
            @if($paises->exists)
                {{ Form::model($paises, ['url' => route('paises.update', ['id' => $paises->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($paises, ['url' => route('paises.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nombre_pais') ? ' has-error' : '' }}">
                {{ Form::label('nombre_pais', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nombre_pais', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_pais') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('paises.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
