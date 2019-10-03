@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nueva Dirección por Área') }}</h3>
        </div>

        <div class="box-body">
            @if($direccionesareas->exists)
                {{ Form::model($direccionesareas, ['url' => route('direccionesareas.update', ['id' => $direccionesareas->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($direccionesareas, ['url' => route('direccionesareas.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nombre_dir_are') ? ' has-error' : '' }}">
                {{ Form::label('nombre_dir_are', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nombre_dir_are', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_dir_are') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('direccionesareas.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
