@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nuevo Nivel') }}</h3>
        </div>

        <div class="box-body">
            @if($niveles->exists)
                {{ Form::model($niveles, ['url' => route('niveles.update', ['id' => $niveles->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($niveles, ['url' => route('niveles.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nom_niveles') ? ' has-error' : '' }}">
                {{ Form::label('nom_niveles', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nom_niveles', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nom_niveles') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('niveles.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
