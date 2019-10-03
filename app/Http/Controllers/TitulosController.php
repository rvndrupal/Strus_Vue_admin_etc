<?php

namespace App\Http\Controllers;

use App\Titulos;
use Illuminate\Http\Request;
use App\Imports\TitulosImport;
use Maatwebsite\Excel\Facades\Excel;

class TitulosController extends Controller
{
    public function index()
    {
        $title = __('Título Profesional');
        return view('titulos.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'titulos.datatables.index';
            return datatables()->of(Titulos::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }


    public function create()
    {
        $title = __('Crear nuevo Título');
        $titulos = new Titulos;
        //dd($category);
        return view('titulos.form', compact('titulos', 'title'));
    }


    public function store(Request $request)
    {
        $titulos = Titulos::create($request->input());

        return redirect(route('titulos.create'))->with('message', [
            'success', __("Nuevo Título creado correctamente")
        ]);
    }


    public function show(Grados $grados)
    {
        //
    }


    public function edit($id)
    {
        $title = __('Actualizar Título');
        $titulos = Titulos::find($id);
        return view('titulos.form', compact('titulos', 'title'));
    }


    public function update(Request $request, $id)
    {
        $titulos = Titulos::findOrFail($id);

        $titulos->fill($request->input())->save();

        return redirect(route('titulos.index'))->with('message', [
            'success', __("Título actualizado correctamente")
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grados  $grados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $titulos = Titulos::find($id);
        $titulos->delete();
        return redirect(route('titulos.index'))->with('message', [
            'success', __("Título borrado correctamente")
        ]);
    }

    public function cargarTitulos()
    {
        $title = __('Importar Titulos');
        return view('titulos.import_titulos',compact('title'));
    }
    public function importarTitulos()
    {
        Excel::import(new TitulosImport, request()->file('file'));

        return redirect(route('titulos.index'))->with('message', [
            'success', __("Títulos importadas Correctamente")
        ]);
    }
}
