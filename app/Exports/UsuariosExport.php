<?php

namespace App\Exports;

use App\Usuarios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class UsuariosExport implements FromCollection,WithHeadings
// {

    //  /**
    // * @return \Illuminate\Support\Collection
    // */
    // // public function headings(): array
    // // {
    // //     return [
    // //         'Id',
    // //         'Nombre',
    // //         'Ap',
    // //         'Am',
    // //         'Fecha de Nacimiento',
    // //         'Fecha de Domicilio',

    // //     ];
    // // }
    // // /**
    // // * @return \Illuminate\Support\Collection
    // // */
    // // public function collection()
    // // {

    // //     $usuarios=Usuarios::with('solteros')->select('id','nom','ap','am','fecha_nacimiento','fecha_domicilio')->get();
    // //     return $usuarios;
    // // }


// }


class UsuariosExport implements FromView
{
    public function view(): View
    {
        $usuarios=Usuarios::all();



        return view('usuarios.excel', [
            'usuarios' => $usuarios
        ]);
    }
}
