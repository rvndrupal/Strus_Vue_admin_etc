@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nuevo Código por Puesto') }}</h3>
        </div>

        <div class="box-body">
            @if($codigos->exists)
                {{ Form::model($codigos, ['url' => route('codigos.update', ['id' => $codigos->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($codigos, ['url' => route('codigos.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nom_codigos') ? ' has-error' : '' }}">
                {{ Form::label('nom_codigos', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nom_codigos', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nom_codigos') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('codigos.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
