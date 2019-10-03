@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nueva Carrera') }}</h3>
        </div>

        <div class="box-body">
            @if($carreras->exists)
                {{ Form::model($carreras, ['url' => route('carreras.update', ['id' => $carreras->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($carreras, ['url' => route('carreras.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nom_car') ? ' has-error' : '' }}">
                {{ Form::label('nom_car', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nom_car', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nom_car') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('carreras.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
