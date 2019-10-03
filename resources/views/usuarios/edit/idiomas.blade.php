

{{-- -Idiomas --}}
<div class="field_wrapper2" style="width:100%" ">


        <h2 class="fs-title" style="margin: 81px 0px 0 0;">IDIOMAS</h2>

        <a href='#' class="add_button2 btn btn-success" style="margin: 0 0 7px 932px;" title="Add field">Agregar Idiomas</a>
        @foreach ($use[0]->DetalleIdiomas as $item=>$v)
        <div class="container idiomas">

                  <div class="col-md-12">
                        <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Idioma</span>
                                </div>
                            <select  name="idiomas_id[]" class="estados_select" placeholder="Escolar">
                                    <option value="">Idioma</option>
                                    @foreach ($idiomass as $item)
                                    <option value="{{ $item->id }}"
                                    @if($item->id === $v->idiomas_id)
                                    selected
                                    @endif
                                    >{{ $item->nombre_idioma }}</option>
                                    @endforeach
                            </select>
                        </div>
                </div>


            <h5 style=" margin: 5px 0 0 -82%;">Dominio del Idioma</h5>
                <div class="row">
                    <div class="col-md-2">

                        <div class="form-check">
                                @if($v->nivel_ingles === "0%")
                                <input class="form-check-inputce" style="margin: 0 0 0 -28px;" type="checkbox" name="nivel_ingles[]" id="nivel_ingles1" value="0%" checked>
                                @else
                                <input class="form-check-inputce" style="margin: 0 0 0 -28px;" type="checkbox" name="nivel_ingles[]" id="nivel_ingles1" value="0%">
                                @endif
                                <label class="form-check-label" for="nivel_ingles">
                                0%
                                </label>
                        </div>

                        <div class="form-check">
                                @if($v->nivel_ingles === "25%")
                                <input class="form-check-input" type="checkbox" name="nivel_ingles[]" id="nivel_ingles1" value="25%" checked>
                                @else
                                <input class="form-check-input" type="checkbox" name="nivel_ingles[]" id="nivel_ingles1" value="25%">
                                @endif
                                <label class="form-check-label" for="nivel_ingles">
                                25%
                                </label>
                        </div>

                        <div class="form-check">
                                @if($v->nivel_ingles === "50%")
                                <input class="form-check-input" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="50%" checked>
                                @else
                                <input class="form-check-input" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="50%">
                                @endif
                                <label class="form-check-label" for="nivel_ingles">
                                50%
                                </label>
                        </div>

                        <div class="form-check">
                                @if($v->nivel_ingles === "75%")
                                <input class="form-check-input" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="75%" checked>
                                @else
                                <input class="form-check-input" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="75%">
                                @endif

                                <label class="form-check-label" for="nivel_ingles">
                                75%
                                </label>
                        </div>

                        <div class="form-check">
                                @if($v->nivel_ingles === "100%")
                                <input class="form-check-inputc" style="margin: 0 0 0 -13px;" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="100%" checked>
                                @else
                                <input class="form-check-inputc" style="margin: 0 0 0 -13px;" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="100%">
                                @endif
                                <label class="form-check-label" for="nivel_ingles">
                                100%
                                </label>
                        </div>
                    </div>
                </div>

                <div class="row cer_idioma">
                    <div class="col-md-1">
                            <h6 class="foto_tex2">CERTIFICADOS</h6>
                    </div>
                    <div class="col-md-2 id_certificado">
                        <div class="image-upload-certificado">
                            <label for="file-input-certificado{{ $loop->index+1 }}">
                                <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
                            </label>
                            <input id="file-input-certificado{{ $loop->index+1 }}" class="cur_hijo" type="file"  data-id={{ $loop->index+1 }}   class="form-control" name="carga_certificado[]"/>
                            <input type="hidden" name="rec_idioma[]" value="{{ $v->carga_certificado }}">
                        </div>
                    </div>

                    <div class="col-md-3">

                            <div id="previa-certificado{{ $loop->index+1 }}">
                            <img src='http://localhost/recursos/public/{{ $v->carga_certificado }}' width="100px" height="70px" alt="">
                            </div>
                            <div class="img_pre-certificado" id="img_pre-certificado{{ $loop->index+1 }}">

                            </div>

                    </div>
                </div>
                <a href='#' class="btn btn-sm btn btn-danger remove_button2" style="margin: 0 0 0 97%;" >X</a>
        </div>
        @endforeach
    </div>


    {{-- Idiomas --}}
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script>
            $(document).ready(function(){
                var maxField = 10; //Input fields increment limitation
                var addButton = $('.add_button2'); //Add button selector
                var wrapper = $('.field_wrapper2'); //Input field wrapper
                var fieldHTML = '<div>'+
                 '<div class="container idiomas" style=" border: 1px solid #00000036; padding: 23px; margin: 0 0 17px 0px;">'+
                   ' <div class="row escolaridad">'+
                        '<div class="col-md-12">'+
                                '<div class="input-group flex-nowrap">'+
                                        '<div class="input-group-prepend">'+
                                        '<span class="input-group-text" id="addon-wrapping">Idioma</span>'+
                                    '</div>'+
                                    '<select  name="idiomas_id[]" class="form-control" id="idioma" placeholder="Escolar">'+
                                            '<option value="">Idioma</option>'+
                                            '@foreach ($idiomass as $item)'+
                                           ' <option value="{{ $item->id }}">{{ $item->nombre_idioma }}</option>'+
                                           ' @endforeach'+
                                   ' </select>'+
                               ' </div>'+
                        '</div>'+
                  '  </div>'+


                  '<h5 style="margin: 23px 0 0 -79%;">Dominio del Idioma</h5>'+
                  '<div class="row">'+
                      '<div class="col-md-2">'+

                          '<div class="form-check">'+
                                 ' <input class="form-check-inputce checar" style="margin: 0 0 0 -28px;" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="0%">'+
                                '  <label class="form-check-label" for="nivel_ingles">'+
                                '  0%'+
                                 ' </label>'+
                          '</div>'+

                          '<div class="form-check">'+
                                '  <input class="form-check-input checar" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="25%">'+
                                 ' <label class="form-check-label" for="nivel_ingles">'+
                                 ' 25%'+
                                 ' </label>'+
                         ' </div>'+

                         ' <div class="form-check">'+
                                  '<input class="form-check-input checar" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="50%" checked>'+
                                 ' <label class="form-check-label" for="nivel_ingles">'+
                                  '50%'+
                                 ' </label>'+
                         ' </div>'+

                          '<div class="form-check">'+
                                 ' <input class="form-check-input checar" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="75%">'+
                                 ' <label class="form-check-label" for="nivel_ingles">'+
                                 ' 75%'+
                                  '</label>'+
                          '</div>'+

                         ' <div class="form-check">'+
                                 ' <input class="form-check-inputc checar" style="margin: 0 0 0 -13px;" type="checkbox" name="nivel_ingles[]" id="nivel_ingles" value="100%">'+
                                 ' <label class="form-check-label" for="nivel_ingles">'+
                                 ' 100%'+
                                 ' </label>'+
                         ' </div>'+
                      '</div>'+
                  '</div>'+


                    '<div class="row" style="margin:20px 0 0 0">'+


                       '<div class="col-md-1">'+
                            '  <label class="certificado">Certificado</label>'+
                        '</div>'+

                        '<div class="col-md-10">'+
                            ' <input type="file" class="form-control"  id="tit_ingles"  name="carga_certificado[]" >'+
                            '<input type="hidden" name="rec_idioma[]" value="{{ $v->carga_certificado }}">'+
                        '</div>'+

                     '</div>'+




               {{--  '</div>'+  --}}
               '<a href="#" class="btn btn-sm btn btn-danger remove_button2" style="margin: 0 0 0 97%;" >X</a>'+

                '</div>'+


            '</div>';
            {{-- Global --}}

                var x = 1; //Initial field counter is 1
                $(addButton).click(function(){ //Once add button is clicked
                    if(x < maxField){ //Check maximum number of input fields
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); // Add field html
                        $("#idioma").attr("data-valor",+x);
                        $("#idioma").attr('id','idioma'+x);
                        $("#nivel_ingles").attr("data-valor",+x);
                        $("#nivel_ingles").attr('id','nivel_ingles'+x);
                        $("#tit_ingles").attr("data-valor",+x);
                        $("#tit_ingles").attr('id','tit_ingles'+x);
                    }
                });
                $(wrapper).on('click', '.remove_button2', function(e){ //Once remove button is clicked
                    e.preventDefault();
                    $(this).parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
            });


    </script>


    {{-- -idiomas --}}
