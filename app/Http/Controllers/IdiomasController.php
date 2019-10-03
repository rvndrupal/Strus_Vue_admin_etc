<?php

namespace App\Http\Controllers;

use App\Idiomas;
use Illuminate\Http\Request;
use App\Imports\IdiomasImport;
use Maatwebsite\Excel\Facades\Excel;

class IdiomasController extends Controller
{
    public function index()
    {
        $title = __('Idioma');
        return view('idiomas.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'idiomas.datatables.index';
            return datatables()->of(Idiomas::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }


    public function create()
    {
        $title = __('Crear nuevo Idioma');
        $idiomas = new idiomas;
        //dd($category);
        return view('idiomas.form', compact('idiomas', 'title'));
    }


    public function store(Request $request)
    {
        $idiomas = Idiomas::create($request->input());

        return redirect(route('idiomas.create'))->with('message', [
            'success', __("Nuevo Idioma creado correctamente")
        ]);
    }


    public function show(Grados $grados)
    {
        //
    }


    public function edit($id)
    {
        $title = __('Actualizar Idioma');
        $idiomas = Idiomas::find($id);
        return view('idiomas.form', compact('idiomas', 'title'));
    }


    public function update(Request $request, $id)
    {
        $idiomas = Idiomas::findOrFail($id);

        $idiomas->fill($request->input())->save();

        return redirect(route('idiomas.index'))->with('message', [
            'success', __("Idioma actualizado correctamente")
        ]);
        //
    }


    public function destroy($id)
    {
        //dd($id);
        $idiomas = Idiomas::find($id);
        $idiomas->delete();
        return redirect(route('idiomas.index'))->with('message', [
            'success', __("Idioma borrado correctamente")
        ]);
    }

    public function cargarIdiomas()
    {
        $title = __('Importar Idiomas');
        return view('idiomas.import_idiomas',compact('title'));
    }
    public function importarIdiomas()
    {
        Excel::import(new IdiomasImport, request()->file('file'));

        return redirect(route('idiomas.index'))->with('message', [
            'success', __("Idiomas importados Correctamente")
        ]);
    }
}
