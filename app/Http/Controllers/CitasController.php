<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();
        return view('cita.index')->with('citas',$citas);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $citas = new Cita();

        $citas->Nombre= $request->get('Nombre');
        $citas->Apellido_p = $request->get('Apellido_p');
        $citas->Apellido_m = $request->get('Apellido_m');
        $citas->Asunto = $request->get('Asunto');

        $citas->fecha = $request->get('fecha');

        $citas->save();

        return redirect('/cita');
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
        $cita = Cita::find($id);
        return view('cita.edit')->with('cita',$cita);
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
        $cita = Cita::find($id);

        $cita->Nombre = $request->get('Nombre');
        $cita->Apellido_p = $request->get('Apellido_p');
        $cita->Apellido_m = $request->get('Apellido_m');
        $cita->Asunto = $request->get('Asunto');
        $cita->fecha = $request->get('fecha');

        $cita->save();

        return redirect('/cita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        return redirect('/cita');
    }
}
