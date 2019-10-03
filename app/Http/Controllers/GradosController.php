<?php

namespace App\Http\Controllers;

use App\Grados;
use Illuminate\Http\Request;
use App\Imports\GradosImport;
use Maatwebsite\Excel\Facades\Excel;

class GradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('Grado Escolar');
        return view('grados.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'grados.datatables.index';
            return datatables()->of(Grados::query())->addColumn('actions', $actions)
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
        $title = __('Crear nuevo Grado');
        $grados = new Grados;
        //dd($category);
        return view('grados.form', compact('grados', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grados = Grados::create($request->input());

        return redirect(route('grados.index'))->with('message', [
            'success', __("Nuevo grado creado correctamente")
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
    public function edit(Grados $grados, $id)
    {
        $title = __('Actualizar Grado');
        $grados = Grados::find($id);
        return view('grados.form', compact('grados', 'title'));
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
        $grado = Grados::findOrFail($id);

        $grado->fill($request->input())->save();

        return redirect(route('grados.index'))->with('message', [
            'success', __("Actualizado correctamente")
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
        $grados = Grados::find($id);
        $grados->delete();
        return redirect(route('grados.index'))->with('message', [
            'success', __("Grado borrado correctamente")
        ]);
    }

    public function cargarGrados()
    {
        $title = __('Importar Grados');
        return view('grados.import_grados',compact('title'));
    }
    public function importarGrados()
    {
        Excel::import(new GradosImport, request()->file('file'));

        return redirect(route('grados.index'))->with('message', [
            'success', __("Grados importadas Correctamente")
        ]);
    }
}
