@extends('layouts.admin')

{{--  @permission('read-usuariosSuper')  --}}
@permission('read-usuarios')
@section('content')
<html lang="en">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>jQuery UI Tabs - Default functionality</title>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <script>
          $( function() {
            $( "#tabs" ).tabs();
          } );
          </script>
        </head>
        <body>

        <div id="tabs">
          <ul>
            <li><a href="#tabs-1">Personal</a></li>
            <li><a href="#tabs-2">Domicilio</a></li>
            <li><a href="#tabs-3">Estado Civil</a></li>
            <li><a href="#tabs-4">Escolaridad</a></li>
            <li><a href="#tabs-5">Datos Laborales</a></li>
            <li><a href="#tabs-6">Experiencia Laboral</a></li>
            <li><a href="#tabs-7">Seguro Social</a></li>
          </ul>
          <div id="tabs-1">
              <div class="row">
                    <div class="col-md-3">
                            <img src="/recursos/public/Fotos/Usuarios/{{ $usuario->foto }}" class="card-img" alt="..." style="width:250px; height:250px ">
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Nombre: {{ $usuario->nom }}</h5>
                        <p class="card-text">Apellido paterno: {{ $usuario->ap }}</p>
                        <p class="card-text">Apellido materno: {{ $usuario->am }}</p>
                        <p class="card-text">Fecha de Nacimiento: {{ $usuario->fecha_nacimiento }}</p>
                        <h5 class="card-title">Correo Institucional: {{ $usuario->correo_ins }}</h5>
                        <h5 class="card-title">Correo Personal: {{ $usuario->correo_per }}</h5>
                        <h5 class="card-title">Telefono casa: {{ $usuario->tel_casa }}</h5>
                        <h5 class="card-title">Télefono movil: {{ $usuario->tel_movil }}</h5>

                        <p class="card-text"><small class="text-muted">Fecha de Alta: {{ $usuario->created_at }}</small></p>
                    </div>
                </div>{{-- row --}}

                <div class="row">

                    <div class="col-md-12">
                                <table class="table" style="margin: 14px 0 0 0;">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">RFC</th>
                                            <th scope="col">CURP</th>
                                            <th scope="col">IFE</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <a href="http://localhost/recursos/public/rfc/{{ $usuario->carga_rfc }} " download="{{ $usuario->carga_pdf }}">
                                                    <i class="glyphicon glyphicon-download">RFC</i>
                                                </a>
                                            </td>
                                            <td>
                                            <a href="http://localhost/recursos/public/curp/{{ $usuario->carga_curp }} " download="{{ $usuario->carga_curp }}">
                                                <i class="glyphicon glyphicon-download">CURP</i>
                                            </a>
                                            </td>
                                            <td>
                                                <a href="http://localhost/recursos/public/ife/{{ $usuario->carga_ife }} " download="{{ $usuario->carga_ife }}">
                                                <i class="glyphicon glyphicon-download">IFE</i>
                                                </a>
                                            </td>
                                          </tr>

                                        </tbody>
                                </table>
                        </div>
                </div>

          </div>{{-- tab-1 --}}



          <div id="tabs-2">
              <div class="row">
                  <div class="col-md-12">
                          <table class="table" style="margin: 14px 0 0 0;">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">PAIS</th>
                                      <th scope="col">ESTADO</th>
                                      <th scope="col">MUNICIPIO</th>
                                      <th scope="col">COLONIA</th>
                                      <th scope="col">CP</th>
                                      <th scope="col">CALLE</th>
                                      <th scope="col">NUM</th>
                                      <th scope="col">COMPROBANTE</th>
                                      <th scope="col">FECHA DOMICILIO</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>{{ $usuario->paises->nombre_pais }}</td>
                                      <td>{{ $usuario->estados->nombre }}</td>
                                      <td>{{ $usuario->municipios->nombre_mun }}</td>
                                      <td> {{ $usuario->colonias->nombre_col }}</td>
                                      <td> {{ $usuario->colonias->codigo_postal }}</td>
                                      <td> {{ $usuario->calle }}</td>
                                      <td> {{ $usuario->numero }}</td>
                                      <td>
                                        <a href="http://localhost/recursos/public/DOMICILIO/{{ $usuario->carga_domicilio }} " download="{{ $usuario->carga_domicilio }}">
                                            <i class="glyphicon glyphicon-download">Comprobante</i>
                                        </a>
                                      </td>
                                      <td> {{ $usuario->fecha_domicilio }} </td>
                                    </tr>

                                  </tbody>
                          </table>
                  </div>
              </div>
          </div>

          {{-- tabs2 hasta aqui todo ok--}}







          <div id="tabs-3">
                <div class="row">
                        <div class="col-md-12">
                                <table class="table" style="margin: 14px 0 0 0;">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ESTADO CIVIL</th>
                                            <th scope="col">CONYUGE</th>
                                            <th scope="col">CURP</th>
                                            <th scope="col">ARCHIVO</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $usuario->estadoCivil->nombre }}</td>
                                            <td>
                                            @foreach($usuario->conyuges as $item)
                                                @if($item->nombres_coy == '0')
                                                <h5>Sin Pareja</h5>
                                                @else
                                                <h5 class="card-title">{{ $item->nombres_coy }} {{ $item->primero_coy }} {{ $item->segundo_coy }}</h5>
                                                <td>
                                                    <h5 class="card-title">{{ $item->curp_coy }}</h5>
                                                </td>
                                                <td>
                                                    <a href="http://localhost/recursos/public/CURPCONYUGES/{{ $item->carga_curp_coy }} " download="{{ $item->carga_curp_coy }}">
                                                        <i class="glyphicon glyphicon-download">Curp</i>
                                                    </a>
                                                </td>
                                                @endif
                                            @endforeach
                                            </td>

                                          </tr>
                                        </tbody>
                                </table>
                        </div>
                    </div>


                    <hr>
                    <h3>Hijos</h3>
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table" style="margin: 14px 0 0 0;">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">CURP</th>
                                            <th scope="col">ARCHIVO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($usuario->solteros as $item)
                                                    @if($item->nombre_hijo == '0')
                                                    <h3>No tiene Hijos</h3>
                                                    @else
                                                    <tr>
                                                    <th scope="row">{{ $loop->index+1 }}</th>
                                                    <td>{{ $item->nombre_hijo }}</td>
                                                    <td>{{ $item->curp_hijo }}</td>
                                                    <td>
                                                        <a href="http://localhost/recursos/public/CURPHIJOS/{{ $item->carga_curp_hijo }} " download="{{ $item->carga_curp_hijo }}">
                                                            <i class="glyphicon glyphicon-download">Curp</i>
                                                        </a>
                                                    </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                              </tbody>
                                      </table>

                        </div>
                    </div>

                    <hr>



                    <h3>Familiares Dependientes</h3>
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table" style="margin: 14px 0 0 0;">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">APELLIDO PATERNO</th>
                                            <th scope="col">APELLIDO MATERNO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($usuario->Descensientes as $item)
                                                <tr>
                                                  <th scope="row">{{ $loop->index+1 }}</th>
                                                  <td>{{ $item->nombre_des }}</td>
                                                  <td>{{ $item->ap_des }}</td>
                                                  <td>{{ $item->am_des }}</td>
                                                </tr>
                                                @endforeach
                                              </tbody>
                                      </table>

                        </div>
                    </div>

          </div>

          {{-- Todo ok hasta aqui --}}










           <div id="tabs-4">
            <table class="table" style="margin: 14px 0 0 0;">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ESTUDIOS</th>
                        <th scope="col">GRADOS</th>
                        <th scope="col">CARRERAS</th>
                        <th scope="col">CEDULA</th>
                        <th scope="col">ESCUELA</th>
                        <th scope="col">CONSTANCIA</th>
                        <th scope="col">TÍTULO</th>
                        <th scope="col">CEDULA</th>

                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <th scope="row">
                           @for($i=1; $i<=$total_Esc; $i++)
                            {{ $i }}<p></p>
                           @endfor
                        </th>
                        <td>
                            @foreach($ng as $item)
                            {{ $item }}<p></p>
                            @endforeach
                        </td>
                        <td>
                            @foreach($nc as $item)
                            {{ $item }}<p></p>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($usuario->DetalleEscolaridades as $item)
                                @if($item->cedula !="0")
                                {{ $item->cedula }}<p></p>
                                @else
                                <h6>Sin Cédula</h6>
                                @endif

                            @endforeach

                        </td>
                        <td>
                            @foreach($ne as $item)
                            {{ $item }}<p></p>
                            @endforeach
                        </td>

                        <td>
                            @foreach($nt as $item)
                            {{ $item }}<p></p>
                            @endforeach
                        </td>
                        <td>
                        @foreach ($usuario->DetalleEscolaridades as $item)
                            @if($item->carga_titulo !="0")
                                <a href="http://localhost/recursos/public/TITULOPROFESIONAL/{{ $item->carga_titulo }} " download="{{ $item->carga_titulo }}">
                                    <i class="glyphicon glyphicon-download">TÍTULO</i>
                                </a><p></p>
                            @else
                            <h6>Sin Título</h6>
                            @endif

                        @endforeach
                        </td>

                        <td>
                            {{--  @for($i=0; $i<$total_Esc; $i++)
                                @if($usuario->DetalleEscolaridades[$i]->cedula==0)
                                <h6>Sin Cédula</h6>
                                @else
                                <a href="http://localhost/recursos/public/{{ $usuario->DetalleEscolaridades[$i]->carga_cedula }} " download="{{ $usuario->DetalleEscolaridades[$i]->carga_cedula }}">
                                    <i class="glyphicon glyphicon-download">CEDULA</i>
                                </a><p></p>
                                @endif
                            @endfor  --}}
                            @foreach ($usuario->DetalleEscolaridades as $item)
                                @if($item->carga_cedula != "0")
                                    <a href="http://localhost/recursos/public/CEDULA/{{ $item->carga_cedula }} " download="{{ $item->carga_cedula }}">
                                        <i class="glyphicon glyphicon-download">CEDULA</i>
                                    </a><p></p>
                                @else
                                <h6>Sin Cédula</h6>
                                @endif

                            @endforeach
                        </td>


                      </tr>
                    </tbody>
            </table>


            <table class="table" style="margin: 14px 0 0 0;">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">'#'</th>
                        <th scope="col">IDIOMA</th>
                        <th scope="col">NIVEL</th>
                        <th scope="col">CERTIFICADO</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <th scope="row">
                           @for($i=1; $i<=$totalidi; $i++)
                            {{ $i }}<p></p>
                           @endfor
                        </th>
                        <td>
                            @foreach($idi as $item)
                            {{ $item }}<p></p>
                            @endforeach
                        </td>

                        <td>
                            @for($i=0; $i<$totalidi; $i++)
                            {{ $usuario->DetalleIdiomas[$i]->nivel_ingles }}<p></p>
                            @endfor
                        </td>

                        <td>
                            @for($i=0; $i<$totalidi; $i++)
                            <a href="http://localhost/recursos/public/CERT_IDIOMAS/{{ $usuario->DetalleIdiomas[$i]->carga_certificado }} " download="{{ $usuario->DetalleIdiomas[$i]->carga_certificado }}">
                                <i class="glyphicon glyphicon-download">CERTIFICADO</i>
                            </a><p></p>
                            @endfor
                        </td>
                      </tr>
                    </tbody>
            </table>

          </div>

          {{-- Escolaridad --}}









          {{-- Datos Laborales --}}

           <div id="tabs-5">

            <div class="table-responsive-sm">
                <table class="table" style="margin: 14px 0 0 0;">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">PUESTO</th>
                            <th scope="col">CÓDIGO PUESTO</th>
                            <th scope="col">NIVEL</th>
                            <th scope="col">DIRECCIÓN GENERAL</th>
                            <th scope="col">DIRECCIÓN ÁREA</th>
                            <th scope="col">FECHA ULTIMO</th>
                            <th scope="col">FECHA SENASICA</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">MUNICIPIO</th>
                            <th scope="col">COLONIA</th>
                            <th scope="col">COLONIA</th>
                            <th scope="col">CP</th>
                            <th scope="col">CALLE</th>
                            <th scope="col">NUMERO</th>
                            <th scope="col">FECHA GOBIERNO</th>


                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            <th scope="row">
                               1
                            </th>
                            <td>
                            {{ $usuario->DetalleLaborales[0]->puesto_actual }}<p></p>
                            </td>

                            <td>
                            {{ $ncodi }}<p></p>
                            </td>
                            <td>
                            {{ $nnive }}<p></p>
                            </td>
                            <td>
                                @foreach($dge as $item)
                                {{ $item }}<p></p>
                                @endforeach
                            </td>
                            <td>
                                @foreach($dga as $item)
                                {{ $item }}<p></p>
                                @endforeach
                            </td>
                            <td>
                            {{ $usuario->DetalleLaborales[0]->fecha_ultimo }}<p></p>
                            </td>
                            <td>
                            {{ $usuario->DetalleLaborales[0]->fecha_senasica }}<p></p>
                            </td>
                            <td>
                                @foreach($estl as $item)
                                {{ $item }}<p></p>
                                @endforeach
                            </td>
                            <td>
                                @foreach($munl as $item)
                                {{ $item }}<p></p>
                                @endforeach
                            </td>
                            <td>
                                @foreach($coll as $item)
                                {{ $item }}<p></p>
                                @endforeach
                            </td>
                            <td>{{ $ncopl }}</td>
                            <td>
                            {{ $usuario->DetalleLaborales[0]->cod_lab }}<p></p>
                            </td>
                            <td>
                            {{ $usuario->DetalleLaborales[0]->calle_lab }}<p></p>
                            </td>
                             <td>
                            {{ $usuario->DetalleLaborales[0]->num_lab }}<p></p>
                            </td>
                            <td>
                            {{ $usuario->DetalleLaborales[0]->fecha_gobierno }}<p></p>
                            </td>
                          </tr>
                        </tbody>
                </table>
            </div>
         </div>

        {{-- Datos Laborales  hasta aqui ok --}}




          {{-- Experiencia  Laborales --}}

          <div id="tabs-6">

            <div class="table-responsive-sm">
                <table class="table" style="margin: 14px 0 0 0;">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">PUESTO</th>
                            <th scope="col">INSTITUTO Ó EMPRESA</th>
                            <th scope="col">ÁREA DE EXPERIENCIA</th>
                            <th scope="col">AÑOS DE EXPERIENCIA</th>
                            <th scope="col">FECHA DE INGRESO</th>
                            <th scope="col">FECHA DE BAJA</th>
                            <th scope="col">ARCHIVO</th>



                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            <th scope="row">
                            @for($i=1; $i<=$total_Exp; $i++)
                            {{ $i }}<p></p>
                            @endfor
                            </th>
                            <td>
                            @foreach($usuario->ExpLaborales as $item)
                            {{ $item->den_puesto }}<p></p>
                            @endforeach
                            </td>

                            <td>
                            @foreach($usuario->ExpLaborales as $item)
                            {{ $item->ins_puesto }}<p></p>
                            @endforeach
                            </td>
                            <td>
                            @foreach($usuario->ExpLaborales as $item)
                            {{ $item->area_puesto }}<p></p>
                            @endforeach
                            </td>
                            <td>
                            @foreach($usuario->ExpLaborales as $item)
                            {{ $item->anos_puesto }}<p></p>
                            @endforeach
                            </td>
                            <td>
                            @foreach($usuario->ExpLaborales as $item)
                            {{ $item->fecha_ing_puesto }}<p></p>
                            @endforeach
                            </td>
                            <td>
                            @foreach($usuario->ExpLaborales as $item)
                            {{ $item->fecha_baj_puesto }}<p></p>
                            @endforeach
                            </td>

                            <td>
                            @foreach($usuario->ExpLaborales as $item)
                            <a href="http://localhost/recursos/public/DOCPUESTO/{{ $item->doc_puesto }} " download="{{ $item->doc_puesto }}">
                                <i class="glyphicon glyphicon-download">Arhivos</i><p></p>
                            </a>
                            @endforeach
                            </td>

                          </tr>
                        </tbody>
                </table>
            </div>
        </div>


        {{-- Experiencia Laborales OK--}}



          {{-- SEGURO SOCIAL --}}

          <div id="tabs-7">

                <div class="table-responsive-sm">
                    <table class="table" style="margin: 14px 0 0 0;">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">NUMERO SEGURO</th>
                                <th scope="col">ENFERMEDAD</th>
                                <th scope="col">CUAL</th>
                                <th scope="col">TIPO DE SANGRE</th>
                                <th scope="col">DISCAPACIDAD</th>
                                <th scope="col">CUAL</th>




                              </tr>
                            </thead>
                            <tbody>

                              <tr>
                                <th scope="row">
                                1
                                </th>
                                <td>
                                    {{ $usuario->Seguros[0]->num_seg }}
                                </td>

                                <td>
                                    {{ $usuario->Seguros[0]->enf_seg }}
                                </td>

                                <td>
                                    {{ $usuario->Seguros[0]->cual_enf_seg }}
                                </td>

                                <td>
                                    {{ $usuario->Seguros[0]->tipo_seg }}
                                </td>

                                <td>
                                    {{ $usuario->Seguros[0]->dis_seg }}
                                </td>

                                <td>
                                    {{ $usuario->Seguros[0]->cual_dis_seg }}
                                </td>







                              </tr>
                            </tbody>
                    </table>
                </div>

                <div class="table-responsive-sm">
                    <h2>CONTACTO DE EMERGENCIA</h2>
                        <table class="table" style="margin: 14px 0 0 0;">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">APELLIDO PATERNO</th>
                                    <th scope="col">APELLIDO MATERNO</th>
                                    <th scope="col">PARENTESCO</th>
                                    <th scope="col">CORREO</th>
                                    <th scope="col">TEL: CASA</th>
                                    <th scope="col">TEL: MOVIL</th>



                                  </tr>
                                </thead>
                                <tbody>

                                  <tr>
                                    <th scope="row">
                                    1
                                    </th>
                                    <td>
                                        {{ $usuario->Seguros[0]->nom_seg }}
                                    </td>

                                    <td>
                                        {{ $usuario->Seguros[0]->pri_seg }}
                                    </td>

                                    <td>
                                        {{ $usuario->Seguros[0]->seg_seg }}
                                    </td>

                                    <td>
                                        {{ $usuario->Seguros[0]->par_seg }}
                                    </td>

                                    <td>
                                        {{ $usuario->Seguros[0]->email_seg }}
                                    </td>

                                    <td>
                                        {{ $usuario->Seguros[0]->tel_seg }}
                                    </td>

                                    <td>
                                        {{ $usuario->Seguros[0]->mov_seg }}
                                    </td>







                                  </tr>
                                </tbody>
                        </table>
                    </div>



            </div>


        </div>


        {{-- tabs --}}


        </body>
        </html>

@endsection

@endpermission








