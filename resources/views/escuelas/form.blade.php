@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nueva Institución Educativa') }}</h3>
        </div>

        <div class="box-body">
            @if($escuelas->exists)
                {{ Form::model($escuelas, ['url' => route('escuelas.update', ['id' => $escuelas->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($escuelas, ['url' => route('escuelas.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nombre_escuela') ? ' has-error' : '' }}">
                {{ Form::label('nombre_escuela', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nombre_escuela', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_escuela') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('escuelas.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
