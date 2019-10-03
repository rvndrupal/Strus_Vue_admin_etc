<table>
        <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Fecha de Nacimineto</th>
            <th>Fecha domicilio</th>
            <th>Rfc</th>
            <th>Curp</th>
            <th>Calle</th>
            <th>Numero</th>
            <th>Correo Personal</th>
            <th>Correo Institucional</th>
            <th>Tel Casa</th>
            <th>Tel Movil</th>
            <th>Pais</th>

            <th>Numero</th>




            @foreach($usuarios as $item)
             @foreach ($item->solteros as $hijos)
            <th>Hijos</th>
            @endforeach
            @endforeach


        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->ap }}</td>
                <td>{{ $item->am }}</td>
                <td>{{ $item->fecha_nacimiento }}</td>
                <td>{{ $item->fecha_domicilio }}</td>
                <td>{{ $item->rfc }}</td>
                <td>{{ $item->curp }}</td>
                <td>{{ $item->calle }}</td>
                <td>{{ $item->numero }}</td>
                <td>{{ $item->correo_per }}</td>
                <td>{{ $item->correo_ins }}</td>
                <td>{{ $item->tel_casa }}</td>
                <td>{{ $item->tel_movil }}</td>
                <td>{{ $item->paises->nombre_pais }}</td>




                @foreach ($item->solteros as $hijos)
                <td>Nombre: {{ $hijos->nombre_hijo }} | Curp: {{ $hijos->curp_hijo }}</td>
                @endforeach

            </tr>
        @endforeach
        </tbody>
    </table>
