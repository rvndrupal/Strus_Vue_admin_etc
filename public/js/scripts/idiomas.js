$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button2'); //Add button selector
    var wrapper = $('.field_wrapper2'); //Input field wrapper
    var fieldHTML = '<div>'+
     '<div class="container" style=" border: 1px solid #00000036; padding: 23px; margin: 0 0 17px 0px;">'+
       ' <div class="row">'+
            '<div class="col-md-12">'+
                    '<div class="input-group flex-nowrap">'+
                            '<div class="input-group-prepend">'+
                            '<span class="input-group-text" id="addon-wrapping">Idioma</span>'+
                        '</div>'+
                        '<select  name="idiomas_id[]" class="estados_select" placeholder="Escolar">'+
                                '<option value="">Idioma</option>'+
                                '@foreach ($idiomas as $item)'+
                               ' <option value="{{ $item->id }}">{{ $item->nombre_idioma }}</option>'+
                               ' @endforeach'+
                       ' </select>'+
                   ' </div>'+
            '</div>'+
      '  </div>'+










   '</div>'+
    '<a href="#" class="btn btn-sm btn btn-danger remove_button" style="margin: 0 0 0 97%;" >X</a>'+
    '</div>'+

'</div>';

    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
