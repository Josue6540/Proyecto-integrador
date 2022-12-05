<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Modalidad;
use App\Models\Sistema;



class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::all();
        return view('carrera.index')->with('carreras',$carreras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidades = Modalidad::all();
        $sistemas = Sistema::all();
        $carreras = Carrera::all();

        return view('carrera.create',['modalidades'=>$modalidades,'sistemas'=>$sistemas,'carreras'=>$carreras]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $carreras = new Carrera();



        $carreras->nombre= $request->nombre;
        $logo = $request->file('logo')->store('logos');
        $carreras->logo= $logo;
        $carreras->numero= $request->numero;
        $carreras->modalidad_id= $request->modalidad;
        $carreras->sistema_id= $request->sistema;


        $carreras->save();





        return redirect('/carrera');
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
        $modalidades = Modalidad::all();
        $sistemas = Sistema::all();
        $carrera = Carrera::find($id);
        return view('carrera.edit',['modalidades'=>$modalidades,'sistemas'=>$sistemas,'carrera'=>$carrera]);
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
        $modalidades = Modalidad::all();
        $sistemas = Sistema::all();
        $carreras = Carrera::find($id);
        $carreras->nombre= $request->nombre;
        $carreras->logo= $request->logo;
        $carreras->numero= $request->numero;
        $carreras->modalidad_id= $request->modalidad;
        $carreras->sistema_id= $request->sistema;


        $carreras->save();
        return redirect('carrera');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carreras = Carrera::find($id);
        $carreras->delete();
        return redirect('/carrera');
    }
}
