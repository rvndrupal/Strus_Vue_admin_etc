@permission('update-grados')
    <a
        href="{{ route('grados.edit', ['id' => $id]) }}"
        title="{{ __('Actualizar Grados') }}"
        data-id="{{ $id }}"
        class="btn btn-sm btn-primary"
    >
        <i class="fa fa-pencil-alt"></i>
    </a>
@endpermission

@permission('delete-grados')
{{-- <a
    href="{{ route('grados.destroy', ['id' => $id]) }}"
    {{-- data-route="{{ route('grados.destroy', ['id' => $id]) }}" --}}
   {{-- tle="{{ __('Eliminar grado') }}"
    data-id="{{ $id }}"
    class="btn btn-danger btn-remove"
>
    <i class="fa fa-trash-alt"></i>
</a> --}}

{!! Form::open(['route' => ['grados.destroy', 'id' => $id], 'method' => 'DELETE']) !!}
<button class="btn btn-sm btn-danger eliminar" style="margin: -53px 0 0 39px;">
        <i class="fa fa-trash-alt"></i>
</button>

{!! Form::close() !!}



@endpermission



