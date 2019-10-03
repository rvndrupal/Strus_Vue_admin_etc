//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches




$(".next").click(function(){



    var form= $("#msform");



    jQuery.validator.addMethod("texto", function(value, element) {
    return this.optional(element) ||  /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    }, "Solo se permite texto");

    jQuery.validator.addMethod("email", function(value, element) {
    return this.optional(element) ||  /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/.test(value);
    }, "Introduce un correo Valido");

    jQuery.validator.addMethod("numeros", function(value, element) {
    return this.optional(element) ||  /^[0-9]+$/.test(value);
    }, "Solo números");

    jQuery.validator.addMethod("imagen", function(value, element) {
    return this.optional(element) ||  /(.jpg|.jpeg|.png|.jfif)$/i.test(value);
    }, "Formato no valido solo jpg,jpeg,png,jfif");

    jQuery.validator.addMethod("imagensize", function(value, element) {
        if(element.files[0].size<=500000){
            return true;
        }else{
            return false;
        }
    }, "La imagen debe ser menor ó igual a 500 KB");

    jQuery.validator.addMethod("pdf", function(value, element) {
    return this.optional(element) ||  /(.pdf)$/i.test(value);
    }, "Formato no valido solo (PDF)");




    form.validate({



        rules:{
            //  nom:{required:true,minlength:3,maxlength:20,texto: true},
            // ap:{required:true,minlength:3,maxlength:20,texto: true},
            // am:{required:true,minlength:3,maxlength:20,texto: true},
            //  paises_id:{required:true},
            // rfc:{required:true,minlength:12,maxlength:13},
            // curp:{required:true,minlength:18,maxlength:18},
            // correo_per:{required:true,email:true},
            // correo_ins:{required:true,email:true},
            // tel_casa:{required:true,minlength:10,maxlength:10,numeros:true},
            // tel_movil:{required:true,minlength:10,maxlength:10,numeros:true},
            // fecha_nacimiento:{required:true},
            // foto:{required:true,imagen:true,imagensize:true},
            // carga_rfc:{required:true,imagen:true,imagensize:true},
            // carga_curp:{required:true,imagen:true,imagensize:true},
            // carga_ife:{required:true,imagen:true,imagensize:true},
            //  estados_id:{required:true},
            // municipios_id:{required:true},
            // colonias_id:{required:true},
            // calle:{required:true,minlength:5,maxlength:100},
            // numero:{required:true,minlength:2,maxlength:5,numeros:true},
            // carga_domicilio:{required:true,imagen:true},
            // fecha_domicilio:{required:true},
            // estado_civils_id:{required:true},
            // nombres_coy:{required:true,minlength:3,maxlength:20,texto: true},
            // primero_coy:{required:true,minlength:3,maxlength:20,texto: true},
            // segundo_coy:{required:true,minlength:3,maxlength:20,texto: true},
            // curp_coy:{required:true,minlength:18,maxlength:18},
            // carga_curp_coy:{required:true,imagen:true,imagensize:true},
            // // 'nombre_hijo_coy[]':{required:true,minlength:3,maxlength:20,texto: true},
            // 'cedula[]':{required:true},

            // puesto_actual:{required:true,minlength:3,maxlength:20,texto: true},
            // codigo_puesto:{required:true},
            // grado_nivel:{required:true},
            // direcciones_generales_id:{required:true},
            // direcciones_areas_id:{required:true},
            // fecha_ultimo:{required:true},
            // fecha_senasica:{required:true},
            // est_lab:{required:true},
            // mun_lab:{required:true},
            // col_lab:{required:true},
            // calle_lab:{required:true,minlength:3,maxlength:70},
            // num_lab:{required:true,numeros:true,minlength:1,maxlength:4},
            // fecha_gobierno:{required:true},


            // num_seg:{required:true,minlength:11,maxlength:11},
            // tipo_seg:{required:true,minlength:5,maxlength:40,texto: true},
            // nom_seg:{required:true,minlength:5,maxlength:20,texto: true},
            // pri_seg:{required:true,minlength:5,maxlength:20,texto: true},
            // seg_seg:{required:true,minlength:5,maxlength:20,texto: true},
            // seg_seg:{required:true,minlength:5,maxlength:20,texto: true},
            // par_seg:{required:true,minlength:5,maxlength:20,texto: true},
            // email_seg:{required:true,minlength:5,maxlength:50,email: true},
            // tel_seg:{required:true,minlength:8,maxlength:14,numeros: true},
            // mov_seg:{required:true,minlength:5,maxlength:10,numeros: true},












        },

        messages:{
            nom:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            ap:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            am:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            paises_id:{required:"Es obligatorio"},
            rfc:{required:"Es obligatorio",minlength:"Mínimo 12 caracteres",maxlength:"Máximo 13 caracteres"},
            curp:{required:"Es obligatorio",minlength:"Mínimo 18 caracteres",maxlength:"Máximo 18 caracteres"},
            correo_per:{required:"Es obligatorio"},
            correo_ins:{required:"Es obligatorio"},
            tel_casa:{required:"Es obligatorio",minlength:"Mínimo 10 caracteres",maxlength:"Máximo 10 caracteres"},
            tel_movil:{required:"Es obligatorio",minlength:"Mínimo 10 caracteres",maxlength:"Máximo 10 caracteres"},
            fecha_nacimiento:{required:"Es obligatorio"},
            foto:{required:"Es obligatorio"},
            carga_rfc:{required:"Es obligatorio"},
            carga_curp:{required:"Es obligatorio"},
            carga_ife:{required:"Es obligatorio"},
            estados_id:{required:"Es obligatorio"},
            municipios_id:{required:"Es obligatorio"},
            colonias_id:{required:"Es obligatorio"},
            calle:{required:"Es obligatorio",minlength:"Mínimo 5 caracteres",maxlength:"Máximo 100 caracteres"},
            numero:{required:"Es obligatorio",minlength:"Mínimo 2 caracteres",maxlength:"Máximo 5 caracteres"},
            carga_domicilio:{required:"Es obligatorio"},
            fecha_domicilio:{required:"Es obligatorio"},
            nombres_coy:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            primero_coy:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            segundo_coy:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            estado_civils_id:{required:"Es obligatorio"},
            curp_coy:{required:"Es obligatorio",minlength:"Mínimo 18 caracteres",maxlength:"Máximo 18 caracteres"},
            carga_curp_coy:{required:"Es obligatorio"},
            // 'nombre_hijo_coy[]':{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            puesto_actual:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 20 caracteres"},
            codigo_puesto:{required:"Es obligatorio"},
            grado_nivel:{required:"Es obligatorio"},
            direcciones_generales_id:{required:"Es obligatorio"},
            direcciones_areas_id:{required:"Es obligatorio"},
            fecha_ultimo:{required:"Es obligatorio"},
            fecha_senasica:{required:"Es obligatorio"},
            est_lab:{required:"Es obligatorio"},
            mun_lab:{required:"Es obligatorio"},
            col_lab:{required:"Es obligatorio"},
            calle_lab:{required:"Es obligatorio",minlength:"Minimo 3 caracteres",maxlength:"Máximo de 70 caracteres"},
            num_lab:{required:"Es obligatorio",numeros:"Solo números",minlength:"Mínimo 1 caracteres",maxlength:"Máximo 4 caracteres"},
            fecha_gobierno:{required:"Es obligatorio"},
            num_seg:{required:"Es obligatorio",minlength:"Minimo 11 caracteres",maxlength:"Máximo de 11 caracteres"},
            tipo_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 20 caracteres"},
            nom_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 20 caracteres"},
            pri_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 20 caracteres"},
            seg_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 20 caracteres"},
            par_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 20 caracteres"},
            email_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 50 caracteres"},
            tel_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 14 caracteres"},
            mov_seg:{required:"Es obligatorio",minlength:"Minimo 5 caracteres",maxlength:"Máximo de 10 caracteres"},










        },


    });//validación de los campos


    var id;
    var cla;
    var res=new Array();
    var r;
    var edad;
    var curph=new Array();
    var data;
    var idm;
    var clam;
    var rm;
    var resm=new Array();
    var idsol;
    var clasol;
    var rsol;
    var resol=new Array();
    var edsol=new Array();
    var cla_esc;
    var r_esc;
    var res_esc=new Array();
    var esc;
    var esc_A=new Array();
    var idi;
    var idi_A=new Array();
    var che;
    var che_A=new Array();
    var exp;
    var exp_A=new Array();
    var carga_curp_A=new Array();
    var datad;






    $('.recorrer input').each(function() {
        // alert($(this).attr('class'));
        //  id=$(this).attr('id');
          cla=$(this).attr('class');//par el error
          //deja la pura palabra is-invalid


          data=$(this).attr('data-valor');//el numero



        if($('#hijoc'+data).val()=="")
        {
            $('#hijoc'+data).addClass('is-invalid');
            form.valid=false;
        }
        else{
            $('#hijoc'+data).rules('add',
            {
                required: true,texto:true,minlength:3,maxlength:20,

                messages: {
                    required: "Es obligatorio",minlength:"Mínimo 3 caracteres",maxlength:"Máximo de 20 caracteres"
                }

              });
        }

        if($('#curp_hijo'+data).val()=="")
        {
            $('#curp_hijo'+data).addClass('is-invalid');
            form.valid=false;
        }
        else{
            $('#curp_hijo'+data).rules('add',
                {
                    required: true,texto:true,minlength:18,maxlength:18,

                    messages: {
                        required: "Es obligatorio",minlength:"Mínimo 18 caracteres",maxlength:"Máximo de 18 caracteres"
                    }

            });

        }

        if($('#carga_curp_hijo'+data).val()=="")
        {
            $('#carga_curp_hijo'+data).addClass('is-invalid');
            form.valid=false;
        }
        else{
            $('#carga_curp_hijo'+data).rules('add',
            {
                required: true,imagen:true,imagensize:true,

                messages: {
                    required: "Es obligatorio",
                }

            });
         }


     });

     //dependientes

     $('.dependientes input').each(function() {
          datad=$(this).attr('data-valor');
        if($('#nombre_des'+datad).val()=="")
        {
            $('#nombre_des'+datad).addClass('is-invalid');
            form.valid=false;
        }
        else{
            $('#nombre_des'+datad).rules('add',
            {
                required: true,texto:true,minlength:3,maxlength:20,

                messages: {
                    required: "Es obligatorio",minlength:"Mínimo 3 caracteres",maxlength:"Máximo de 20 caracteres"
                }
              });
        }

        if($('#ap_des'+datad).val()=="")
        {
            $('#ap_des'+datad).addClass('is-invalid');
            form.valid=false;
        }
        else{
            $('#ap_des'+datad).rules('add',
                {
                    required: true,texto:true,minlength:3,maxlength:20,
                    messages: {
                        required: "Es obligatorio",minlength:"Mínimo 3 caracteres",maxlength:"Máximo de 20 caracteres"
                    }
            });
        }

        if($('#am_des'+datad).val()=="")
        {
            $('#am_des'+datad).addClass('is-invalid');
            form.valid=false;
        }
        else{
            $('#am_des'+datad).rules('add',
                {
                    required: true,texto:true,minlength:3,maxlength:20,

                    messages: {
                        required: "Es obligatorio",minlength:"Mínimo 3 caracteres",maxlength:"Máximo de 20 caracteres"
                    }
            });
        }
     });


//ESCOLARIDAD VALIDAR

    $('.escolaridad select').each(function(i){
        data=$(this).attr('data-valor');//el numero
        var esc=$(this).attr('id');
        esc_A.push(esc);
        //alert(esc_A);
    });

     $(esc_A).each(function(i){
        //grado
        if($("#grados"+(i+2)).val()=="")
        {
        $("#grados"+(i+2)).addClass('is-invalid');
        form.valid=false;
        }
        else{
            $("#grados"+(i+2)).removeClass('is-invalid');
        }
        //carrera
        if($("#carreras"+(i+2)).val()=="")
        {
        $("#carreras"+(i+2)).addClass('is-invalid');
        form.valid=false;
        }
        else{
            $("#carreras"+(i+2)).removeClass('is-invalid');
        }


        // if($("#cedula"+(i+2)).val()=="")
        // {
        // $("#cedula"+(i+2)).addClass('is-invalid');
        // form.valid=false;
        // }
        // else{
        //     $("#cedula"+(i+2)).removeClass('is-invalid');
        // }


        if($("#escuelas"+(i+2)).val()=="")
        {
        $("#escuelas"+(i+2)).addClass('is-invalid');
        form.valid=false;
        }
        else{
            $("#escuelas"+(i+2)).removeClass('is-invalid');
        }


        // if($("#titulos"+(i+2)).val()=="")
        // {
        // $("#titulos"+(i+2)).addClass('is-invalid');
        // form.valid=false;
        // }
        // else{
        //     $("#titulos"+(i+2)).removeClass('is-invalid');
        // }


        //  if($("#titulo_pro"+(i+2)).val()=="")
        //  {
        //  $("#titulo_pro"+(i+2)).addClass('is-invalid');
        //  form.valid=false;
        //  }
        //  else{
        //      $("#titulo_pro"+(i+2)).removeClass('is-invalid');
        //  }


        //  if($("#cedula"+(i+2)).val()=="")
        //  {
        //  $("#cedula"+(i+2)).addClass('is-invalid');
        //  form.valid=false;
        //  }
        //  else{
        //      $("#cedula"+(i+2)).removeClass('is-invalid');
        //  }
});



//IDIOMAS
    $('.idiomas select').each(function(i){
        data=$(this).attr('data-valor');//el numero
        var idi=$(this).attr('id');
        idi_A.push(idi);
       // alert(idi_A);
    });

    //IDIOMAS checked
    $('.idiomas input').each(function(i){
        data=$(this).attr('data-valor');//el numero
        var che=$('.checar').attr('id');
        che_A.push(idi);
        //alert(che_A);
    });

    $(idi_A).each(function(i){
        //select
        if($("#idioma"+(i+2)).val()=="")
        {
        $("#idioma"+(i+2)).addClass('is-invalid');
        form.valid=false;
        }
        else{
            $("#idioma"+(i+2)).removeClass('is-invalid');
        }

        //check
        if($("#nivel_ingles"+(i+2)).is(':checked'))
        {
        // $("#nivel_ingles"+(i+2)).addClass('is-invalid');
        //alert("Debe seleccionar almenos un porcentaje");
        form.valid=false;
        }
        else{
            $("#nivel_ingles"+(i+2)).removeClass('is-invalid');
        }

         //select
         if($("#tit_ingles"+(i+2)).val()=="")
         {
         $("#tit_ingles"+(i+2)).addClass('is-invalid');
         form.valid=false;
         }
         else{
             $("#tit_ingles"+(i+2)).removeClass('is-invalid');
         }
    });

    //EXPERIENCIA

        $('.experiencia input').each(function(i){
            data=$(this).attr('data-valor');//el numero
            var exp=$(this).attr('id');
            exp_A.push(exp);
            //alert(exp_A);
        });

        $(exp_A).each(function(i){
             //puesto
            if($("#den_puesto"+(i+2)).val()=="")
            {
            $("#den_puesto"+(i+2)).addClass('is-invalid');
            form.valid=false;
            }

            else{
                $("#den_puesto"+(i+2)).removeClass('is-invalid');
            }

             //empresa
             if($("#ins_puesto"+(i+2)).val()=="")
             {
             $("#ins_puesto"+(i+2)).addClass('is-invalid');
             form.valid=false;
             }
             else{
                 $("#ins_puesto"+(i+2)).removeClass('is-invalid');
             }

             //empresa
             if($("#area_puesto"+(i+2)).val()=="")
             {
             $("#area_puesto"+(i+2)).addClass('is-invalid');
             form.valid=false;
             }
             else{
                 $("#area_puesto"+(i+2)).removeClass('is-invalid');
             }



             if($("#anos_puesto"+(i+2)).val()=="")
             {
             $("#anos_puesto"+(i+2)).addClass('is-invalid');
             form.valid=false;
             }
             else{
                 $("#anos_puesto"+(i+2)).removeClass('is-invalid');
             }


             if($("#fecha_ing_puesto"+(i+2)).val()=="")
             {
             $("#fecha_ing_puesto"+(i+2)).addClass('is-invalid');
             form.valid=false;
             }
             else{
                 $("#fecha_ing_puesto"+(i+2)).removeClass('is-invalid');
             }


              if($("#fecha_baj_puesto"+(i+2)).val()=="")
              {
              $("#fecha_baj_puesto"+(i+2)).addClass('is-invalid');
              form.valid=false;
              }
              else{
                  $("#fecha_baj_puesto"+(i+2)).removeClass('is-invalid');
              }


               if($("#doc_puesto"+(i+2)).val()=="")
               {
               $("#doc_puesto"+(i+2)).addClass('is-invalid');
               form.valid=false;
               }
               else{
                   $("#doc_puesto"+(i+2)).removeClass('is-invalid');
               }

        });



        // form.valide=true;


         if (form.valid() == true){

                if(animating) return false;
                animating = true;

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset

                    next_fs.show();


                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50)+"%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({'transform': 'scale('+scale+')'});
                        next_fs.css({'left': left, 'opacity': opacity});
                    },
                    duration: 800,
                    complete: function(){
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });

        }






});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){


	return true;
})
