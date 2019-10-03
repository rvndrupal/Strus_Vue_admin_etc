
@extends('layouts.admin')


@permission('read-exportar')
@section('content')
{{--  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  --}}





            <h3 class="box-title">{{ __("Exportar Usuarios Avanzado") }}</h3>
            <a href="{{ route('usuarios.exportar-excel') }}" class="btn btn-success pull-left">Exportar Todos</a>


                <div class="row">
                    <div class="col-sm-12">

                         <form action="{{ route('usuarios.index-exportar') }}" method="GET" class="form-inline pull-right">

                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input type="text" name="ap" class="form-control" placeholder="Apellido paterno">
                            </div>
                            <div class="form-group">
                                <input type="text" name="am" class="form-control" placeholder="Apellido materno">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Buscar
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>

                        </form>

                        <hr>


                        <table  class="table able-striped table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th></th>
                                    <th>{{ __("Id") }}</th>
                                    <th>{{ __("Nombre") }}</th>
                                    <th>{{ __("Apellido paterno") }}</th>
                                    <th>{{ __("Apellido materno") }}</th>
                                    <th>{{ __("Fecha de Nacimiento") }}</th>
                                    {{-- <th>{{ __("Rfc") }}</th>
                                    <th>{{ __("Curp") }}</th>
                                    <th>{{ __("Calle") }}</th>
                                    <th>{{ __("Numero") }}</th>
                                    <th>{{ __("Correo Personal") }}</th>
                                    <th>{{ __("Correo Institucional") }}</th>
                                    <th>{{ __("Tel casa") }}</th>
                                    <th>{{ __("Movil") }}</th>
                                    <th>{{ __("Nombre conyuge") }}</th>
                                    <th>{{ __("Paterno conyuge") }}</th>
                                    <th>{{ __("Materno conyuge") }}</th>
                                    <th>{{ __("Hijo")}}</th> --}}





                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as  $user)
                                <tr>
                                    <td></td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->nom }}</td>
                                    <td>{{ $user->ap }}</td>
                                    <td>{{ $user->am }}</td>
                                    <td>{{ $user->fecha_nacimiento }}</td>

                                    {{-- <td>{{ $user->rfc }}</td>
                                    <td>{{ $user->curp }}</td>
                                    <td>{{ $user->calle }}</td>
                                    <td>{{ $user->numero }}</td>
                                    <td>{{ $user->correo_per }}</td>
                                    <td>{{ $user->correo_ins }}</td>
                                    <td>{{ $user->tel_casa }}</td>
                                    <td>{{ $user->tel_movil }}</td>
                                    <td>{{ $user->conyuges[0]->nombres_coy }}</td>
                                    <td>{{ $user->conyuges[0]->primero_coy }}</td>
                                    <td>{{ $user->conyuges[0]->segundo_coy }}</td> --}}

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                        {{ $usuarios->render() }}

                    </div>
                </div>
                <div class="row">
                    <div class="col-offset-4 col-md-8">
                        <h3>Buscar por fecha de Nacimiento:  </h3>
                        <hr>
                        <form action="{{ route('usuarios.index-exportar') }}" method="GET" class="form-inline pull-right">

                                <div class="form-group">
                                    <input type="date" name="fechauno" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <input type="date" name="fechados" class="form-control" placeholder="Apellido paterno">
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Buscar
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>

                            </form>
                    </div>
                </div>



  @endsection

@endpermission


{{--  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src=" //cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src=" //cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>  --}}









<script>
        $(document).ready(function() {





        });
</script>

