<?php

namespace App\Http\Controllers;

use App\DireccionesAreas;
use Illuminate\Http\Request;
use App\Imports\DireccionesAreasImport;
use Maatwebsite\Excel\Facades\Excel;


class DireccionesAreasController extends Controller
{
    public function index()
    {
        $title = __('Dirección por Área');
        return view('direccionesareas.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'direccionesareas.datatables.index';
            return datatables()->of(Direccionesareas::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }


    public function create()
    {
        $title = __('Crear nueva Dirección General');
        $direccionesareas = new Direccionesareas;
        //dd($category);
        return view('direccionesareas.form', compact('direccionesareas', 'title'));
    }


    public function store(Request $request)
    {
        $direccionesareas = Direccionesareas::create($request->input());

        return redirect(route('direccionesareas.create'))->with('message', [
            'success', __("Nuevo dirección creada correctamente")
        ]);
    }


    public function show(Grados $grados)
    {
        //
    }


    public function edit($id)
    {
        $title = __('Actualizar Dirección por Área');
        $direccionesareas = Direccionesareas::find($id);
        return view('direccionesareas.form', compact('direccionesareas', 'title'));
    }


    public function update(Request $request, $id)
    {
        $direccionesareas = Direccionesareas::findOrFail($id);

        $direccionesareas->fill($request->input())->save();

        return redirect(route('direccionesareas.index'))->with('message', [
            'success', __("Dirección actualizada correctamente")
        ]);
        //
    }


    public function destroy($id)
    {
        //dd($id);
        $direccionesareas = Direccionesareas::find($id);
        $direccionesareas->delete();
        return redirect(route('direccionesareas.index'))->with('message', [
            'success', __("Dirección borrada correctamente")
        ]);
    }

    public function cargarDireccionesAreas()
    {
        $title = __('Importar Dirección por Area');
        return view('direccionesareas.import_direccionesareas',compact('title'));
    }
    public function importarDireccionesAreas()
    {
        Excel::import(new DireccionesAreasImport, request()->file('file'));

        return redirect(route('direccionesareas.index'))->with('message', [
            'success', __("Dirección por Areas importadas Correctamente")
        ]);
    }
}
