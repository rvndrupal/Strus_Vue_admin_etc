<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function home()
    {
        $title="Clientes";
        return view('clientes.index',compact('title'));
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $clientes = Clientes::orderBy('id', 'DESC')->paginate(4);
        }
        else{
            $clientes = Clientes::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'DESC')->paginate(4);
        }
        return [
            'pagination' => [
                'total'        => $clientes->total(),
                'current_page' => $clientes->currentPage(),
                'per_page'     => $clientes->perPage(),
                'last_page'    => $clientes->lastPage(),
                'from'         => $clientes->firstItem(),
                'to'           => $clientes->lastItem(),
            ],
            'clientes' => $clientes
        ];
    }

    public function selectCategoria(Request $request){
        if (!$request->ajax()) return redirect('/');
        $clientes = Clientes::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['categorias' => $clientes];
    }

    public function listarPdf(){
        $clientes = Clientes::select('nombre','descripcion','condicion')->orderBy('nombre', 'asc')->get();
        $cont=Clientes::count();

        $pdf = \PDF::loadView('pdf.categoriaspdf',['categorias'=>$clientes,'cont'=>$cont])->setPaper('a4', 'portrait');
        return $pdf->download('categorias.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $clientes = new Clientes();
        $clientes->nom = $request->nom;
        $clientes->ap = $request->ap;
        $clientes->am = $request->am;
        $clientes->condicion = '1';
        $clientes->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $clientes = Clientes::findOrFail($request->id);
        $clientes->nom = $request->nom;
        $clientes->ap = $request->ap;
        $clientes->am = $request->am;
        $clientes->condicion = '1';
        $clientes->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $categoria = Clientes::findOrFail($request->id);
        $categoria->condicion = '0';
        $categoria->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $categoria = Clientes::findOrFail($request->id);
        $categoria->condicion = '1';
        $categoria->save();
    }

}
