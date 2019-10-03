@permission('update-direccionesgenerales')
    <a
        href="{{ route('direccionesgenerales.edit', ['id' => $id]) }}"
        title="{{ __('Actualizar dirección') }}"
        data-id="{{ $id }}"
        class="btn btn-sm btn-primary"
    >
        <i class="fa fa-pencil-alt"></i>
    </a>
@endpermission

@permission('delete-direccionesgenerales')

{!! Form::open(['route' => ['direccionesgenerales.destroy', 'id' => $id], 'method' => 'DELETE']) !!}
<button class="btn btn-sm btn-danger eliminar" style="margin: -53px 0 0 39px;">
        <i class="fa fa-trash-alt"></i>
</button>

{!! Form::close() !!}



@endpermission



