<?php

namespace App\Http\Controllers;

use App\EstadoCivil;
use Illuminate\Http\Request;
use App\Imports\EstadoCivilImport;
use Maatwebsite\Excel\Facades\Excel;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('Estado Civil');
        return view('estadocivil.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'estadocivil.datatables.index';
            return datatables()->of(EstadoCivil::query())->addColumn('actions', $actions)
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
        $title = __('Nuevo estado civil');
        $estadocivil = new EstadoCivil;
        //dd($category);
        return view('estadocivil.form', compact('estadocivil', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estadocivil = EstadoCivil::create($request->input());

        return redirect(route('estadocivil.create'))->with('message', [
            'success', __("Nuevo estado creado correctamente")
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function show(estadocivil $estadocivil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function edit(estadocivil $estadocivil, $id)
    {
        $title = __('Actualizar Estado');
        $estadocivil = estadocivil::find($id);
        return view('estadocivil.form', compact('estadocivil', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estadocivil = EstadoCivil::findOrFail($id);

        $estadocivil->fill($request->input())->save();

        return redirect(route('estadocivil.index'))->with('message', [
            'success', __("Actualizado correctamente")
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\estadocivil  $estadocivil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $estadocivil = EstadoCivil::find($id);
        $estadocivil->delete();
        return redirect(route('estadocivil.index'))->with('message', [
            'success', __("Estado borrado correctamente")
        ]);
    }

    public function cargarEstadoCivil()
    {
        $title = __('Importar estadocivil');
        return view('estadocivil.import_estadocivil',compact('title'));
    }
    public function importarEstadoCivil()
    {
        Excel::import(new estadocivilImport, request()->file('file'));

        return redirect(route('estadocivil.index'))->with('message', [
            'success', __("Estados importados Correctamente")
        ]);
    }
}
