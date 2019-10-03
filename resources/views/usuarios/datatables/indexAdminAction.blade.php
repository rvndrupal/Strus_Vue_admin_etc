@permission('show-usuarios')
<a
    href="{{ route('usuarios.show', ['id' => $id]) }}"
    title="{{ __('Ver') }}"
    data-id="{{ $id }}"
    class="btn btn-sm btn-info"s
>
    <i class="fa fa-eye"></i>
</a>
@endpermission



@permission('update-usuarios')
    <a
        href="{{ route('usuarios.edit', ['id' => $id]) }}"
        title="{{ __('Actualizar carnet') }}"
        data-id="{{ $id }}"
        class="btn btn-sm btn-primary"
    >
        <i class="fa fa-pencil-alt"></i>
    </a>
@endpermission



