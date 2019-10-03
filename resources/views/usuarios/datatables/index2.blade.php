
@permission('read-pdf')
<a
    href="{{ route('usuarios.pdf', ['id' => $id]) }}"
    title="{{ __('PDF') }}"
    data-id="{{ $id }}"
    class="btn btn-sm btn-default">
    <i class="fa fa-file-pdf-o"></i>
</a>
@endpermission

