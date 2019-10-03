@foreach ($use[0]->solteros as $item=>$v)

<tr class="hijos" id="row{{ $loop->index+1 }}">
    <td>
           <div class="input-group flex-nowrap">
                   <div class="input-group-prepend">
                       <span class="input-group-text" id="addon-wrapping">Nombre</span>
                   </div>
                   <input type="text" class="form-control" data-valor="{{ $loop->index+1 }}" name="nombre_hijo[]" id="sol_hijo{{ $loop->index+1 }}" placeholder="Nombre" aria-label="Nombre"
                   aria-describedby="addon-wrapping" value="{{ $v->nombre_hijo }}">
           </div>
     </td>

    <td>
           <div class="input-group flex-nowrap">
                   <div class="input-group-prepend">
                       <span class="input-group-text" id="addon-wrapping">Curp</span>
                   </div>
                   <input type="text" class="form-control" data-valor="{{ $loop->index+1 }}" name="curp_hijo[]" id="curp_hijo{{ $loop->index+1 }}" placeholder="Curp"
                   aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->curp_hijo }}">
           </div>
     </td>

     {{--  <td>
           <div class="col-md-8">
                   <input type="file" class="form-control"  id="carga_curp_hijo"  name="carga_curp_hijo[]" >
                   <input type="hidden" name="rec_img[]" value="{{ $v->carga_curp_hijo }}">
           </div>
       </div>
     </td>  --}}



      <td>
         <div class="row">
          <div class="col-md-5 hijos_index">
                <div class="image-upload-curp-hijo">
                    <label for="file-input-curp-hijo{{ $loop->index+1 }}" >
                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
                    </label>
                    <input id="file-input-curp-hijo{{ $loop->index+1 }}" name="carga_curp_hijo[]" class="cur_hijo" type="file"
                     data-id={{ $loop->index+1 }}  class="form-control" value="{{ $v->carga_curp_hijo }}"/>
                     <input type="hidden" name="rec_img[]" value="{{ $v->carga_curp_hijo }}">
                </div>
          </div>
            <div class="col-md-6">

                    <div id="previa-curp-hijo{{ $loop->index+1 }}">
                    <img src="http://localhost/recursos/public/{{ $v->carga_curp_hijo }}" width="100px" height="70px" alt="">

                    </div>
                    <div class="img_pre-curp-hijo" id="img_pre-curp-hijo{{ $loop->index+1 }}">

                    </div>
            </div>
        </div>
     </td>






    <td><button type="button" name="remove" id="{{ $loop->index+1 }}" class="btn btn-danger btn_remove">X</button></td>
</tr>
@endforeach












