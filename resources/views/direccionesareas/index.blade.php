@extends('layouts.admin')

@permission('read-direccionesareas')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __("Listado de Direcciones por Área") }}</h3>
        </div>
        <div class="box-body">
            <div id="categories_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="dir_are" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                                <tr>
                                    <th>{{ __("ID") }}</th>
                                    <th>{{ __("Nombre") }}</th>
                                    <th width="60">{{ __("Acciones") }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@endpermission

@push('js')
    <script>
        jQuery(document).ready(function ($) {
            dt = $("#dir_are").DataTable({    //este es el ide de la tabla para que convierta en datatebles
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 75, 100, 250, 500],
                processing: true,
                serverSide: true,
                ajax: '{{ route('direccionesareas.json') }}',
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                columns: [
                    { data: 'id', visible: false },
                    { data: 'nombre_dir_are' },
                    { data: 'actions' }
                ]
            })
        })
    </script>
@endpush


