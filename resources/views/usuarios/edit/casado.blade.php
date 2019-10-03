{{-- EDITAR ESTADO CASADO --}}
<h4>Información del Conyuge editar</h4>
<div class="row">
        <div class="col-md-4">
            @foreach($use[0]->conyuges as $item=>$v)
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Nombres</span>
                </div>
                <input type="text" class="form-control" name="nombres_coy" id="nombres_coy" placeholder="Nombres" aria-label=""
                aria-describedby="addon-wrapping" value="{{ $v->nombres_coy }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Apellido</span>
                    </div>
                <input type="text" class="form-control" name="primero_coy" id="primero_coy"    placeholder="Paterno" aria-label="Nombre"
                aria-describedby="addon-wrapping" value="{{ $v->primero_coy }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Apellido</span>
                    </div>
                <input type="text" class="form-control" name="segundo_coy" id="segundo_coy"    placeholder="Materno" aria-label="Nombre"
                aria-describedby="addon-wrapping" value="{{ $v->segundo_coy }}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Curp</span>
                    </div>
                <input type="text" class="form-control" name="curp_coy" id="curp_coy"    placeholder="Curp" aria-label="Nombre"
                aria-describedby="addon-wrapping" value="{{ $v->curp_coy }}">
            </div>
        </div>


      <div class="row curp">
            <div class="col-md-1">
                    <label class="foto_tex">CURP</label>
            </div>

          <div class="col-md-5">
                <div class="image-upload-curp">
                    <label for="file-input-curp_coy">
                        {{--  importante el cambio for label  --}}
                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir curp" title ="Click aquí para subir curp" >
                    </label>
                    <input id="file-input-curp_coy" type="file" class="form-control id_curp"  name="carga_curp_coy"/>
                </div>
          </div>
          <div class="col-md-6">
                <div id="previa_curp_coy">
                <img src="http://localhost/recursos/public/{{ $v->carga_curp_coy }}" width="200px" alt="">
                {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
                </div>
                <div id="img_pre_curp_coy">

                </div>

          </div>
    </div>
      @endforeach

</div>
{{-- row --}}

<h4>Tienes Hijos</h4><br>
<td><button type="button" name="addHijos" id="addHijos" class="btn btn-success">+</button></td>

<div class="row">
        <table class="table table-bordered" id="dynamic_hijos">
                @foreach($use[0]->HijosConyuges as $item=>$v)
                <tr>
                        <td>
                                <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping">Nombre</span>
                                        </div>
                                        <input type="text" class="form-control nombre_hijo_coy" name="nombre_hijo_coy[]" id="hijo"   placeholder="Nombre" aria-label="Nombre"
                                        aria-describedby="addon-wrapping" value="{{ $v->nombre_hijo_coy }}">
                                </div>
                        </td>
                        <td>
                                <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="addon-wrapping">Edad</span>
                                        </div>
                                       <input type="text" class="form-control" name="edad_hijo_coy[]" id="edad"  placeholder="Edad" aria-label="Nombre"
                                       aria-describedby="addon-wrapping" value="{{ $v->edad_hijo_coy }}">
                                </div>
                        </td>
                </tr>
                @endforeach

        </table>

</div>


<h4>Familiares Descendientes</h4>
<button type="button" name="add" id="addViudo" class="btn btn-success">+</button>
<table class="table table-bordered" id="ifc">
        {{-- @foreach($use[0]->Descensientes as $item=>$v) --}}
        @foreach($use[0]->DependientesCasados as $item)
        <tr>
                <td>
                    <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Nombre</span>
                                </div>
                                <input type="text" class="form-control" name="nombre_dep[]" id="hijo"   placeholder="Nombre" aria-label="Nombre"
                                aria-describedby="addon-wrapping" value="{{ $item->nombre_dep }}">
                    </div>
                </td>
                <td>
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Ap</span>
                            </div>
                            <input type="text" class="form-control" name="ap_dep[]" id="edad"    placeholder="Paterno" aria-label="Nombre"
                            aria-describedby="addon-wrapping" value="{{ $item->ap_dep }}" >
                    </div>
                </td>
                <td>
                         <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Ap</span>
                                </div>
                                <input type="text" class="form-control" name="am_dep[]" id="edad"    placeholder="Materno" aria-label="Nombre"
                                aria-describedby="addon-wrapping" value="{{ $item->am_dep }}">
                        </div>
                     </td>
        </tr>
        @endforeach

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
        $(document).on('click', '#addViudo', function(){
             i++;
             $('#ifc').append('<tr class="muertos" id="row'+i+'">'+
                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Nombre</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="nombre_des[]" id="des_nom'+i+'" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                  '</td>'+
                  '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Ap</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="ap_des[]" id="des_ap'+i+'" placeholder="Paterno" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                 '</td>'+

                 '<td>'+
                        '<div class="input-group flex-nowrap">'+
                                '<div class="input-group-prepend">'+
                                    '<span class="input-group-text" id="addon-wrapping">Ap</span>'+
                                '</div>'+
                                '<input type="text" class="form-control" data-valor="'+i+'" name="am_des[]" id="des_am'+i+'" placeholder="Materno" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                        '</div>'+
                 '</td>'+
                 '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#row'+button_id+'').remove();
        });







</script>

