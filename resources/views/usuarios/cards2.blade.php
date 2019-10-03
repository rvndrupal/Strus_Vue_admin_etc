@extends('layouts.admin')

@permission('read-cards')
{{--  @permission('read-card')  --}}
 @section('content')


<!DOCTYPE html>
<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



 </head>
 <body>
  <br />

  <div class="box">
    <h3 align="center">Carnet de Usuarios.</h3><br />
    <div class="panel panel-default">
    <div class="panel-heading">Buscar registro</div>
        <div class="panel-body">
            <div class="form-group">
             <input type="text" name="search" id="search" class="form-control" placeholder="Buscar (Nombre, Apellidos, Rfc, Curp)" />
            </div>
             <h3 align="center">Total de Registros : <span id="total_records"></span></h3>


            <tcards id="base">
            <div class="card-columns">


            </div>
            </tcards>



        </div>{{-- general --}}
    </div>
</div>{{-- Genral --}}

 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('card.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {

    $('.card-columns').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>


@endsection

@endpermission



