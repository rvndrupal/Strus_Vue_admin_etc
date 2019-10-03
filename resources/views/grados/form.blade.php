@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nuevo Grado') }}</h3>
        </div>

        <div class="box-body">
            @if($grados->exists)
                {{ Form::model($grados, ['url' => route('grados.update', ['id' => $grados->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($grados, ['url' => route('grados.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nom_gra') ? ' has-error' : '' }}">
                {{ Form::label('nom_gra', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nom_gra', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nom_gra') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('grados.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
