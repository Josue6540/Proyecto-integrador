<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Modalidad;
use App\Models\Sistema;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index')->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumnos = new Alumno();

        $alumnos->nombre= $request->Nombre;
        $alumnos->paterno = $request->paterno;
        $alumnos->materno = $request->materno;
        $alumnos->matricula= $request->matricula;
        $alumnos->carrera= $request->carrera;
        $alumnos->email = $request->email;
        $alumnos->password = $request->password;




        $alumnos->save();



        return redirect('/alumno');
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
        $alumnos = Alumno::find($id);
        $modalidades = Modalidad::all();
        $sistemas = Sistema::all();
        $carrera = Carrera::all();
        return view('carrera.edit',['modalidades'=>$modalidades,'sistemas'=>$sistemas,'carrera'=>$carrera, 'alumnos'=>$alumnos]);
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
        $carreras = Carrera::all();
        $alumnos = Alumno::find($id);
        $alumnos->nombre= $request->Nombre;
        $alumnos->paterno = $request->paterno;
        $alumnos->materno = $request->materno;
        $alumnos->matricula= $request->matricula;
        $alumnos->carrera= $request->carrera;
        $alumnos->email = $request->email;
        $alumnos->password = $request->password;


        $alumnos->save();
        return redirect('alumno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumnos = Alumno::find($id);
        $alumnos->delete();
        return redirect('/alumno');
    }
}
