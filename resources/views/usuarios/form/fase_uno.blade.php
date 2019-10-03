    {{-- Mostrar Errorres validacion --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row foto">
            <div class="col-md-2">
                <div id="pre" class="load">

                </div>
            </div>
            <div class="col-md-2">
                    <label class="foto_tex">FOTO</label>
            </div>
            <div class="col-md-5">
                    <input type="file" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}"  name="foto"  id="previo" >
                    <input type="hidden" class="form-control"  name="user_id" value="{{ auth()->user()->id }}" >
            </div>

    </div>

<div class="row">
    <div class="col-md-4">

        <div class="input-group flex-nowrap">

                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Nom</span>
                 </div>
                 <input type="text" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="nom" placeholder="Nombre" value="{{ old('nom') }}" aria-label="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping">
                 {{--  <span>@error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror</span>  --}}

         </div>
     </div>

     <div class="col-md-4">
             <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Ap</span>
                 </div>
                 <input type="text" class="form-control {{ $errors->has('ap') ? ' is-invalid' : '' }}" name="ap"  value="{{ old('ap') }}" id="ap" placeholder="Apellido Paterno" aria-label="Apellido Paterno" aria-describedby="addon-wrapping">
             </div>
             <span id="error_ap" class="error">Falta el Apellido</span>
    </div>


     <div class="col-md-4">
             <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Am</span>
                 </div>
                 <input type="text" class="form-control {{ $errors->has('am') ? ' is-invalid' : '' }}" name="am" id="am" placeholder="Apellido Materno" aria-label="Apellido Materno" value="{{ old('am') }}"aria-describedby="addon-wrapping">
             </div>
     </div>
     <div class="col-md-4">
         <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Pais</span>
             </div>
             <select  name="paises_id" class="form-control pais {{ $errors->has('paises_id') ? ' is-invalid' : '' }}"  data-live-search="true" data-size="7" placeholder="Pais" id="pais">
                     <option value="">Selecciona un Pais</option>
                     @foreach ($pais as $item)
                     <option value="{{ $item->id }}">{{ $item->nombre_pais }}</option>
                     @endforeach
             </select>
         </div>
     </div>
     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Rfc</span>
             </div>
             <input type="text" class="form-control {{ $errors->has('rfc') ? ' is-invalid' : '' }}" value="{{ old('rfc') }}" name="rfc" id="rfc" placeholder="Rfc" aria-label="Apellido Materno" aria-describedby="addon-wrapping">
         </div>
     </div>

     <div class="col-md-4">
         <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Curp</span>
                 </div>
                 <input type="text" class="form-control  {{ $errors->has('curp') ? ' is-invalid' : '' }}" value="{{ old('curp') }}" name="curp" id="curp" placeholder="Rfc" aria-label="Apellido Materno" aria-describedby="addon-wrapping">
         </div>
     </div>


     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Correo Personal</span>
             </div>
             <input type="email" class="form-control  {{ $errors->has('correo_per') ? ' is-invalid' : '' }}" value="{{ old('correo_per') }}"  name="correo_per" id="correo_per" placeholder="Correo Personal" aria-label="Username" aria-describedby="addon-wrapping">
         </div>
     </div>
     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Correo Institucional</span>
             </div>
             <input type="email" class="form-control {{ $errors->has('correo_per') ? ' is-invalid' : '' }}" value="{{ old('correo_ins') }}"  name="correo_ins" id="correo_ins" placeholder="Correo Institucional" aria-label="Username" aria-describedby="addon-wrapping">
         </div>
     </div>
     <div class="col-md-4">
         <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                 <span class="input-group-text" id="addon-wrapping">Casa</span>
             </div>
             <input type="text" class="form-control {{ $errors->has('tel_casa') ? ' is-invalid' : '' }}"  value="{{ old('tel_casa') }}" name="tel_casa" id="tel_casa" placeholder="Telefono de casa" aria-label="Nombre" aria-describedby="addon-wrapping">
         </div>
     </div>

     <div class="col-md-4">
         <div class="input-group flex-nowrap">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="addon-wrapping">Movil</span>
                 </div>
                 <input type="text" class="form-control {{ $errors->has('tel_movil') ? ' is-invalid' : '' }}"  value="{{ old('tel_movil') }}" name="tel_movil" id="tel_movil" placeholder="Telefono movil" aria-label="Nombre" aria-describedby="addon-wrapping">
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
                 <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" aria-label="Nombre" aria-describedby="addon-wrapping">
             {{--  </div>  --}}
     </div>
</div>



    <div class="row rfc">
            <div class="col-md-1">
                    <label class="foto_tex">RFC</label>
            </div>

          <div class="col-md-5">
                <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc" >
          </div>
    </div>

    <div class="row curp">
        <div class="col-md-1">
        <label class="foto_tex">CURP</label>
        </div>
        <div class="col-md-5">
            <input type="file" class="form-control"  name="carga_curp" id="carga_curp" >
        </div>
    </div>

    <div class="row curp">
        <div class="col-md-1">
        <label class="foto_tex">IFE</label>
        </div>
        <div class="col-md-5">
                <input type="file" class="form-control"  name="carga_ife" id="carga_ife" >
        </div>
    </div>





<input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />







