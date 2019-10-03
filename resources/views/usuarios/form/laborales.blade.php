<div class="container">
        <div class="row">

            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Puesto Actual</span>
                            </div>
                        <input type="text" class="form-control" name="puesto_actual" id="puesto_actual"    placeholder="Puesto actual" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>

            {{--  <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Código puesto</span>
                            </div>
                        <input type="text" class="form-control" name="codigo_puesto" id="codigo_puesto"    placeholder="Código del puesto" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>  --}}

            <div class="col-md-4">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                        <span class="input-group-text"  id="addon-wrapping">Código puesto</span>
                    </div>
                    <select  name="codigo_puesto" class="form-control" data-live-search="true" data-size="5" id="codigo_puesto"  placeholder="Código">
                            <option value="">Código</option>
                            @foreach ($co as $item)
                            <option value="{{ $item->id }}">{{ $item->nom_codigos }}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            {{--  <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Grupo,grado,nivel</span>
                            </div>
                        <input type="text" class="form-control" name="grado_nivel" id="grado_nivel"    placeholder="Grupo,grado" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>  --}}

            <div class="col-md-4">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Niveles</span>
                    </div>
                    <select  name="grado_nivel" class="form-control" data-live-search="true" data-size="5" id="niveles"  placeholder="Niveles">
                            <option value="">Niveles</option>
                            @foreach ($ni as $item)
                            <option value="{{ $item->id }}">{{ $item->nom_niveles }}</option>
                            @endforeach
                    </select>
                </div>
            </div>


            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Direcció general</span>
                        </div>
                        <select  name="direcciones_generales_id"  data-live-search="true" data-size="5" class="form-control" id="dir_general" placeholder="Direccion general">
                                <option value="">Dirección General</option>
                                @foreach ($dg as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre_dir_gen }}</option>
                                @endforeach
                        </select>
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Direcció Área</span>
                        </div>
                        <select  name="direcciones_areas_id"  data-live-search="true" data-size="5" class="form-control" id="dir_area" placeholder="Direccion area">
                                <option value="">Dirección Área</option>
                                @foreach ($da as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre_dir_are }}</option>
                                @endforeach
                        </select>
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha ingreso</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_ultimo" id="fecha_ultimo" placeholder="Último puesto" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha Senasica</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_senasica" id="fecha_senasica" placeholder="Senasica" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>


            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                         <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Estado</span>
                        </div>
                        <select  name="est_lab" class="form-control" data-live-search="true" data-size="6" placeholder="Estado" id="estadoss">
                                <option value="">Estado</option>
                                @foreach ($estados as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                        </select>
                       </div>
            </div>

            <div class="col-md-4">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Municipio</span>
                        </div>
                        <select class="form-control" name="mun_lab" data-live-search="true" data-size="6" class="form-control" placeholder="Colonia" id="municipioss">
                                <option value="">Municipio</option>
                        </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Colonia</span>
                        </div>
                        <select class="form-control" name="col_lab" data-live-search="true" data-size="5" placeholder="codigo" id="coloniass">
                                <option value="">Colonia</option>
                        </select>
                </div>
            </div>


            <div class="col-md-2">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend" id="colonias_cps">
                            <span class="input-group-text" id="addon-wrapping">CP</span>
                        </div>
                        {{--  <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo postal">  --}}
                    </div>
            </div>

            <div class="col-md-6">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Calle</span>
                            </div>
                        <input type="text" class="form-control" name="calle_lab" id="calle_lab"    placeholder="Calle" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Numero</span>
                            </div>
                        <input type="text" class="form-control" name="num_lab" id="num_lab"    placeholder="numero" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>

            <div class="col-md-5">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha ingreso</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_gobierno" id="fecha_gobierno" placeholder="Gobierno" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>








    </div>{{-- row --}}
</div>{{-- -container --}}


<script>
        $(document).ready(function(){

                //mostrar estado
                $("#estadoss").on("changed.bs.select",function(e){

                    var id=e.target.value;
                    console.log(id);

                    if(id=="selected"){
                        $("#municipios").append("<option value=''>Selecciona un estado</option>");
                        console.log("nada");
                    }
                    else{

                        $.get("municipios/" + id, function(data){

                            $("#municipioss").empty();

                            for(i=0; i<data.length ;i++)
                                {
                                    $("#municipioss").append("<option value='" +data[i].id+"'>"+data[i].nombre_mun+"</option>");
                                }

                                 $('#municipioss').selectpicker("refresh");

                        });
                    }
                });//estados

                //mostrar las colonias
                $("#municipioss").on("changed.bs.select",function(e){

                    var id=e.target.value;
                    console.log(id);

                    if(id=="selected"){
                        $("#colonia").append("<option value=''>Selecciona un código</option>");
                        console.log("nada");
                    }
                    else{

                        $.get("colonias/" + id, function(data){

                            $("#coloniass").empty();

                            for(i=0; i<data.length ;i++)
                                {
                                    $("#coloniass").append("<option value='" +data[i].id+"'>"+data[i].nombre_col+"</option>");

                                }

                                $('#coloniass').selectpicker("refresh");
                                $('#coloniass').selectpicker();


                        });
                    }
                });


                //mostrar las cp
                $("#coloniass").change(function(e){

                    var id=e.target.value;
                    console.log(id);

                    if(id=="selected"){
                        $("#colonia").append("<option value=''>Selecciona un código</option>");
                        console.log("nada");
                    }
                    else{

                        $.get("cp/" + id, function(data){

                            $("#colonias_cps").empty();

                            for(i=0; i<data.length ;i++)
                                {
                                    $("#colonias_cps").append(" <div class='input-group-prepend' id='colonias_cp'><span class='input-group-text' id='addon-wrapping'>CP</span></div><input type='text' name='cod_lab' readonly value="+data[i].codigo_postal+" class='form-control'> ");
                                }

                        });
                    }
                });



});
</script>





