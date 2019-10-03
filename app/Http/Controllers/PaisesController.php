<?php

namespace App\Http\Controllers;

use App\Paises;
use Illuminate\Http\Request;
use App\Imports\PaisesImport;
use Maatwebsite\Excel\Facades\Excel;

class PaisesController extends Controller
{
    public function index()
    {
        $title = __('Pais');
        return view('paises.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'paises.datatables.index';
            return datatables()->of(Paises::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('Crear nuevo Pais');
        $paises = new Paises;
        //dd($category);
        return view('paises.form', compact('paises', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paises = Paises::create($request->input());

        return redirect(route('paises.create'))->with('message', [
            'success', __("Nuevo pais creado correctamente")
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grados  $grados
     * @return \Illuminate\Http\Response
     */
    public function show(Grados $grados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grados  $grados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = __('Actualizar País');
        $paises = Paises::find($id);
        return view('paises.form', compact('paises', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grados  $grados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paises = Paises::findOrFail($id);

        $paises->fill($request->input())->save();

        return redirect(route('paises.index'))->with('message', [
            'success', __("País actualizado correctamente")
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
        $pais = Paises::find($id);
        $pais->delete();
        return redirect(route('paises.index'))->with('message', [
            'success', __("Pais borrada correctamente")
        ]);
    }

    public function cargarPais()
    {
        $title = __('Importar Paises');
        return view('paises.import_pais',compact('title'));
    }
    public function importarPais()
    {
        Excel::import(new PaisesImport, request()->file('file'));

        return redirect(route('paises.index'))->with('message', [
            'success', __("Pais importados Correctamente")
        ]);
    }
}
