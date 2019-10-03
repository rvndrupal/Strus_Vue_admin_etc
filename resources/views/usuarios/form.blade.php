<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  --}}

    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" />
    {{--  <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet" />  --}}
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/errores.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/personales.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/picker.min.css') }}" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->


    <title>Document</title>
</head>
<body>

    {{-- EMPIEZA EL MENU --}}

    <div class="d-flex toggled" id="wrapper">


            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
              <div class="sidebar-heading">ADMINISTRACIÓN</div>
              <div class="list-group list-group-flush">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">Inicio</a>
                {{--  <a href="{{ route('paises.create') }}" class="list-group-item list-group-item-action bg-light">Nuevo pais</a>
                <a href="{{ route('escuelas.create') }}" class="list-group-item list-group-item-action bg-light">Nueva escuela</a>
                <a href="{{ route('grados.create') }}" class="list-group-item list-group-item-action bg-light">Nueva grado</a>
                <a href="{{ route('carreras.create') }}" class="list-group-item list-group-item-action bg-light">Nueva carrera</a>
                <a href="{{ route('titulos.create') }}" class="list-group-item list-group-item-action bg-light">Nuevo título</a>
                <a href="{{ route('idiomas.create') }}" class="list-group-item list-group-item-action bg-light">Nuevo idioma</a>
                <a href="{{ route('direccionesgenerales.create') }}" class="list-group-item list-group-item-action bg-light">Nueva dirección general</a>
                <a href="{{ route('direccionesareas.create') }}" class="list-group-item list-group-item-action bg-light">Nueva dirección area</a>
                <a href="{{ route('codigos.create') }}" class="list-group-item list-group-item-action bg-light">Nuevos códigos</a>
                <a href="{{ route('niveles.create') }}" class="list-group-item list-group-item-action bg-light">Nuevos nivel</a>  --}}

              </div>
            </div>
            <!-- /#sidebar-wrapper -->




       <form id="msform" action="{{ route('usuarios.store') }}" method="POST" class="formulario" enctype="multipart/form-data">
            @csrf

       {{-- -menu --}}

       <button class="btn btn-primary" id="menu-toggle" style="margin: -72px +91% 0 7px; background-color: #27ae60; border-color: #686869;">Menú</button>
       {{-- -menu --}}
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">PERSONALES</li>
            <li>DOMICILIO PARTICULAR</li>
            <li>ESTADO CIVIL</li>
            <li>ESCOLARIDAD</li>
            <li>DATOS LABORALES</li>
            <li>EXPERIENCIA LABORAL</li>
            <li>SEGURIDAD SOCIAL</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Datos Personales</h2>
                  @include('usuarios/form/fase_uno')

        </fieldset>
        <fieldset>
            <h2 class="fs-title">DOMICILIO PARTICULAR</h2>
            <h3 class="fs-subtitle">Datos Particulares</h3>
            <div class="row">

                @include('usuarios/form/fase_dos')

        </fieldset>

        <fieldset>
                <h2 class="fs-title">ESTADO CIVIL</h2>
                <h3 class="fs-subtitle">Datos Personales</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Selecciona una opción</span>
                                </div>
                                <select class="form-control" name="estado_civils_id" {{ $errors->has('correo_per') ? ' is-invalid' : '' }} value="{{ old('estado_civils_id') }}" id="estado_civil" placeholder="Estado civil" >
                                    <option value="">Estado civil</option>
                                    @foreach ($estadoCivil as $estado_civil)
                                     <option value="{{ $estado_civil->id }}">{{ $estado_civil->nombre }}</option>
                                    @endforeach
                                </select>

                        </div>
                    </div>
                </div>

                <div id="conyuge">
                @include('usuarios/form/conyuge')
                </div>




                <div class="hijos">
                        <table class="table table-bordered" id="dynamic_field">
                                <hr>
                                <h4>Tienes Hijos</h4>
                             <button type="button" name="add" id="addHijos" class="btn btn-success">+</button>
                                <tr>

                                </tr>
                        </table>
                </div>

                <div class="dependientes">
                        <table class="table table-bordered" id="dependientes">
                                <hr>
                                <h4>Familiares Dependientes</h4>
                             <button type="button" name="add" id="addDependientes" class="btn btn-success">+</button>
                                <tr>

                                </tr>
                        </table>
                </div>


                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />
        </fieldset>
        {{-- Estado civil --}}

        <fieldset>
                <h2 class="fs-title">Escolaridad</h2>
                <h3 class="fs-subtitle">Información del nivel Académico</h3>
                <div class="row">
                        @include('usuarios/form/escolaridad')
                </div>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />
        </fieldset>

        <fieldset>
                <h2 class="fs-title">Datos Laborales</h2>

                @include('usuarios/form/laborales')


                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />
        </fieldset>


        <fieldset>
                <h2 class="fs-title">Experiencia Laboral</h2>

                @include('usuarios/form/exp_laboral')

                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />
        </fieldset>


        <fieldset>
            <h2 class="fs-title">DATOS SEGURIDAD SOCIAL</h2>

            @include('usuarios/form/seguros')

            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit"  class="submit action-button" id="guardar"  value="Guardar" />
        </fieldset>
    </form>



</div>{{-- DEL MENU WRAPER --}}


    <!-- jQuery -->
    {{--  <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>  --}}
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
{{--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  --}}
    <!-- jQuery easing plugin -->
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/validando.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/picker.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>




</body>
</html>




<script>
$(document).ready(function(){

        //mostrar estado
        $("#estado").on("changed.bs.select",function(e){

            var id=e.target.value;
            console.log(id);

            if(id=="selected"){
                $("#municipios").append("<option value=''>Selecciona un estado</option>");
                console.log("nada");
            }
            else{

                $.get("municipios/" + id, function(data){

                    $("#municipios").empty();

                    for(i=0; i<data.length ;i++)
                        {
                            $("#municipios").append("<option value='" +data[i].id+"'>"+data[i].nombre_mun+"</option>");
                        }

                        $('#municipios').selectpicker("refresh");
                });
            }
        });//estados


        //mostrar las colonias
        $("#municipios").on("changed.bs.select",function(e){

            var id=e.target.value;
            console.log(id);

            if(id=="selected"){
                $("#colonia").append("<option value=''>Selecciona un código</option>");
                console.log("nada");
            }
            else{

                $.get("colonias/" + id, function(data){

                    $("#colonias").empty();

                    for(i=0; i<data.length ;i++)
                        {
                            $("#colonias").append("<option value='" +data[i].id+"'>"+data[i].nombre_col+"</option>");
                        }

                        $('#colonias').selectpicker("refresh");

                });

            }
        });


        //mostrar las cp
        $("#colonias").change(function(e){

            var id=e.target.value;
            console.log(id);

            if(id=="selected"){
                $("#colonia").append("<option value=''>Selecciona un código</option>");
                console.log("nada");
            }
            else{

                $.get("cp/" + id, function(data){

                    $("#colonias_cp").empty();

                    for(i=0; i<data.length ;i++)
                        {
                            $("#colonias_cp").append(" <div class='input-group-prepend' id='colonias_cp'><span class='input-group-text' id='addon-wrapping'>CP</span></div><input type='text' name='codigo_postal' readonly value="+data[i].codigo_postal+" class='form-control'> ");
                        }

                });
            }
        });





        //Agregando los hijos
        var i=1;
        $(document).on('click', '#addHijos', function(){
             i++;
             $('#dynamic_field').append('<tr class="hijos recorrer" id="row'+i+'">'+
                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Nombre</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="nombre_hijo[]" id="hijoc'+i+'" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">'+

                        '</div>'+
                  '</td>'+

                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Curp</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="curp_hijo[]" id="curp_hijo'+i+'" placeholder="Curp" aria-label="Nombre" aria-describedby="addon-wrapping">'+

                        '</div>'+
                  '</td>'+

                  '<td>'+
                        '<div class="col-md-12">'+
                                '<input type="file" class="form-control" data-valor="'+i+'"  id="carga_curp_hijo'+i+'"  name="carga_curp_hijo[]" >'+
                        '</div>'+
                    '</div>'+
                  '</td>'+


                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#row'+button_id+'').remove();
        });

        //Dependientes

        var i=1;
        $(document).on('click', '#addDependientes', function(){
             i++;
             $('#dependientes').append('<tr class="dependientes" id="row'+i+'">'+
                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Nombre</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="nombre_des[]" id="nombre_des'+i+'" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">'+

                        '</div>'+
                  '</td>'+
                  '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Apellido</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="ap_des[]" id="ap_des'+i+'" placeholder="paterno" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                 '</td>'+

                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Apellido</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="am_des[]" id="am_des'+i+'" placeholder="materno" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                 '</td>'+

                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#row'+button_id+'').remove();
        });












        //OPCIONES CONFIGURACION

            $('input[type="text"]').change(function(){
                $(this).css('background','rgb(234, 234, 234)');
                $(this).css('color','black');
            });

            $('input[type="email"]').change(function(){
                $(this).css('background','rgb(234, 234, 234)');
                $(this).css('color','black');
            });

            {{-- DEL MENU --}}
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
              });

            {{-- DEL MENU --}}


            {{-- Magia para los campos de validación --}}

            jQuery.validator.setDefaults({
                highlight: function(element) {
                    jQuery(element).closest('.form-control').addClass('is-invalid');
                },
                unhighlight: function(element) {
                    jQuery(element).closest('.form-control').removeClass('is-invalid');
                },
                errorElement: 'span',
                errorClass: 'label label-danger',
                errorPlacement: function(error, element) {
                    if(element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            {{-- preload imagenes --}}
            function filePreview(input) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#pre + img').remove();
                        $('#pre').after('<img src="'+e.target.result+'" class="previo" width="120px" height="120px"/>');

                    }
                    reader.readAsDataURL(input.files[0]);

            }

            $("#previo").change(function () {
                filePreview(this);
                $('#pre').removeClass('load');
            });

            //piker
            $(".pais").selectpicker({
                dropdownAlignRight:true,
            });
            $('.estado').selectpicker(); //ojo evento change
            $('#municipios').selectpicker();
            $('#colonias').selectpicker();
            $('#codigo_puesto').selectpicker();
            $('#niveles').selectpicker();
            $('#dir_general').selectpicker();
            $('#dir_area').selectpicker();
            $('#estadoss').selectpicker();
            $('#municipioss').selectpicker();

            //datapiker
            $( "#fecha_nacimiento" ).datepicker({
                dateFormat: "yy-mm-dd",
            });

            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
                };
                $.datepicker.setDefaults($.datepicker.regional['es']);



            //boton derecho del mause
            {{--  $(document).bind("contextmenu",function(e){
                alert("Web Segura");
                return false;
            });  --}}













});//inicio


</script>


