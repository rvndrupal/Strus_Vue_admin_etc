@permission('update-escuelas')
    <a
        href="{{ route('escuelas.edit', ['id' => $id]) }}"
        title="{{ __('Actualizar escuelas') }}"
        data-id="{{ $id }}"
        class="btn btn-sm btn-primary"
    >
        <i class="fa fa-pencil-alt"></i>
    </a>
@endpermission

@permission('delete-escuelas')

{!! Form::open(['route' => ['escuelas.destroy', 'id' => $id], 'method' => 'DELETE']) !!}
<button class="btn btn-sm btn-danger eliminar" style="margin: -53px 0 0 39px;">
        <i class="fa fa-trash-alt"></i>
</button>

{!! Form::close() !!}



@endpermission



