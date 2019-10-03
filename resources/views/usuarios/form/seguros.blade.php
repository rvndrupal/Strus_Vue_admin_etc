<div class="container">
        <div class="row">

            <div class="col-md-9">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Numero de Seguridad Social</span>
                            </div>
                        <input type="text" class="form-control" name="num_seg" id="num_seg"    placeholder="Numero" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>

            <div class="col-md-9">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Tipo de Sangre ?</span>
                            </div>
                        <input type="text" class="form-control" name="tipo_seg" id="tipo_seg"    placeholder="Sangre" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>

            <div class="col-md-12">
                <h4 class="tit_enf">Sufre de alguna Enfermedad</h4>
                <div class="form-check">
                        <input class="form-check-inputce" style="" type="radio" name="enf_seg" id="enf_seg" value="si">
                        <label class="form-check-label" for="nivel_ingles">
                        Si
                        </label>
                </div>
                <div class="form-check">
                        <input class="form-check-inputcr" style="" type="radio" name="enf_seg" id="enf_seg" value="no">
                        <label class="form-check-label" for="nivel_ingles">
                        No
                        </label>
                </div>
            </div>

            <div class="col-md-12">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Cual ?</span>
                            </div>
                        <input type="text" class="form-control" name="cual_enf_seg" id="cual_enf_seg"    placeholder="Cual" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div>
            </div>




            <div class="col-md-12">
                    <h4 class="tit_enff">Sufre de alguna Discapacidad</h4>
                    <div class="form-check">
                            <input class="form-check-inputce" style="" type="radio" name="dis_seg" id="dis_seg" value="si">
                            <label class="form-check-label" for="nivel_ingles">
                            Si
                            </label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-inputcr" style="" type="radio" name="dis_seg" id="dis_seg" value="no">
                            <label class="form-check-label" for="nivel_ingles">
                            No
                            </label>
                    </div>
                </div>

                <div class="col-md-12">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Cual ?</span>
                                </div>
                            <input type="text" class="form-control" name="cual_dis_seg" id="cual_dis_seg"    placeholder="Cual" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>
                <div class="col-md-12">
                    <h4 class="tit_eme">Contacto de Emergencia</h4><p></p>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Nombre</span>
                                </div>
                            <input type="text" class="form-control" name="nom_seg" id="nom_seg"    placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Apelllido</span>
                                </div>
                            <input type="text" class="form-control" name="pri_seg" id="pri_seg"    placeholder="Paterno" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Apellido</span>
                                </div>
                            <input type="text" class="form-control" name="seg_seg" id="seg_seg"    placeholder="Materno" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Parentesco</span>
                                </div>
                            <input type="text" class="form-control" name="par_seg" id="par_seg"    placeholder="Parentesco" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Email</span>
                                </div>
                            <input type="text" class="form-control" name="email_seg" id="email_seg"    placeholder="Email" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Teléfono</span>
                                </div>
                            <input type="text" class="form-control" name="tel_seg" id="tel_seg"    placeholder="Casa" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>

                <div class="col-md-4">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Movil</span>
                                </div>
                            <input type="text" class="form-control" name="mov_seg" id="mov_seg"    placeholder="Movil" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div>
                </div>


















    </div>{{-- row --}}
</div>{{-- -container --}}


<script>
        $(document).ready(function(){

                //mostrar estado
                $("#estadoss").change(function(e){

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

                        });
                    }
                });//estados

                //mostrar las colonias
                $("#municipioss").change(function(e){

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





