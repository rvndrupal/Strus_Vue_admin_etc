<div class="col-md-4">
        <div class="input-group flex-nowrap">
             <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Estado</span>
            </div>
            <select  name="estados_id" class="form-control estado" data-live-search="true" data-size="7" placeholder="Estado" id="estado">
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
                <span class="input-group-text"  id="addon-wrapping">Municipio</span>
            </div>
            <select class="form-control mun" data-live-search="true" data-size="7" name="municipios_id" placeholder="Colonia" id="municipios">
                    <option value="">Municipio</option>
            </select>
    </div>
</div>

<div class="col-md-4">
    <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Colonia</span>
            </div>
            <select class="form-control" name="colonias_id"  data-live-search="true" data-size="7" placeholder="codigo" id="colonias">
                    <option value="">Colonia</option>
            </select>
    </div>
</div>

<div class="col-md-2">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend" id="colonias_cp">
                <span class="input-group-text" id="addon-wrapping">CP</span>
            </div>
            {{--  <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo postal">  --}}
        </div>
</div>
<div class="col-md-8">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">Calle</span>
            </div>
            <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle" aria-label="Apellido Materno" aria-describedby="addon-wrapping">
        </div>
</div>

<div class="col-md-2">
    <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">'#'</span>
            </div>
            <input type="text" class="form-control" name="numero" id="numero" placeholder="Num" aria-label="Apellido Materno" aria-describedby="addon-wrapping">
    </div>
</div>





    <div class="col-md-6">
            <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Fecha Domicilio</span>
                    </div>
                    <input type="date" class="form-control" name="fecha_domicilio" id="fecha_domicilio" placeholder="Fecha" aria-label="Nombre" aria-describedby="addon-wrapping">
            </div>
    </div>



</div>{{-- row --}}

<div class="row rfc">
        <div class="col-md-2">
                <label class="foto_tex text2">DOMICILIO</label>
        </div>

      <div class="col-md-5">
            <input type="file" class="form-control dom"  id="carga_domicilio"  name="carga_domicilio" >
      </div>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" id="validar" class="next action-button" value="Siguiente" />
