<h4>Información del Conyuge</h4>
<div class="row">
        @foreach($use[0]->conyuges as $item)
        <div class="col-md-4">

            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Nombres</span>
                </div>
                <input type="text" class="form-control" name="nombres_coy" id="nombres_coy" placeholder="Nombres" aria-label=""
                aria-describedby="addon-wrapping" value="{{ $item->nombres_coy }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Apellido</span>
                    </div>
                <input type="text" class="form-control" name="primero_coy" id="primero_coy"    placeholder="Paterno" aria-label="Nombre"
                aria-describedby="addon-wrapping" value="{{ $item->primero_coy }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Apellido</span>
                    </div>
                <input type="text" class="form-control" name="segundo_coy" id="segundo_coy"    placeholder="Materno" aria-label="Nombre"
                aria-describedby="addon-wrapping" value="{{ $item->segundo_coy }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Curp</span>
                    </div>
                <input type="text" class="form-control" name="curp_coy" id="curp_coy"    placeholder="Curp" aria-label="Nombre" aria-describedby="addon-wrapping"
                value="{{ $item->curp_coy }}">
            </div>
        </div>

        {{-- <div class="col-md-2">
                <label class="foto_tex text3">CURP</label>
        </div>

        <div class="col-md-5">
                <input type="file" class="form-control"  name="carga_curp_coy" id="carga_curp_coy">
        </div> --}}

        <div class="row">
                <div class="col-md-2">
                        <label class="foto_tex">CURP</label>
                </div>

              <div class="col-md-4">
                    <div class="image-upload-curp-coy">
                        <label for="file-input-curp-coy">
                            <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
                        </label>
                        <input id="file-input-curp-coy" type="file"  class="form-control" name="carga_curp_coy"/>
                        <input type="hidden" name="rec_curp_coy" value="{{ $item->carga_curp_coy }}">

                    </div>
              </div>
              <div class="col-md-4">

                    <div id="previa-curp-coy">
                    <img src="http://localhost/recursos/public/{{ $item->carga_curp_coy }}" width="130px" height="100px" alt="">
                    {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
                    </div>
                    <div id="img_pre-curp-coy">

                    </div>

              </div>
        </div>
    @endforeach

</div>
