{{--  EDITAR FASE DOS  --}}
<div class="col-md-4">
        <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Estado</span>
            </div>
            <select  name="estados_id" class="form-control estado" data-live-search="true" data-size="7" placeholder="Estado" id="estado">
                    <option value="">Estado</option>
                    @foreach ($estadoss as $item)
                    <option value="{{ $item->id }}"
                    @if($item->id === $s_est)
                    selected
                    @endif
                    >
                    {{ $item->nombre }}
                    </option>
                    @endforeach
            </select>
           </div>
</div>


<div class="col-md-4">
        <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Municipio</span>
            </div>
            <select  name="municipios_id" class="form-control mun" data-live-search="true" data-size="7" placeholder="Municipio" id="municipios">
                    <option value="">Municipio</option>
                    @foreach ($muns as $item)
                    <option value="{{ $item->id }}"
                    @if($item->id === $s_mun)
                    selected
                    @endif
                    >
                    {{ $item->nombre_mun }}
                    </option>
                    @endforeach
            </select>
           </div>
</div>




{{--  <div class="col-md-4">
    <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text"  id="addon-wrapping">Municipio</span>
            </div>
            <select class="form-control mun" data-live-search="true" data-size="7" name="municipios_id" placeholder="Colonia" id="municipios">
                    <option value="">Municipio</option>
            </select>
    </div>
</div>  --}}

<div class="col-md-4">
        <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Colonia</span>
            </div>
            <select  name="colonias_id" class="form-control" data-live-search="true" data-size="7" placeholder="Colonias" id="colonias">
                    <option value="">Municipio</option>
                    @foreach ($cols as $item)
                    <option value="{{ $item->id }}"
                    @if($item->id === $s_col)
                    selected
                    @endif
                    >
                    {{ $item->nombre_col }}
                    </option>
                    @endforeach
            </select>
           </div>
</div>


{{--  <div class="col-md-4">
    <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Colonia</span>
            </div>
            <select class="form-control" name="colonias_id"  data-live-search="true" data-size="7" placeholder="codigo" id="colonias">
                    <option value="">Colonia</option>
            </select>
    </div>
</div>  --}}



<div class="col-md-2">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend" id="colonias_cp">
                <span class="input-group-text" id="addon-wrapping">CP</span>
            </div>
            @foreach ($use as $item)
            <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo postal" value="{{ $item->colonias->codigo_postal }}" disabled>
            @endforeach
         </div>
</div>


<div class="col-md-8">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Calle</span>
            </div>
            @foreach ($use as $item)
            <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle" aria-label="Calle"
            aria-describedby="addon-wrapping" value="{{ $item->calle }}">
            @endforeach
        </div>
</div>

<div class="col-md-2">
    <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">'#'</span>
            </div>
            @foreach ($use as $item)
            <input type="text" class="form-control" name="numero" id="numero" placeholder="Num" aria-label="Numero"
            aria-describedby="addon-wrapping" value="{{ $item->numero }}">
            @endforeach
    </div>
</div>

<div class="col-md-6">
        <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">Fecha Domicilio</span>
                </div>
                <input type="date" class="form-control" name="fecha_domicilio" id="fecha_domicilio" placeholder="Fecha" aria-label="Nombre"
                aria-describedby="addon-wrapping" value="{{ $item->fecha_domicilio }}">
        </div>
</div>



</div>
{{-- row --}}

{{-- <div class="row rfc">
        <div class="col-md-2">
                <label class="foto_tex text2">DOMICILIO</label>
        </div>

      <div class="col-md-5">
            <input type="file" class="form-control dom"  id="carga_domicilio"  name="carga_domicilio" >
      </div>
</div>  --}}

<div class="row domicilio">
        <div class="col-md-1">
                <label class="foto_tex">DOMICILIO</label>
        </div>

    <div class="col-md-5">
            <div class="image-upload-domicilio">
                <label for="file-input-domicilio">
                    {{--  importante el cambio for label  --}}
                    <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir domicilio" title ="Click aquí para subir domicilio" >
                </label>
                <input id="file-input-domicilio" type="file" class="form-control id_domicilio"  name="carga_domicilio"/>
            </div>
    </div>
    <div class="col-md-6">
            @foreach ($use as $item)
            <div id="previa_domicilio">
            <img src="http://localhost/recursos/public/{{ $item->carga_domicilio }}" width="200px" alt="">
            {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
            </div>
            <div id="img_pre_domicilio">

            </div>
            @endforeach
    </div>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />
