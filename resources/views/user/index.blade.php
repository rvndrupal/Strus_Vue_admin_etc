@extends('layouts.admin')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __("Listado de Usuarios") }}</h3>
        </div>
        <div class="box-body">
            <div id="usuarios_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="usuarios" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                                <tr>
                                    <th>{{ __("ID") }}</th>
                                    <th>{{ __("RFC") }}</th>
                                    <th>{{ __("Estado") }}</th>
                                    <th width="150">{{ __("Acciones") }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        jQuery(document).ready(function ($) {
            dt = $("#usuarios").DataTable({    //este es el ide de la tabla para que convierta en datatebles
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 75, 100, 250, 500],
                processing: true,
                serverSide: true,
                //stateSave: true, //permanezaca en el cambio
                ajax: '{{ route('user.json') }}',
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                columns: [
                    { data: 'id', visible: false },
                    { data: 'rfc_login' },
                    { data: 'condicion',
                    "render": function (data, type, row) {
                        if (row.condicion == 1) {
                            return "<p class='activo_index'>Activo</p>"
                        }
                        else
                        {
                            return "<p class='desactivado_index'>Desactivado</p>"
                        }
                    }
                 },
                    { data: 'actions' }
                ]
            })
        })
    </script>
@endpush
