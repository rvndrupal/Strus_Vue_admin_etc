<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Codigos;
use App\Imports\CodigosImport;
use Maatwebsite\Excel\Facades\Excel;


class CodigosController extends Controller
{
    public function index()
    {
        $title = __('Codigo Puesto');
        return view('codigos.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'codigos.datatables.index';
            return datatables()->of(Codigos::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }


    public function create()
    {
        $title = __('Crear nuevo Código');
        $codigos = new Codigos;
        //dd($category);
        return view('codigos.form', compact('codigos', 'title'));
    }


    public function store(Request $request)
    {
        $codigos = Codigos::create($request->input());

        return redirect(route('codigos.create'))->with('message', [
            'success', __("Nuevo código creado correctamente")
        ]);
    }


    public function show(Grados $grados)
    {
        //
    }


    public function edit($id)
    {
        $title = __('Actualizar Código');
        $codigos = Codigos::find($id);
        return view('codigos.form', compact('codigos', 'title'));
    }


    public function update(Request $request, $id)
    {
        $codigos = Codigos::findOrFail($id);

        $codigos->fill($request->input())->save();

        return redirect(route('codigos.index'))->with('message', [
            'success', __("Código actualizado correctamente")
        ]);
        //
    }


    public function destroy($id)
    {
        //dd($id);
        $codigos = Codigos::find($id);
        $codigos->delete();
        return redirect(route('codigos.index'))->with('message', [
            'success', __("Código borrado correctamente")
        ]);
    }

    public function cargarCodigos()
    {
        $title = __('Importar Códigos');
        return view('codigos.import_codigos',compact('title'));
    }
    public function importarCodigos()
    {
        Excel::import(new CodigosImport, request()->file('file'));

        return redirect(route('codigos.index'))->with('message', [
            'success', __("Códigos importados Correctamente")
        ]);
    }
}
