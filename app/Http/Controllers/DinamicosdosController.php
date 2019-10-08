<?php

namespace App\Http\Controllers;

use App\Dinamicosdos;
use Illuminate\Http\Request;

class DinamicosdosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Dinamicos dos";
        return view('dinamicosdos.crear', compact('title'));
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
        $datos = $request->data;

        foreach($datos as $ep=>$d)
        {
            $din=new Dinamicosdos();
            $din->nom=$d['nom'];
            $din->ap=$d['ap'];
            $din->am=$d['am'];
            $din->tel=$d['tel'];
            $din->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dinamicosdos  $dinamicosdos
     * @return \Illuminate\Http\Response
     */
    public function show(Dinamicosdos $dinamicosdos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dinamicosdos  $dinamicosdos
     * @return \Illuminate\Http\Response
     */
    public function edit(Dinamicosdos $dinamicosdos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dinamicosdos  $dinamicosdos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dinamicosdos $dinamicosdos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dinamicosdos  $dinamicosdos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dinamicosdos $dinamicosdos)
    {
        //
    }
}
