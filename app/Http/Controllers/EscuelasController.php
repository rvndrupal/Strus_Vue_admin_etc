<?php

namespace App\Http\Controllers;

use App\Escuelas;
use Illuminate\Http\Request;
use App\Imports\EscuelasImport;
use Maatwebsite\Excel\Facades\Excel;

class EscuelasController extends Controller
{
    public function index()
    {
        $title = __('Intitución Educativa');
        return view('escuelas.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'escuelas.datatables.index';
            return datatables()->of(Escuelas::query())->addColumn('actions', $actions)
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
        $title = __('Crear nueva Escuela');
        $escuelas = new escuelas;
        //dd($category);
        return view('escuelas.form', compact('escuelas', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $escuelas = Escuelas::create($request->input());

        return redirect(route('escuelas.create'))->with('message', [
            'success', __("Nueva escuela creada correctamente")
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
        $title = __('Actualizar Escuela');
        $escuelas = Escuelas::find($id);
        return view('escuelas.form', compact('escuelas', 'title'));
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
        $escuelas = Escuelas::findOrFail($id);

        $escuelas->fill($request->input())->save();

        return redirect(route('escuelas.index'))->with('message', [
            'success', __("escuela actualizada correctamente")
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
        $esucela = Escuelas::find($id);
        $esucela->delete();
        return redirect(route('escuelas.index'))->with('message', [
            'success', __("Escuela borrada correctamente")
        ]);
    }

    public function cargarEscuelas()
    {
        $title = __('Importar Escuelas');
        return view('escuelas.import_escuelas',compact('title'));
    }
    public function importarEscuelas()
    {
        Excel::import(new EscuelasImport, request()->file('file'));

        return redirect(route('escuelas.index'))->with('message', [
            'success', __("Escuelas importadas Correctamente")
        ]);
    }
}
