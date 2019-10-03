<?php

namespace App\Http\Controllers;

use App\Niveles;
use Illuminate\Http\Request;
use App\Imports\NivelesImport;
use Maatwebsite\Excel\Facades\Excel;



class NivelesController extends Controller
{
    public function index()
    {
        $title = __('Nivel');
        return view('niveles.index', compact('title'));
    }

    public function json () {
        if (request()->ajax()) {
            $actions = 'niveles.datatables.index';
            return datatables()->of(Niveles::query())->addColumn('actions', $actions)
                ->rawColumns(['actions'])
                ->toJson();
        }
    }


    public function create()
    {
        $title = __('Crear nuevo Nivel');
        $niveles = new Niveles;
        //dd($category);
        return view('niveles.form', compact('niveles', 'title'));
    }


    public function store(Request $request)
    {
        $niveles = Niveles::create($request->input());

        return redirect(route('niveles.create'))->with('message', [
            'success', __("Nuevo nivel creado correctamente")
        ]);
    }


    public function show(Grados $grados)
    {
        //
    }


    public function edit($id)
    {
        $title = __('Actualizar Nivel');
        $niveles = Niveles::find($id);
        return view('niveles.form', compact('niveles', 'title'));
    }


    public function update(Request $request, $id)
    {
        $niveles = Niveles::findOrFail($id);

        $niveles->fill($request->input())->save();

        return redirect(route('niveles.index'))->with('message', [
            'success', __("Nivel actualizado correctamente")
        ]);
        //
    }


    public function destroy($id)
    {
        //dd($id);
        $niveles = Niveles::find($id);
        $niveles->delete();
        return redirect(route('niveles.index'))->with('message', [
            'success', __("Nivel borrado correctamente")
        ]);
    }

    public function cargarNiveles()
    {
        $title = __('Importar Niveles');
        return view('niveles.import_niveles',compact('title'));
    }
    public function importarNiveles()
    {
        Excel::import(new NivelesImport, request()->file('file'));

        return redirect(route('niveles.index'))->with('message', [
            'success', __("Niveles importados Correctamente")
        ]);
    }
}
