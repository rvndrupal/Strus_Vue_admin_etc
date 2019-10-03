
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

@permission('show-usuarios')
<a
    href="{{ route('show2', ['id' => $id]) }}"
    title="{{ __('Ver Seeders') }}"
    data-id="{{ $id }}"
    class="btn btn-sm btn-primary"s
>
    <i class="fa fa-eye-slash"></i>
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

{{--  @permission('read-usuarios')  --}}
@permission('desactivar-usuarios')
<a
    href="{{ route('usuarios.desactivar', ['id' => $id]) }}"
    title="{{ __('Eliminar carnet') }}"
    data-id="{{ $id }}"
    class="btn btn-sm btn-danger btn-remove"
>
    <i class="fa fa-trash-alt"></i>
</a>
@endpermission


{{--  @permission('read-usuarios')  --}}
@permission('activar-usuarios')
<a
    href="{{ route('usuarios.activar', ['id' => $id]) }}"
    title="{{ __('Activar carnet') }}"
    data-id="{{ $id }}"
    class="btn btn-sm btn-success btn-remove"
>
    <i class="fa fa-check"></i>
</a>
@endpermission


@permission('read-pdf')
<a
    href="{{ route('usuarios.pdf', ['id' => $id]) }}"
    title="{{ __('PDF') }}"
    data-id="{{ $id }}"
    class="btn btn-sm btn-default">
    <i class="fa fa-file-pdf-o"></i>
</a>
@endpermission

