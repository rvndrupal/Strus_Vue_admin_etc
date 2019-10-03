@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __('Importar') }}</h3>
        </div>

        <div class="box-body">
           <form action="{{ route('import.direccionesareas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="" accept=".csv">
                <br>
                <button class="btn btn-success">Importar Archivo CSV</button>
            </form>
        </div>

        <div class="box-footer">
            <a href="{{ route('direccionesareas.index') }}" class="btn btn-default">{{ __('Volver') }}</a>
        </div>

    </div>
@stop
