<div class="container">
        <div class="row">
    @foreach ($use[0]->DetalleLaborales as $itemm)
            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Puesto Actual</span>
                            </div>
                        <input type="text" class="form-control" name="puesto_actual" id="puesto_actual" placeholder="Puesto actual"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $itemm->puesto_actual }}">
                    </div>
            </div>


            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Códigos puesto</span>
                            </div>
                        <select  name="codigo_puesto" class="estados_select" placeholder="Código">
                                <option value="">Código</option>
                                @foreach ($cos as $item)
                                <option value="{{ $item->id }}"
                                @if($item->nom_codigos === $ncodi)
                                selected
                                @endif
                                >{{ $item->nom_codigos }}</option>
                                @endforeach
                        </select>
                    </div>
            </div>


            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Niveles</span>
                            </div>
                        <select  name="grado_nivel" class="estados_select" placeholder="niveles">
                                <option value="">Niveles</option>
                                @foreach ($ni as $item)
                                <option value="{{ $item->id }}"
                                @if($item->nom_niveles === $nivell)
                                selected
                                @endif
                                >{{ $item->nom_niveles }}</option>
                                @endforeach
                        </select>
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Dirección General</span>
                            </div>
                        <select  name="direcciones_generales_id" class="estados_select" placeholder="Direccion general">
                                <option value="">Dirección general</option>
                                @foreach ($dg as $item)
                                <option value="{{ $item->id }}"
                                @if($item->nombre_dir_gen === $ndge)
                                selected
                                @endif
                                >{{ $item->nombre_dir_gen }}</option>
                                @endforeach
                        </select>
                    </div>
            </div>


            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Dirección Área</span>
                            </div>
                        <select  name="direcciones_areas_id" class="estados_select" placeholder="Direccion area">
                                <option value="">Dirección Área</option>
                                @foreach ($da as $item)
                                <option value="{{ $item->id }}"
                                @if($item->nombre_dir_are === $ndga)
                                selected
                                @endif
                                >{{ $item->nombre_dir_are }}</option>
                                @endforeach
                        </select>
                    </div>
            </div>


            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha ingreso</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_ultimo" id="fecha_ultimo" placeholder="Último puesto"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $itemm->fecha_ultimo }}">
                    </div>
            </div>

            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha Senasica</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_senasica" id="fecha_senasica" placeholder="Senasica"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $itemm->fecha_senasica }}">
                    </div>
            </div>


            <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                         <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Estado</span>
                        </div>
                        <select  name="est_lab" class="form-control" data-live-search="true" data-size="6" placeholder="Estado" id="estadoss">
                                <option value="">Estado</option>
                                @foreach ($estadoss as $item)
                                <option value="{{ $item->id }}"
                                @if($item->nombre === $nestl)
                                selected
                                @endif
                                >{{ $item->nombre }}</option>
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
                                @foreach ($muns as $item)
                                <option value="{{ $item->id }}"
                                @if($item->nombre_mun === $nmunl)
                                selected
                                @endif
                                >{{ $item->nombre_mun }}</option>
                                @endforeach
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
                                @foreach ($cols as $item)
                                <option value="{{ $item->id }}"
                                @if($item->nombre_col === $ncoll)
                                selected
                                @endif
                                >{{ $item->nombre_col }}</option>
                                @endforeach
                        </select>
                </div>
            </div>


            <div class="col-md-2">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend" id="colonias_cps">
                            <span class="input-group-text" id="addon-wrapping">CP</span>
                        </div>
                        <input type="text" class="form-control" name="cod_lab" id="cod_lab" placeholder="Senasica"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $itemm->cod_lab }}" disabled>
                    </div>
            </div>

            <div class="col-md-6">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Calle</span>
                            </div>
                        <input type="text" class="form-control" name="calle_lab" id="calle_lab"    placeholder="Calle"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $itemm->calle_lab }}">
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Numero</span>
                            </div>
                        <input type="text" class="form-control" name="num_lab" id="num_lab"    placeholder="numero"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $itemm->num_lab }}">
                    </div>
            </div>

            <div class="col-md-5">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha ingreso</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_gobierno" id="fecha_gobierno" placeholder="Gobierno"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $itemm->fecha_gobierno }}">
                    </div>
            </div>


@endforeach





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

                        $.get("../municipios/" + id, function(data){

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

                        $.get("../colonias/" + id, function(data){

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

                        $.get("../cp/" + id, function(data){

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





