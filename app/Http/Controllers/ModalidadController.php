<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidad;


class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidads = Modalidad::all();
        return view('modalidad.indexmodalidad')->with('modalidads',$modalidads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modalidad.crearmodalidad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modalidads = new Modalidad();

        $modalidads->nombre= $request->Nombre;


        $modalidads->save();

        return redirect('/indexmodalidad');

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
        $modalidads = Modalidad::find($id);
        return view('modalidad.edit')->with('modalidad',$modalidads);
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
        $modalidads = Modalidad::find($id);
        $modalidads->Nombre = $request->get('Nombre');
        $modalidads->save();

        return redirect('/indexmodalidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidads = Modalidad::find($id);
        $modalidads->delete();
        return redirect('/indexmodalidad');
    }
}
