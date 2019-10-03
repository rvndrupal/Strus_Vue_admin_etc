

<div class="field_wrapper">

            <div class="col-md-12">
                <a href="#" class="add_button btn btn-success" style="margin: -96px 0 7px 926px;;" title="Add field">Agregar Carrera</a>
            </div>
            @foreach ($use[0]->DetalleEscolaridades as $item=>$v)
              <div class="container" style=" border: 1px solid #00000036; padding: 23px; margin: 0 0 17px 0px;">

                 <div class="row">

                        <div class="col">
                                <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Grado</span>
                                    </div>
                                    <select  name="grados_id[]" class="estados_select" placeholder="Escolar">
                                            <option value="">Escolar</option>

                                            @foreach ($gradoss as $item)
                                                <option value="{{ $item->id }}"
                                                        @if($item->id === $v->grados_id)
                                                        selected
                                                        @endif
                                                    >
                                                {{ $item->nom_gra }}
                                                </option>

                                            @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="col">
                                <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Carrera</span>
                                    </div>
                                    <select  name="carreras_id[]" class="estados_select" placeholder="Carrera">
                                            <option value="">Carrera</option>
                                            @foreach ($carrerass as $item)
                                            <option value="{{ $item->id }}"
                                            @if($item->id === $v->carreras_id)
                                            selected
                                            @endif
                                            >
                                            {{ $item->nom_car }}
                                            </option>
                                            @endforeach
                                    </select>
                                </div>

                        </div>

                        <div class="col-md-4">
                            <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Cedula</span>
                                    </div>

                                <input type="text" class="form-control" name="cedula[]" id="cedula"    placeholder="Cedula profesional"
                                aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->cedula }}">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Escuela</span>
                                </div>
                                <select  name="escuelas_id[]" class="estados_select" placeholder="Escuelas">
                                        <option value="">Escuela</option>
                                        @foreach ($escuelass as $item)
                                        <option value="{{ $item->id }}"
                                        @if($item->id === $v->escuelas_id)
                                        selected
                                        @endif
                                        >{{ $item->nombre_escuela }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Título</span>
                                </div>
                                <select  name="titulos_id[]" class="estados_select" placeholder="Profesional">
                                        <option value="">Título</option>
                                        @foreach ($tituloss as $item)
                                        <option value="{{ $item->id }}"
                                        @if($item->id === $v->titulos_id)
                                        selected
                                        @endif
                                        >{{ $item->nombre_titulo }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>


                            <div class="col-md-1">
                                <h6 class="foto_tex2">TÍTULO</h6>
                            </div>
                            <div class="col-md-2 id_titulo">
                                <div class="image-upload-carga-titulo">
                                    <label for="file-input-carga-titulo{{ $loop->index+1 }}">
                                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
                                    </label>
                                    <input id="file-input-carga-titulo{{ $loop->index+1 }}" class="cur_hijo" type="file"  data-id={{ $loop->index+1 }} class="form-control" name="carga_titulo[]"/>
                                    <input type="hidden" name="rec_titulo[]" value="{{ $v->carga_titulo }}">
                                </div>
                            </div>
                            <div class="col-md-3">

                                    <div id="previa-carga-titulo{{ $loop->index+1 }}">
                                    <img src="http://localhost/recursos/public/{{ $v->carga_titulo }}" width="100px" height="70px" alt="">
                                    {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
                                    </div>
                                    <div class="img_pre-carga-titulo" id="img_pre-carga-titulo{{ $loop->index+1 }}">

                                    </div>

                            </div>

                            <div class="col-md-1">
                                    <h6 class="foto_tex2">CÉDULA</h6>
                            </div>
                            <div class="col-md-2 id_cedula">
                                <div class="image-upload-carga-cedula">
                                    <label for="file-input-carga-cedula{{ $loop->index+1 }}">
                                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
                                    </label>
                                    <input id="file-input-carga-cedula{{ $loop->index+1 }}" class="cur_hijo" type="file" data-id={{ $loop->index+1 }}  class="form-control" name="carga_cedula[]"/>
                                    <input type="hidden" name="rec_cedula[]" value="{{ $v->carga_cedula }}">
                                </div>
                            </div>
                            <div class="col-md-3">

                                    <div id="previa-carga-cedula{{ $loop->index+1 }}">
                                    <img src="http://localhost/recursos/public/{{ $v->carga_cedula }}" width="100px" height="70px" alt="">
                                    {{--  <input type="file" class="form-control"  id="carga_rfc"  name="carga_rfc">  --}}
                                    </div>
                                    <div class="img_pre-carga-cedula" id="img_pre-carga-cedula{{ $loop->index+1 }}">

                                    </div>

                            </div>


            </div>
            <a href="#" class="btn btn-sm btn btn-danger remove_button" style="margin: 0 0 0 97%;" >X</a>
        </div>
        @endforeach

</div>







{{-- Alta Escolaridad --}}
<script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function(){

        var i=0;
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="destino">'+

         '<div class="container escolaridad" style=" border: 1px solid #00000036; padding: 23px; margin: 0 0 17px 0px;">'+
            '<div class="row">'+
            '<div class="col-md-4">'+
                    '<div class="input-group flex-nowrap">'+
                            '<div class="input-group-prepend">'+
                           ' <span class="input-group-text" id="addon-wrapping">Grado</span>'+
                       ' </div>'+
                        '<select  name="grados_id[]" class="form-control"  id="grados" placeholder="Escolar">'+
                                '<option value="">Grado</option>'+
                               ' @foreach ($gradoss as $item)'+
                               ' <option value="{{ $item->id }}">{{ $item->nom_gra }}</option>'+
                              '  @endforeach'+
                       ' </select>'+
                  '  </div>'+
            '</div>'+

            '<div class="col-md-4">'+
                    '<div class="input-group flex-nowrap">'+
                            '<div class="input-group-prepend">'+
                            '<span class="input-group-text" id="addon-wrapping">Carrera</span>'+
                        '</div>'+
                        '<select  name="carreras_id[]" class="form-control"  id="carreras" placeholder="Carrera">'+
                                '<option value="">Carrera</option>'+
                               ' @foreach ($carrerass as $item)'+
                                '<option value="{{ $item->id }}">{{ $item->nom_car }}</option>'+
                                '@endforeach'+
                       ' </select>'+
                   ' </div>'+
           ' </div>'+

           '<div class="col-md-4">'+
                '<div class="input-group flex-nowrap">'+
                        '<div class="input-group-prepend">'+
                            '<span class="input-group-text" id="addon-wrapping">Cedula</span>'+
                       ' </div>'+
                    '<input type="text" class="form-control" name="cedula[]" id="cedula"    placeholder="Cedula profesional" aria-label="Nombre" aria-describedby="addon-wrapping">'+
               ' </div>'+
          '  </div>'+

            '<div class="col-md-6">'+
               ' <div class="input-group flex-nowrap">'+
                       ' <div class="input-group-prepend">'+
                        '<span class="input-group-text" id="addon-wrapping">Escuela</span>'+
                    '</div>'+
                    '<select  name="escuelas_id[]" class="form-control" id="escuelas" placeholder="Escuelas">'+
                           ' <option value="">Escuela</option>'+
                           ' @foreach ($escuelass as $item)'+
                            '<option value="{{ $item->id }}">{{ $item->nombre_escuela }}</option>'+
                            '@endforeach'+
                    '</select>'+
               ' </div>'+
            '</div>'+

            '<div class="col-md-6">'+
                '<div class="input-group flex-nowrap">'+
                        '<div class="input-group-prepend">'+
                       ' <span class="input-group-text" id="addon-wrapping">Título</span>'+
                   ' </div>'+
                    '<select  name="titulos_id[]" class="form-control" id="titulos" placeholder="Profesional">'+
                            '<option value="">Título</option>'+
                           ' @foreach ($tituloss as $item)'+
                           ' <option value="{{ $item->id }}">{{ $item->nombre_titulo }}</option>'+
                           ' @endforeach'+
                   ' </select>'+
                 '</div>'+
            '</div>'+



               '<div class="col-md-2">'+
                      '  <label class="tit">Título</label>'+
               '</div>'+

                '<div class="col-md-10">'+
                   ' <input type="file" class="form-control"  id="titulo_pro"  name="carga_titulo[]" >'+
                   '<input type="hidden" name="rec_titulo[]" value="{{ $v->carga_titulo }}">'+
               '</div>'+


       '<div class="col-md-2">'+
            '  <label class="ced">Cédula</label>'+
        '</div>'+

        '<div class="col-md-10">'+
            ' <input type="file" class="form-control"  id="cedula"  name="carga_cedula[]" >'+
            ' <input type="hidden" name="rec_cedula[]" value="{{ $v->carga_cedula }}">'+
        '</div>'+




       '</div>'+
        '<a href="#" class="btn btn-sm btn btn-danger remove_button" style="margin: 0 0 0 97%;" >X</a>'+
        '</div>'+
'</div>';



        var x = 1;
      //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter


                $(wrapper).append(fieldHTML); // Add field html
                 // Add field html
                 $(".destino").removeClass('destino').addClass(""+x);
                 $("#grados").attr("data-valor",""+x);
                 $("#grados").attr('id','grados'+x);
                 $("#carreras").attr("data-valor",""+x);
                 $("#carreras").attr('id','carreras'+x);
                 $("#cedula").attr("data-valor",+x);
                 $("#cedula").attr('id','cedula'+x);
                 $("#escuelas").attr("data-valor",+x);
                 $("#escuelas").attr('id','escuelas'+x);
                 $("#titulos").attr("data-valor",+x);
                 $("#titulos").attr('id','titulos'+x);
                 $("#titulo_pro").attr("data-valor",+x);
                 $("#titulo_pro").attr('id','titulo_pro'+x);
                 $("#cedula").attr("data-valor",+x);
                 $("#cedula").attr('id','cedula'+x);
            }
         });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
});

</script>
