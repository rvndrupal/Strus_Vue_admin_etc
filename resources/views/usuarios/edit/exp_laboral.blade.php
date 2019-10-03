
 <div class="field_wrapper3">


    <div class="col-md-12">

            <a href="#" class="add_Expe btn btn-success" style="margin: 0 0 7px 86%;" title="Add field">Agregar Experiencia</a>
    </div>
    @foreach ($use[0]->ExpLaborales as $item=>$v)

      <div class="container" style=" border: 1px solid #00000036; padding: 23px; margin: 0 0 17px 0px;">
        <div class="row">


            <div class="col-md-12">
                <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Denomincación del Puesto</span>
                        </div>
                    <input type="text" class="form-control" name="den_puesto[]" id="den_puesto[]"
                    placeholder="Denominación del puesto" aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->den_puesto }}">
                </div>
            </div>


            <div class="col-md-12">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Institución ó Empresa</span>
                            </div>
                        <input type="text" class="form-control" name="ins_puesto[]" id="ins_puesto[]"
                        placeholder="Institución ó Empresa" aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->ins_puesto }}">
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Área de Experiencia</span>
                            </div>
                        <input type="text" class="form-control" name="area_puesto[]" id="area_puesto[]"
                        placeholder="Área de Experiencia" aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->area_puesto }}">
                    </div>
            </div>


            <div class="col-md-6">
                    <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Años de Experiencia</span>
                            </div>
                        <input type="text" class="form-control" name="anos_puesto[]" id="anos_puesto[]"    placeholder="Años de Experiencia"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->anos_puesto }}">
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha de Ingreso</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_ing_puesto[]" id="fecha_ing_puesto[]" placeholder="Senasica"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->fecha_ing_puesto }}">
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Fecha de Baja</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_baj_puesto[]" id="fecha_baj_puesto[]" placeholder="Senasica"
                        aria-label="Nombre" aria-describedby="addon-wrapping" value="{{ $v->fecha_baj_puesto }}">
                    </div>
            </div>
            {{--

            <div class="col">
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Documento Experiencia</span>
                            </div>
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" data-name="doc_expe" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="doc_puesto[]" >
                            <label class="custom-file-label" id="doc_expe" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
            </div>  --}}

                <div class="row">
                    <div class="row id_constancia">
                            <div class="col-md-3">
                                    <h6 class="foto_tex2">CONSTANCIA</h6>
                            </div>
                            <div class="col-md-3 ">
                                <div class="image-upload-constancia">
                                    <label for="file-input-constancia{{ $loop->index+1 }}">
                                        <img src="{{ asset('img/subir2.jpg') }}" alt ="Click aquí para subir tu foto" title ="Click aquí para subir tu foto" >
                                    </label>
                                    <input id="file-input-constancia{{ $loop->index+1 }}" class="cur_hijo" type="file" data-id={{ $loop->index+1 }}  class="form-control" name="doc_puesto[]"/>
                                    <input type="hidden" name="rec_puesto[]" value="{{ $v->doc_puesto }}">
                                </div>
                            </div>

                            <div class="col-md-3">

                                    <div id="previa-constancia{{ $loop->index+1 }}">
                                    <img src='http://localhost/recursos/public/{{ $v->doc_puesto }}' width="100px" height="70px" alt="">
                                    </div>
                                    <div class="img_pre-constancia" id="img_pre-constancia{{ $loop->index+1 }}">

                                    </div>

                            </div>
                        </div>
                </div>


        </div>
        <a href="#" class="btn btn-sm btn btn-danger remove_button" style="margin: 0 0 0 97%;" >X</a>
      </div>
     {{-- <a href="#" class="add_Expe btn btn-success" style="margin: 0 0 7px 86%;" title="Add field">Agregar Experiencia</a> --}}
     @endforeach
</div>














<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_Expe'); //Add button selector
        var wrapper = $('.field_wrapper3'); //Input field wrapper
        var fieldHTML = '<div>'+
               ' <div class="container experiencia" style=" border: 1px solid #00000036; padding: 23px; margin: 0 0 17px 0px;">'+
                       ' <div class="row">'+

                          '  <div class="col-md-12">'+
                               ' <div class="input-group flex-nowrap">'+
                                      '  <div class="input-group-prepend">'+
                                           ' <span class="input-group-text" id="addon-wrapping">Denomincación del Puesto</span>'+
                                       ' </div>'+
                                  '  <input type="text" class="form-control" name="den_puesto[]" id="den_puesto"    placeholder="Denominación del puesto" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                              '  </div>'+
                          '  </div>'+

                           ' <div class="col-md-12">'+
                                   ' <div class="input-group flex-nowrap">'+
                                           ' <div class="input-group-prepend">'+
                                                '<span class="input-group-text" id="addon-wrapping">Institución ó Empresa</span>'+
                                           ' </div>'+
                                       ' <input type="text" class="form-control" name="ins_puesto[]" id="ins_puesto"    placeholder="Institución ó Empresa" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                                    '</div>'+
                           ' </div>'+

                           ' <div class="col-md-12">'+
                                   ' <div class="input-group flex-nowrap">'+
                                           ' <div class="input-group-prepend">'+
                                                '<span class="input-group-text" id="addon-wrapping">Área de Experiencia</span>'+
                                            '</div>'+
                                       ' <input type="text" class="form-control" name="area_puesto[]" id="area_puesto"    placeholder="Área de Experiencia" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                                   ' </div>'+
                           ' </div>'+

                            '<div class="col-md-6">'+
                                   ' <div class="input-group flex-nowrap">'+
                                           ' <div class="input-group-prepend">'+
                                                '<span class="input-group-text" id="addon-wrapping">Años de Experiencia</span>'+
                                           ' </div>'+
                                       ' <input type="text" class="form-control" name="anos_puesto[]" id="anos_puesto"    placeholder="Años de Experiencia" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                                   ' </div>'+
                            '</div>'+

                           ' <div class="col-md-12">'+
                                   ' <div class="input-group flex-nowrap">'+
                                       ' <div class="input-group-prepend">'+
                                            '<span class="input-group-text" id="addon-wrapping">Fecha de Ingreso</span>'+
                                       ' </div>'+
                                       ' <input type="date" class="form-control" name="fecha_ing_puesto[]" id="fecha_ing_puesto" placeholder="Senasica" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                                   ' </div>'+
                            '</div>'+

                           ' <div class="col-md-12">'+
                                    '<div class="input-group flex-nowrap">'+
                                      '  <div class="input-group-prepend">'+
                                            '<span class="input-group-text" id="addon-wrapping">Fecha de Baja</span>'+
                                       ' </div>'+
                                        '<input type="date" class="form-control" name="fecha_baj_puesto[]" id="fecha_baj_puesto" placeholder="Senasica" aria-label="Nombre" aria-describedby="addon-wrapping">'+
                                   ' </div>'+
                           ' </div>'+

                           {{--  ' <div class="col">'+
                                   ' <div class="input-group flex-nowrap">'+
                                       ' <div class="input-group-prepend">'+
                                            '<span class="input-group-text" id="inputGroupFileAddon01">Documento Experiencia</span>'+
                                           ' </div>'+
                                            '<div class="custom-file">'+
                                            '<input type="file" class="custom-file-input" data-name="doc_expe" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="doc_puesto[]" >'+
                                           ' <label class="custom-file-label" id="doc_expe" for="inputGroupFile01">Choose file</label>'+
                                      '  </div>'+
                                   ' </div>'+
                          '  </div>'+  --}}

                          '<div class="col-md-1">'+
                                '  <label class="certificado2">Experiencia</label>'+
                            '</div>'+

                            '<div class="col-md-10">'+
                                ' <input type="file" class="form-control"  id="doc_puesto"  name="doc_puesto[]" >'+
                                '<input type="hidden" name="rec_puesto[]" value="{{ $v->doc_puesto }}">'+
                            '</div>'+

                         ' </div>'+

                       ' </div>'+{{-- row --}}
                       '<a href="#" class="btn btn-sm btn btn-danger remove_button" style="margin: 0 0 0 97%;" >X</a>'+
                   ' </div>'+{{-- -container --}}


'</div>';

        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
                $("#den_puesto").attr("data-valor",+x);
                $("#den_puesto").attr('id','den_puesto'+x);
                $("#ins_puesto").attr("data-valor",+x);
                $("#ins_puesto").attr('id','ins_puesto'+x);
                $("#area_puesto").attr("data-valor",+x);
                $("#area_puesto").attr('id','area_puesto'+x);
                $("#anos_puesto").attr("data-valor",+x);
                $("#anos_puesto").attr('id','anos_puesto'+x);
                $("#fecha_ing_puesto").attr("data-valor",+x);
                $("#fecha_ing_puesto").attr('id','fecha_ing_puesto'+x);
                $("#fecha_baj_puesto").attr("data-valor",+x);
                $("#fecha_baj_puesto").attr('id','fecha_baj_puesto'+x);
                $("#doc_puesto").attr("data-valor",+x);
                $("#doc_puesto").attr('id','doc_puesto'+x);
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });


</script>

