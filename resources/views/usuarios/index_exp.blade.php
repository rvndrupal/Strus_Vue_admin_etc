@extends('layouts.admin')

{{--  @permission('read-usuariosSuper')  --}}
@permission('read-usuarios')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __("Consulta Avanzada") }}</h3>
        </div>
        <div class="box-body">
            <div id="categories_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">


                        <table id="usuarios" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                                <tr>
                                    <th>{{ __("Extra") }}</th>
                                    <th>{{ __("Nombre") }}</th>
                                    <th>{{ __("Apellido paterno") }}</th>
                                    <th>{{ __("Apellido materno") }}</th>
                                   <th>{{ __("Curp") }}</th>
                                    <th>{{ __("Rfc") }}</th>
                                    <th>{{ __("Calle") }}</th>
                                    <th>{{ __("Número") }}</th>
                                    <th>{{ __("Email personal") }}</th>
                                    <th>{{ __("Estado") }}</th>
                                    <th width="170">{{ __("Acciones") }}</th>
                                </tr>
                            </thead>
                            {{--  <tfoot>
                                    <tr>
                                        <th>{{ __("ID") }}</th>
                                        <th>{{ __("nom") }}</th>
                                        <th>{{ __("ap") }}</th>
                                        <th>{{ __("am") }}</th>
                                        <th>{{ __("curp") }}</th>
                                    </tr>
                            </tfoot>  --}}
                        </table>

                        <div class="text-center">
                            <a class="toggle-vis btn btn-sm btn-info" data-column="1">Nombre</a>
                            <a class="toggle-vis btn btn-sm btn-info" data-column="2">Ap</a>
                            <a class="toggle-vis btn btn-sm btn-info" data-column="3">Am</a>
                            <a class="toggle-vis btn btn-sm btn-info" data-column="4">Curp</a>
                            <a class="toggle-vis btn btn-sm btn-info" data-column="5">Rfc</a>
                           {{-- <a class="toggle-vis btn btn-sm btn-info" data-column="6">Calle</a>
                            <a class="toggle-vis btn btn-sm btn-info" data-column="7">Número</a>
                            <a class="toggle-vis btn btn-sm btn-info" data-column="8">Email personal</a>  --}}
                        </div>
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
            //extender funcionalidad
            $.extend(true, $.fn.dataTable.defaults,{
                //info:false,
                //ordering:false,
                //searching:false,
                //Mostrar botones de impresion

            });

            //mostrar detalles
            function format(d) {
                return `
                        <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">
                            <tr>
                                <td>Foto</td>
                                <td><img src="/recursos/public/Fotos/Usuarios/${d.foto}" style=" width:80px; "></td>
                                <td>Curp:</td>
                                <td>${d.curp}</td>
                                <td>Rfc:</td>
                                <td>${d.rfc}</td>
                            </tr>
                            <tr>
                                <td>Calle:</td>
                                <td>${d.calle}</td>
                                <td>Numero:</td>
                                <td>${d.numero}</td>
                            </tr>
                            <tr>
                            <td>Correo Personal:</td>
                            <td>${d.correo_per}</td>
                            <td>Correo Institucional:</td>
                            <td>${d.correo_ins}</td>
                            </tr>
                            <tr>
                            <td>Tel casa:</td>
                            <td>${d.tel_casa}</td>
                            <td>Cel:</td>
                            <td>${d.tel_movil}</td>
                            </tr>
                            <tr>
                            <td>Fecha nacimiento:</td>
                            <td>${d.fecha_nacimiento}</td>
                            <td>Fecha alta:</td>
                            <td>${d.created_at}</td>
                            </tr>

                        </table>
                    `;
            }

            //poner filtros de busqueda en el footer
            {{-- $("#usuarios tfoot th").each(function(){
                var title=$(this).text();
                $(this).html('<input type="text" placeholder="Buscar por: '+title+'"/>');
            }); --}}

            var dt = $("#usuarios").DataTable({    //este es el ide de la tabla para que convierta en datatebles

                //stateSave: true, //se quede en el numero buscado importante
                //scrollX:true, //verificarlo despues
                pageLength: 5,
                lengthMenu: [5, 10, 15, 20, 25, 50, 75, 100, 250, 500],
                processing: true,
                serverSide: true,
                ajax: '{{ route('usuarios_exp') }}',
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
                },
                columns: [
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "data": 1,
                        "defaultContent": ''
                    },
                    {{--  { data: 'id' },  --}}
                    { data: 'nom' },
                    { data: 'ap' },
                    { data: 'am' },
                    { data: 'curp' },
                    { data: 'rfc' },
                    { data: 'calle' },
                    { data: 'numero' },
                    { data: 'correo_per' },
                    { data: 'condicion',
                        "render": function (data, type, row) {
                            if (row.condicion == 1) {
                                return "<p class='activo_index'>Activo</p>"
                            }
                            else if(row.condicion == 0)
                            {
                                return "<p class='desactivado_index'>Desactivado</p>"
                            }
                        }
                     },
                    { data: 'actions' }
                ],
                columnDefs:[
                    // { targets: [0], orderData:[0,1], visible: false, searching: false}, //ordena la columna uno
                ],

                {{--  dom: "Bfrtip",
                buttons: [
                 'copy','csv','excel','pdf','print',
                 'selected',
                'selectedSingle',
                'selectAll',
                'selectNone',
                'selectRows',
                'selectColumns',
                'selectCells',
                    extend: 'colvis',
                    columnText: function ( dt, idx, title ) {
                        return (idx+1)+': '+title;
                    }
                ],  --}}
            });

            //Detalles boton +
            $('#usuarios tbody').on('click', 'td.details-control', function () {
                let tr = $(this).closest('tr');
                let row = dt.row(tr);

                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });

            //para los campos de busqueda
            {{--  dt.columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change clear', function (e) {
                    e.preventDefault();
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );  --}}


            //para mostrar columnas
            $("a.toggle-vis").on("click", function(e){
                e.preventDefault();
                var column= dt.column($(this).data("column"));
                column.visible( !column.visible());
            });




        })//jquery
    </script>
@endpush
