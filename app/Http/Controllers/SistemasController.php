<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistema;


class SistemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistemas = Sistema::all();
        return view('Sistema.indexsistema')->with('sistemas',$sistemas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.crearSistema');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sistemas = new Sistema();

        $sistemas->nombre= $request->Nombre;


        $sistemas->save();

        return redirect('/indexsistema');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sistemas = Sistema::find($id);
        return view('Sistema.edit')->with('sistema',$sistemas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sistemas = Sistema::find($id);
        $sistemas->Nombre = $request->get('Nombre');
        $sistemas->save();

        return redirect('/indexsistema');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sistemas = Sistema::find($id);
        $sistemas->delete();
        return redirect('/indexsistema');
    }
}
