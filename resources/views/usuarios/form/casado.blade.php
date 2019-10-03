<div id="hijosCasado">
    <h4>Información del Conyuge</h4>
    <div class="row">

            <div class="col-md-4">

                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Nombres</span>
                    </div>
                    <input type="text" class="form-control" name="nombres_coy" id="nombres_coy" placeholder="Nombres" aria-label="" aria-describedby="addon-wrapping">
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Apellido</span>
                        </div>
                    <input type="text" class="form-control" name="primero_coy" id="primero_coy"    placeholder="Paterno" aria-label="Nombre" aria-describedby="addon-wrapping">
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Apellido</span>
                        </div>
                    <input type="text" class="form-control" name="segundo_coy" id="segundo_coy"    placeholder="Materno" aria-label="Nombre" aria-describedby="addon-wrapping">
                </div>
            </div>

            <div class="col-md-5">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Curp</span>
                        </div>
                    <input type="text" class="form-control" name="curp_coy" id="curp_coy"    placeholder="Curp" aria-label="Nombre" aria-describedby="addon-wrapping">
                </div>
            </div>

            <div class="col-md-2">
                    <label class="foto_tex text3">CURP</label>
            </div>

        <div class="col-md-5">
                <input type="file" class="form-control"  name="carga_curp_coy" id="carga_curp_coy">
        </div>

    </div>
</div>




    <h4>Tienes Hijos</h4><br>
    <td><button type="button" name="addHijos" id="addHijos" class="btn btn-success">+</button></td>

    <div class="row">

            <table class="table table-bordered" id="dynamic_hijos">

                    <tr>
                            {{-- <td>
                                    <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Nombre</span>
                                            </div>
                                            <input type="text" class="form-control nombre_hijo_coy" name="nombre_hijo_coy[]" id="hijo"   placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">
                                    </div>
                            </td>
                            <td>
                                    <div class="input-group flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="addon-wrapping">Edad</span>
                                            </div>
                                        <input type="text" class="form-control" name="edad_hijo_coy[]" id="edad"    placeholder="Edad" aria-label="Nombre" aria-describedby="addon-wrapping">
                                    </div>
                            </td> --}}


                    </tr>

            </table>

    </div>




<h4>Familiares Dependientes</h4>

<table class="table table-bordered" id="ifc">

        <tr>

                {{-- <td> --}}
                        {{-- <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Nombre</span>
                                </div>
                                <input type="text" class="form-control" name="nombre_des[]" id="hijo"   placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div> --}}
                {{-- </td>
                <td> --}}
                    {{-- <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Ap</span>
                            </div>
                            <input type="text" class="form-control" name="ap_des[]" id="edad"    placeholder="Paterno" aria-label="Nombre" aria-describedby="addon-wrapping">
                    </div> --}}
                {{-- </td>
                <td> --}}
                        {{-- <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Ap</span>
                                </div>
                                <input type="text" class="form-control" name="am_des[]" id="edad"    placeholder="Materno" aria-label="Nombre" aria-describedby="addon-wrapping">
                        </div> --}}
                    {{-- </td> --}}
                {{-- <td><button type="button" name="add" id="addViudo" class="btn btn-success">+</button></td> --}}

                <button type="button" name="add" id="addViudos" class="btn btn-success">+</button>

        </tr>

</table>




<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script>


        var i=0;
        $(document).on('click', '#addHijos', function(){
             i++;

             $('#dynamic_hijos').append('<tr class="recorrer" id="row'+i+'">'+

                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Nombre</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="nombre_hijo_coy[]" id="hijoc'+i+'" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                  '</td>'+
                  '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Edad</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="edad_hijo_coy[]" id="edadc'+i+'" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                 '</td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

        });
        $(document).on('click', '.btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#row'+button_id+'').remove();
        });


        var i=1;
        $(document).on('click', '#addViudos', function(){
             i++;
             $('#ifc').append('<tr class="muertos" id="row'+i+'">'+
                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Nombre</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="nombre_dep[]" id="dep_nom'+i+'" placeholder="Nombres" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                  '</td>'+
                  '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Ap</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="ap_dep[]" id="dep_ap'+i+'" placeholder="Paterno" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                 '</td>'+

                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Ap</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="am_dep[]" id="dep_am'+i+'" placeholder="Materno" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                 '</td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#row'+button_id+'').remove();
        });







</script>

