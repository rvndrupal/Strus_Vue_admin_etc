<?php

namespace App\Http\Controllers;

use App\DireccionesGenerales;
use Illuminate\Http\Request;
use App\Imports\DireccionesGeneralesImport;
use Maatwebsite\Excel\Facades\Excel;


class DireccionesGeneralesController extends Controller
{
    public function index()
    {
        $title = __('Dirección General');
        return view('direccionesgenerales.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'direccionesgenerales.datatables.index';
            return datatables()->of(Direccionesgenerales::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }


    public function create()
    {
        $title = __('Crear nueva Dirección General');
        $direccionesgenerales = new direccionesgenerales;
        //dd($category);
        return view('direccionesgenerales.form', compact('direccionesgenerales', 'title'));
    }


    public function store(Request $request)
    {
        $direccionesgenerales = Direccionesgenerales::create($request->input());

        return redirect(route('direccionesgenerales.create'))->with('message', [
            'success', __("Nuevo dirección creada correctamente")
        ]);
    }


    public function show(Grados $grados)
    {
        //
    }


    public function edit($id)
    {
        $title = __('Actualizar Dirección General');
        $direccionesgenerales = Direccionesgenerales::find($id);
        return view('direccionesgenerales.form', compact('direccionesgenerales', 'title'));
    }


    public function update(Request $request, $id)
    {
        $direccionesgenerales = Direccionesgenerales::findOrFail($id);

        $direccionesgenerales->fill($request->input())->save();

        return redirect(route('direccionesgenerales.index'))->with('message', [
            'success', __("Dirección actualizada correctamente")
        ]);
        //
    }


    public function destroy($id)
    {
        //dd($id);
        $direccionesgenerales = Direccionesgenerales::find($id);
        $direccionesgenerales->delete();
        return redirect(route('direccionesgenerales.index'))->with('message', [
            'success', __("Dirección borrada correctamente")
        ]);
    }

    public function cargarDireccionesGenerales()
    {
        $title = __('Importar Dirección General');
        return view('direccionesgenerales.import_direccionesgenerales',compact('title'));
    }
    public function importarDireccionesGenerales()
    {
        Excel::import(new DireccionesGeneralesImport, request()->file('file'));

        return redirect(route('direccionesgenerales.index'))->with('message', [
            'success', __("Direcciones Generales importadas Correctamente")
        ]);
    }
}
