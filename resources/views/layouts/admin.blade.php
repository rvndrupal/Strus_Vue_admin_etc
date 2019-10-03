

    @extends('adminlte::page')


    @section('title', $title)

    @section('content_header')

    @if(session('message'))
    <div class="alert alert-{{ session('message')[0] }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>{{ __("Mensaje") }}</h4>
        {{ session('message')[1] }}
    </div>
    @endif
    <div id="app">   {{-- Div Vue --}}
        <h1>{{ $title }}</h1>
        <p style="margin: -29px 0 0 75%; font-size: 22px; font-family: 'Source Sans Pro',sans-serif;">Usuario: {{ auth()->user()->name }}</p>
    </div>
    @stop

    @push('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


    <style>
        td.details-control {
                background: url({{ asset('img/details_open.png') }}) no-repeat center center;
                cursor: pointer;
            }

            tr.shown td.details-control {
                background: url({{ asset('img/details_close.png') }}) no-repeat center center;
            }
        </style>


        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
        @endpush



@yield('scripts')

@push('js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src=" //cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src=" //cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script> {{-- Para vue --}}


<script>
    var dt;
    jQuery(document).ready(function ($) {

        $(".select2").select2();

        jQuery(document).on('click', '.btn-remove', function () {
            jQuery.ajax({
                   url: $(this).data('route'),
                   type: 'DELETE',
                   headers: {
                       'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                   },
                   success: (res) => {
                       if (res.hasOwnProperty('msg')) {
                           alert(res.msg);
                       }
                       dt.ajax.reload();
                    }
                })
            })
        });
    </script>
    @endpush


