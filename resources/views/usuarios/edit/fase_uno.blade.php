    {{-- FASE UNO EDITAR --}}
    {{--  <div class="row foto">
            @foreach ($use as $item)
            <div id="previos">
            <img src="/recursos/public/Fotos/Usuarios/{{ $item->foto }}" width="120px" height="120px" alt="">
            </div>
        @endforeach
            <div class="col-md-2">
                <div id="pre" class="load_editar">

                </div>
            </div>
            <div class="col-md-2">
                    <label class="foto_tex_edi">FOTO</label>
            </div>

            <div class="col-md-5">
                    <input type="file" class="form-control"  name="foto" id="previo" >
                    <input type="hidden" class="form-control"  name="user_id" value="{{ auth()->user()->id }}" >
            </div>

    </div>  --}}

    <div class="row foto">
            <div class="col-md-2">
                    @foreach ($use as $item)
                    <div id="previa_foto">
                    <img src="/recursos/public/Fotos/Usuarios/{{ $item->foto }}" width="120px" height="120px" alt="">
                    </div>
                    <div id="img_pre_foto">

                    </div>
                    @endforeach
            </div>

            <div class="col-md-1">
                    <label class="foto_texto">FOTO</label>
            </div>
        <div class="col-md-6">
                <div class="image-upload-foto">
                    <label for="file-input-foto">
                        {{--  importante el cambio for label  --}}
                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir curp" title ="Click aquí para subir curp" >
                    </label>
                    <input id="file-input-foto" type="file" class="form-control id_curp"  name="foto"/>
                    <input type="hidden" class="form-control"  name="user_id" value="{{ auth()->user()->id }}" >

                </div>
        </div>

    </div>



<div class="row">
    <div class="col-md-4">

        <div class="input-group flex-nowrap">

                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Nom</span>
                 </div>
                 @foreach ($use as $item)
                 <input type="text" class="form-control" name="nom" id="nom" placeholder="Nombre" aria-label="Nombre" aria-label="Nombre"
                 aria-describedby="addon-wrapping" value="{{ $item->nom }}">
                 @endforeach
         </div>
     </div>

     <div class="col-md-4">
             <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Ap</span>
                 </div>
                 @foreach ($use as $item)
                 <input type="text" class="form-control" name="ap" id="ap" placeholder="Apellido Paterno" aria-label="Apellido Paterno"
                 aria-describedby="addon-wrapping" value="{{ $item->ap }}">
                 @endforeach
             </div>
             <span id="error_ap" class="error">Falta el Apellido</span>
    </div>


     <div class="col-md-4">
             <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Am</span>
                 </div>
                 @foreach ($use as $item)
                 <input type="text" class="form-control" name="am" id="am" placeholder="Apellido Materno" aria-label="Apellido Materno"
                  aria-describedby="addon-wrapping" value="{{ $item->am }}">
                 @endforeach
             </div>
     </div>
     <div class="col-md-4">
         <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Pais</span>
             </div>
             <select  name="paises_id" class="form-control pais" data-live-search="true" data-size="7" placeholder="Pais" id="pais">
                     <option value="">Selecciona un Pais</option>
                     @foreach ($paiss as $item)
                     <option value="{{ $item->id }}"
                        @if($item->id === $sel_pais)
                        selected
                        @endif
                        >
                      {{ $item->nombre_pais }}
                    </option>
                     @endforeach
             </select>
         </div>
     </div>

     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Rfc</span>
             </div>
             @foreach ($use as $item)
             <input type="text" class="form-control" name="rfc" id="rfc" placeholder="Rfc" aria-label="Apellido Materno"
              aria-describedby="addon-wrapping" value="{{ $item->rfc }}">
             @endforeach
         </div>
     </div>

     <div class="col-md-4">
         <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Curp</span>
                 </div>
                 @foreach ($use as $item)
                 <input type="text" class="form-control" name="curp" id="curp" placeholder="Rfc" aria-label="Apellido Materno"
                 aria-describedby="addon-wrapping" value="{{ $item->curp }}">
                 @endforeach
         </div>
     </div>


     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">@</span>
             </div>
             @foreach ($use as $item)
             <input type="email" class="form-control"  name="correo_per" id="correo_per" placeholder="Correo Personal" aria-label="Username"
             aria-describedby="addon-wrapping" value="{{ $item->correo_per }}">
             @endforeach
         </div>
     </div>
     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">@</span>
             </div>
             @foreach ($use as $item)
             <input type="email" class="form-control"  name="correo_ins" id="correo_ins" placeholder="Correo Institucional" aria-label="Username"
             aria-describedby="addon-wrapping" value="{{ $item->correo_ins }}">
             @endforeach
         </div>
     </div>
     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Casa</span>
             </div>
             @foreach ($use as $item)
             <input type="text" class="form-control" name="tel_casa" id="tel_casa" placeholder="Telefono de casa" aria-label="Nombre"
             aria-describedby="addon-wrapping" value="{{ $item->tel_casa }}">
             @endforeach
         </div>
     </div>

     <div class="col-md-4">
         <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Movil</span>
                 </div>
                 @foreach ($use as $item)
                 <input type="text" class="form-control" name="tel_movil" id="tel_movil" placeholder="Telefono movil" aria-label="Nombre"
                 aria-describedby="addon-wrapping" value="{{ $item->tel_movil }}">
                 @endforeach
         </div>
     </div>
     <div class="col-md-2">
            <h6 class="foto_tex2">Fecha de Nacimiento</h6>
        </div>
     <div class="col-md-4">
             {{--  <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">  --}}
                     {{--  <span class="input-group-text" id="addon-wrapping">Fecha Nacimiento</span>
                 </div>  --}}
                 @foreach ($use as $item)
                 <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" aria-label="Nombre"
                 aria-describedby="addon-wrapping" value="{{ $item->fecha_nacimiento }}">
                 @endforeach
                 {{--  </div>  --}}
     </div>
</div>



    <div class="row rfc">
            <div class="col-md-1">
                    <label class="foto_tex">RFC</label>
            </div>

          <div class="col-md-5">
                <div class="image-upload">
                    <label for="file-input">
                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
                    </label>
                    <input id="file-input" type="file"  class="form-control" name="carga_rfc"/>
                </div>
          </div>
          <div class="col-md-6">
                @foreach ($use as $item)
                <div id="previa">
                <img src="http://localhost/recursos/public/{{ $item->carga_rfc }}" width="200px" alt="">
                {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
                </div>
                <div id="img_pre">

                </div>
                @endforeach
          </div>
    </div>

    <div class="row curp">
        <div class="col-md-1">
                <label class="foto_tex">CURP</label>
        </div>

      <div class="col-md-5">
            <div class="image-upload-curp">
                <label for="file-input-curp">
                    {{--  importante el cambio for label  --}}
                    <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir curp" title ="Click aquí para subir curp" >
                </label>
                <input id="file-input-curp" type="file" class="form-control id_curp"  name="carga_curp"/>
            </div>
      </div>
      <div class="col-md-6">
            @foreach ($use as $item)
            <div id="previa_curp">
            <img src="http://localhost/recursos/public/{{ $item->carga_curp }}" width="200px" alt="">
            {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
            </div>
            <div id="img_pre_curp">

            </div>
            @endforeach
      </div>
</div>

    <div class="row ife">
            <div class="col-md-1">
                    <label class="foto_tex">IFE</label>
            </div>

        <div class="col-md-5">
                <div class="image-upload-ife">
                    <label for="file-input-ife">
                        {{--  importante el cambio for label  --}}
                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir ife" title ="Click aquí para subir ife" >
                    </label>
                    <input id="file-input-ife" type="file" class="form-control id_ife"  name="carga_ife"/>
                </div>
        </div>
        <div class="col-md-6">
                @foreach ($use as $item)
                <div id="previa_ife">
                <img src="http://localhost/recursos/public/{{ $item->carga_ife }}" width="200px" alt="">
                {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
                </div>
                <div id="img_pre_ife">

                </div>
                @endforeach
        </div>
    </div>

    {{--  <div class="row curp">
        <div class="col-md-1">
        <label class="foto_tex">CURP</label>
        </div>
        <div class="col-md-5">
            <input type="file" class="form-control"  name="carga_curp" id="carga_curp" >
        </div>
    </div>  --}}

    {{--  <div class="row curp">
        <div class="col-md-1">
        <label class="foto_tex">IFE</label>
        </div>
        <div class="col-md-5">
                <input type="file" class="form-control"  name="carga_ife" id="carga_ife" >
        </div>
    </div>  --}}





<input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />







