@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Nuevo Estado Civil') }}</h3>
        </div>

        <div class="box-body">
            @if($estadocivil->exists)
                {{ Form::model($estadocivil, ['url' => route('estadocivil.update', ['id' => $estadocivil->id]), 'method' => 'POST']) }}
            @else
                {{ Form::model($estadocivil, ['url' => route('estadocivil.store')]) }}
            @endif

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                {{ Form::label('nombre', __('Nombre'), ['class' => 'control-label']) }}
                {{ Form::text('nombre', null, ['class' => ['form-control'], 'id' => 'name']) }}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="box-footer">
            <a href="{{ route('estadocivil.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
            {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
            {{ Form::close() }}
        </div>

    </div>
@stop
