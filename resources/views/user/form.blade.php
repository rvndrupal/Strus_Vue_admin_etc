@extends('layouts.admin')

@permission('read-user')
@section('content')


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ __('Formulario de Usuarios') }}</h3>
            </div>

            <div class="box-body">
                @if($user->exists)
                    {{ Form::model($user, ['url' => route('user.update', ['id' => $user->id]), 'method' => 'post']) }}
                @else
                    {{ Form::model($user, ['url' => route('user.store')]) }}
                @endif

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', __('Nombre'), ['class' => 'control-label']) }}
                    {{ Form::text('name', null, ['class' => ['form-control'], 'id' => 'name']) }}
                    @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('rfc_login') ? ' has-error' : '' }}">
                    {{ Form::label('rfc_login', __('RFC'), ['class' => 'control-label']) }}
                    {{ Form::text('rfc_login', null, ['class' => ['form-control'], 'id' => 'rfc_login']) }}
                    @if($errors->has('rfc_login'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rfc_login') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {{ Form::label('password', __('Password'), ['class' => 'control-label']) }}
                    {{ Form::text('password', null, ['class' => ['form-control'], 'id' => 'email']) }}
                    @if($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <h3>Lista de roles</h3><hr>

                <div class="form-group">
                    <ul class="list-unstyled">

                        @foreach ($roles as $role )
                        <li>
                        @if($role->name === "superadministrator")
                            @permission('read-superadmin')
                                <label>
                                {{   Form::checkbox('roles[]', $role->id, null) }}
                                {{ $role->name }}
                                <em>( {{ $role->description ?: 'N/A' }})</em>
                                </label>
                                @endpermission
                        @else
                            <label>
                            {{   Form::checkbox('roles[]', $role->id, null) }}
                            {{ $role->name }}
                            <em>( {{ $role->description ?: 'N/A' }})</em>
                            </label>
                        @endif



                        </li>

                        @endforeach


                    </ul>
                </div>



            </div>

            <div class="box-footer">
                <a href="{{ route('user.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
                {{ Form::submit($title, ['class' => 'btn btn-info pull-right']) }}
                {{ Form::close() }}
            </div>

        </div>


@stop
@endpermission



<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

