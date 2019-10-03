@permission('update-niveles')
    <a
        href="{{ route('niveles.edit', ['id' => $id]) }}"
        title="{{ __('Actualizar nivel') }}"
        data-id="{{ $id }}"
        class="btn btn-sm btn-primary"
    >
        <i class="fa fa-pencil-alt"></i>
    </a>
@endpermission

@permission('delete-niveles')

{!! Form::open(['route' => ['niveles.destroy', 'id' => $id], 'method' => 'DELETE']) !!}
<button class="btn btn-sm btn-danger eliminar" style="margin: -53px 0 0 39px;">
        <i class="fa fa-trash-alt"></i>
</button>

{!! Form::close() !!}



@endpermission



