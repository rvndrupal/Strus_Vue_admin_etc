@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nueva Dirección General') }}</h3>
        </div>

        <div class="box-body">
            @if($direccionesgenerales->exists)
                {{ Form::model($direccionesgenerales, ['url' => route('direccionesgenerales.update', ['id' => $direccionesgenerales->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($direccionesgenerales, ['url' => route('direccionesgenerales.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nombre_dir_gen') ? ' has-error' : '' }}">
                {{ Form::label('nombre_dir_gen', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nombre_dir_gen', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_dir_gen') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('direccionesgenerales.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
