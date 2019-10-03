<?php

namespace App\Http\Controllers;

use App\Carreras;
use Illuminate\Http\Request;
use App\Imports\CarrerasImport;
use Maatwebsite\Excel\Facades\Excel;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('Carreras');
        return view('carreras.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'carreras.datatables.index';
            return datatables()->of(Carreras::query())->addColumn('actions', $actions)
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
        $title = __('Crear nueva Carrera');
        $carreras = new Carreras;
        //dd($category);
        return view('carreras.form', compact('carreras', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrera = Carreras::create($request->input());

        return redirect(route('carreras.create'))->with('message', [
            'success', __("Nuevo carrera creada correctamente")
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
        $title = __('Actualizar Carrera');
        $carreras = Carreras::find($id);
        return view('carreras.form', compact('carreras', 'title'));
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
        $carrera = Carreras::findOrFail($id);

        $carrera->fill($request->input())->save();

        return redirect(route('carreras.index'))->with('message', [
            'success', __("Carrera actualizada correctamente")
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
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect(route('carreras.index'))->with('message', [
            'success', __("Carrera borrada correctamente")
        ]);
    }


    public function cargarCarrera()
    {
        $title = __('Importar Carreras');
        return view('carreras.import_carreras',compact('title'));
    }
    public function importarCarrera()
    {
        Excel::import(new CarrerasImport, request()->file('file'));

        return redirect(route('carreras.index'))->with('message', [
            'success', __("Carreras importadas Correctamente")
        ]);
    }
}
