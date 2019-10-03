<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Reporte Usuario</title>
</head>
<body>

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                    <img src="{{ $ruta }}/Fotos/Usuarios/{{ $usuario->foto }}" class="card-img" alt="..." style="width:200px; height:200px ">

            </div>
            <div class="col-md-6">
                   <h6 style="margin: 0 0 0 50%;">Nombre: {{ $usuario->nom }}</h6>
                   <h6 style="margin: 0 0 0 50%;">Apellido Paterno: {{ $usuario->ap }}</h6>
                   <h6 style="margin: 0 0 0 50%;">Apellido Materno: {{ $usuario->am }}</h6>
                   <h6 style="margin: 0 0 0 50%;">Fecha Nacimiento: {{ $usuario->fecha_nacimiento }}</h6>
                   <h6 style="margin: 0 0 0 50%;">Fecha Domicilio: {{ $usuario->fecha_domicilio }}</h6>
            </div>
        </div>

        <div class="row">
                <h6> Curp: {{ $usuario->curp }}</h6>
                <img src="{{ $ruta }}/{{ $usuario->carga_curp }}" class="card-img" alt="..." style="width:250px; height:250px; margin: 50px 0 0px 0px;">
                <h6 style="margin: 0px 0 0px 60%;"> Rfc: {{ $usuario->rfc }}</h6>
                <img src="{{ $ruta }}/{{ $usuario->carga_rfc }}" class="card-img" alt="..." style="width:250px; height:250px; margin: 40px 0 0px 60%;">
                <img src="{{ $ruta }}/{{ $usuario->carga_ife }}" class="card-img" alt="..." style="width:250px; height:250px; margin: 280px 0 0px 0px;">
                <img src="{{ $ruta }}/{{ $usuario->carga_domicilio }}" class="card-img" alt="..." style="width:250px; height:250px; margin: 370px 0 0px 60%;">
        </div>


        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Calle</th>
                    <th scope="col">Numero</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="85%">{{ $usuario->calle }}</td>
                        <td>{{ $usuario->numero }}</td>
                    </tr>
                </tbody>
              </table>
        </div>


        <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Corre Personal</th>
                        <th scope="col">Correo Institucional</th>
                        <th scope="col">Tel Casa</th>
                        <th scope="col">Tel Movil</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $usuario->correo_per }}</td>
                            <td>{{ $usuario->correo_ins }}</td>
                            <td>{{ $usuario->tel_casa }}</td>
                            <td>{{ $usuario->tel_movil }}</td>
                        </tr>
                    </tbody>
                  </table>
            </div>

            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Pais</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Municipios</th>
                            <th scope="col">Colonia</th>
                            <th scope="col">CP</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $usuario->paises->nombre_pais }}</td>
                                <td>{{ $usuario->estados->nombre }}</td>
                                <td>{{ $usuario->municipios->nombre_mun }}</td>
                                <td>{{ $usuario->colonias->nombre_col }}</td>
                                <td>{{ $usuario->colonias->codigo_postal }}</td>
                            </tr>
                        </tbody>
                      </table>
            </div>

            <div class="row">
                <h4>Estado Civil</h4>
                <hr>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Estado Civil</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Curp</th>
                            <th scope="col">Curp</th>


                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $usuario->estadoCivil->nombre }}</td>
                                @if(isset($usuario->conyuges[0]->nombres_coy))
                                <td>{{ $usuario->conyuges[0]->nombres_coy }}</td>
                                <td>{{ $usuario->conyuges[0]->primero_coy }}</td>
                                <td>{{ $usuario->conyuges[0]->segundo_coy  }}</td>
                                <td>{{ $usuario->conyuges[0]->curp_coy }}</td>
                                <td> <img src="{{ $ruta }}/{{ $usuario->conyuges[0]->carga_curp_coy }}" class="card-img" alt="..." style="width:120px; height:90px; margin: 0px 0 0px 0px;"></td>
                                @else
                                <td>No tiene</td>
                                @endif
                            </tr>
                        </tbody>
                      </table>
            </div>

            <h5 style="text-align:center">Hijos</h5>
            <hr>
            <div class="row">

                    <table class="table">
                        <thead class="thead-dark">

                          <tr>
                            <th scope="col">Hijo</th>
                            <th scope="col">Curp Hijo</th>

                          </tr>
                        </thead>
                        @foreach($usuario->solteros as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->nombre_hijo }}  Curp: {{ $item->curp_hijo  }}</td>
                                <td> <img src="{{ $ruta }}/{{ $item->carga_curp_hijo }}" class="card-img" alt="..." style="width:150px; height:120px; margin: 0px 0 0px 0px;"></td>
                            </tr>
                        </tbody>
                        @endforeach
                      </table>
            </div>

            <h5 style="text-align:center">Dependientes</h5>
            <hr>
            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">

                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>

                          </tr>
                        </thead>
                        @foreach($usuario->Descensientes as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->nombre_des }}</td>
                                <td>{{ $item->ap_des }}</td>
                                <td>{{ $item->am_des }}</td>

                            </tr>
                        </tbody>
                        @endforeach
                      </table>
            </div>

            <h5 style="text-align:center">Escolaridad</h5>
            <hr>

            <div class="row">
            Grado:
            @foreach($ng as $item)
                {{ $item }},
            @endforeach
            </div>
            <div class="row">
            Carrera:
            @foreach($nc as $item)
            {{ $item }},
            @endforeach
            </div>
            <div class="row">
            Escuela:
            @foreach($ne as $item)
            {{ $item }},
            @endforeach
            </div>
            <div class="row">
            Título:
            @foreach($nt as $item)
            {{ $item }},
            @endforeach
            </div>


            <h5 style="text-align:center">Escolaridad</h5>
            <hr>
            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">

                          <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Cédula</th>
                          </tr>
                        </thead>
                        @foreach($usuario->DetalleEscolaridades as $item)
                        <tbody>
                            <tr>
                                <td> <img src="{{ $ruta }}/{{ $item->carga_titulo }}" class="card-img" alt="..." style="width:100px; height:80px; margin: 0px 0 0px 0px;"></td>
                                <td> <img src="{{ $ruta }}/{{ $item->carga_cedula }}" class="card-img" alt="..." style="width:100px; height:80px; margin: 0px 0 0px 0px;"></td>
                            </tr>
                        </tbody>
                        @endforeach
                      </table>
            </div>


            <h5 style="text-align:center">Idioma</h5>
            <hr>
            <div class="row">
            Idioma:
            @foreach($idi as $item)
            {{ $item }},
            @endforeach
            </div>
            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Porcentaje</th>
                            <th scope="col">Certificado</th>
                          </tr>
                        </thead>
                        @foreach($usuario->DetalleIdiomas as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->nivel_ingles }}</td>
                                <td> <img src="{{ $ruta }}/{{ $item->carga_certificado }}" class="card-img" alt="..." style="width:100px; height:80px; margin: 0px 0 0px 0px;"></td>
                            </tr>
                        </tbody>
                        @endforeach
                      </table>
            </div>


            <h5 style="text-align:center">Datos Laborales</h5>
            <hr>
            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Puesto</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Dirección General</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @foreach($usuario->DetalleLaborales as $item)
                                <td> {{ $item->puesto_actual }}</td>
                                @endforeach
                                <td> {{ $ncodi }}</td>
                                <td>{{ $nnive }}</td>
                                @foreach ($dge as $item)
                                <td>{{ $item }}</td>
                                @endforeach

                            </tr>
                        </tbody>

                      </table>
            </div>

            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Dirección Area</th>
                            <th scope="col">Fecha Último</th>
                            <th scope="col">Fecha Senasica</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @foreach ($dga as $item)
                                <td>{{ $item }}</td>
                                @endforeach
                                @foreach($usuario->DetalleLaborales as $item)
                                <td> {{ $item->fecha_ultimo }}</td>
                                <td> {{ $item->fecha_senasica }}</td>
                                @endforeach

                            </tr>
                        </tbody>

                      </table>
            </div>

            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Estado</th>
                            <th scope="col">Municipio</th>
                            <th scope="col">Colonia</th>
                            <th scope="col">CP</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @foreach ($estl as $item)
                                <td>{{ $item }}</td>
                                @endforeach
                                @foreach ($munl as $item)
                                <td>{{ $item }}</td>
                                @endforeach
                                @foreach ($coll as $item)
                                <td>{{ $item }}</td>
                                @endforeach

                                <td>{{ $ncopl }}</td>



                            </tr>
                        </tbody>

                      </table>
            </div>

            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Calle</th>
                            <th scope="col">Numero</th>
                            <th scope="col">Fecha Gobierno</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                        @foreach($usuario->DetalleLaborales as $item)
                        <td> {{ $item->calle_lab }}</td>
                        <td> {{ $item->num_lab }}</td>
                        <td> {{ $item->fecha_gobierno }}</td>
                        @endforeach
                            </tr>
                        </tbody>

                      </table>
            </div>

            <h5 style="text-align:center">Experiencia Laboral</h5>
            <hr>
            <div class="row">
                Puesto:
                @foreach($usuario->ExpLaborales as $item)
                {{ $item->den_puesto }},
                @endforeach
            </div>

            <div class="row">
                Empresa:
                @foreach($usuario->ExpLaborales as $item)
                {{ $item->ins_puesto }},
                @endforeach
            </div>

            <div class="row">
                Área de Experiencia:
                @foreach($usuario->ExpLaborales as $item)
                {{ $item->area_puesto }},
                @endforeach
            </div>

            <div class="row">
                Años de Experiencia:
                @foreach($usuario->ExpLaborales as $item)
                {{ $item->anos_puesto }},
                @endforeach
            </div>

            <div class="row">
                Periodo:
                @foreach($usuario->ExpLaborales as $item)
                {{ $item->fecha_ing_puesto }} | {{ $item->fecha_baj_puesto }},
                @endforeach
            </div>

            <h5 style="text-align:center">Datos del Seguro</h5>
            <hr>
            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Numero</th>
                            <th scope="col">Enfermedad</th>
                            <th scope="col">Cual</th>
                            <th scope="col">Tipo de Sangre</th>
                            <th scope="col">Discapacidad</th>
                            <th scope="col">Cual</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                        @foreach($usuario->Seguros as $item)
                        <td> {{ $item->num_seg }}</td>
                        <td  width="10%"> {{ $item->enf_seg }}</td>
                        <td> {{ $item->cual_enf_seg }}</td>
                        <td> {{ $item->tipo_seg }}</td>
                        <td> {{ $item->dis_seg }}</td>
                        <td> {{ $item->cual_dis_seg }}</td>
                        @endforeach
                            </tr>
                        </tbody>

                      </table>
            </div>

            <h5 style="text-align:center">Contacto de Emergencia</h5>
            <hr>
            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Aellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Parentesco</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                        @foreach($usuario->Seguros as $item)
                        <td> {{ $item->nom_seg }}</td>
                        <td> {{ $item->pri_seg }}</td>
                        <td> {{ $item->seg_seg }}</td>
                        <td> {{ $item->par_seg }}</td>
                        @endforeach
                            </tr>
                        </tbody>

                      </table>
            </div>

            <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Télefono Casa</th>
                            <th scope="col">Télefono movil</th>
                          </tr>
                        </thead>

                        <tbody>
                            <tr>
                        @foreach($usuario->Seguros as $item)
                        <td> {{ $item->email_seg }}</td>
                        <td> {{ $item->tel_seg }}</td>
                        <td> {{ $item->mov_seg }}</td>
                        @endforeach
                            </tr>
                        </tbody>

                      </table>
            </div>


            <h5 style="text-align:center">Fechas de Registro</h5>
            <hr>
            <div class="row">
                Fecha de Alta: {{ $usuario->created_at }}
            </div>

            <div class="row">
                Fecha de Actualización: {{ $usuario->updated_at }}
            </div>











    </div> {{-- container --}}




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>








