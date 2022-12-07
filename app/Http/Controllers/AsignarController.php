<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AsignarController extends Controller
{
    public function tsu(){
        $alumnos = DB::table('alumnos')
        ->select('users.*','alumnos.id as idalumno')
        ->leftJoin('users', 'alumnos.user_id', '=', 'users.id')
        ->leftJoin('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
        ->where('carreras.nombre', 'like', '%Tsu%')
        ->get();

        $docentes = User::where('rol', 'docente')->get();

        $asigns = DB::table('alumno_docente')
        ->select('alumno.name as namea', 'alumno.paterno as paternoa', 'alumno.materno as maternoa', 'docente.*', 'carreras.nombre as carrera')
        ->leftJoin('alumnos', 'alumno_docente.alumno_id', '=', 'alumnos.id')
        ->leftJoin('users as alumno', 'alumnos.user_id', '=', 'alumno.id')
        ->leftJoin('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
        ->leftJoin('users as docente', 'alumno_docente.docente_id', '=', 'docente.id')
        ->where('carreras.nombre', 'like', '%Tsu%')
        ->get();

        return view('asignar.tsu')->with(['alumnos'=>$alumnos, 'docentes'=>$docentes, 'asigns'=>$asigns]);
    }

    public function tsuasignar(Request $request){
        DB::table('alumno_docente')->insert([
            'alumno_id' => $request->alumno,
            'docente_id' => $request->docente,
        ]);

        return redirect('/tsu');
    }

    public function ing(){
        $alumnos = DB::table('alumnos')
        ->select('users.*','alumnos.id as idalumno')
        ->leftJoin('users', 'alumnos.user_id', '=', 'users.id')
        ->leftJoin('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
        ->where('carreras.nombre', 'like', '%Ing%')
        ->get();

        $docentes = User::where('rol', 'docente')->get();

        $asigns = DB::table('alumno_docente')
        ->select('alumno.name as namea', 'alumno.paterno as paternoa', 'alumno.materno as maternoa', 'docente.*', 'carreras.nombre as carrera')
        ->leftJoin('alumnos', 'alumno_docente.alumno_id', '=', 'alumnos.id')
        ->leftJoin('users as alumno', 'alumnos.user_id', '=', 'alumno.id')
        ->leftJoin('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
        ->leftJoin('users as docente', 'alumno_docente.docente_id', '=', 'docente.id')
        ->where('carreras.nombre', 'like', '%Ing%')
        ->get();

        return view('asignar.ing')->with(['alumnos'=>$alumnos, 'docentes'=>$docentes, 'asigns'=>$asigns]);
    }

    public function ingasignar(Request $request){
        DB::table('alumno_docente')->insert([
            'alumno_id' => $request->alumno,
            'docente_id' => $request->docente1,
        ]);

        DB::table('alumno_docente')->insert([
            'alumno_id' => $request->alumno,
            'docente_id' => $request->docente2,
        ]);

        DB::table('alumno_docente')->insert([
            'alumno_id' => $request->alumno,
            'docente_id' => $request->docente3,
        ]);

        return redirect('/ing');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asignar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
