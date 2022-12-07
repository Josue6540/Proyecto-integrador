<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Modalidad;
use App\Models\Sistema;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $modalidades = Modalidad::all();
        $sistemas = Sistema::all();
        $carreras = Carrera::all();
        return view('alumnos.create')->with(['modalidades'=>$modalidades, 'sistemas'=> $sistemas, 'carreras'=> $carreras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'matricula' => 'required|unique:alumnos,matricula',
        ]);

        $user = new User();
        $user->name= $request->Nombre;
        $user->paterno = $request->Apellido_p;
        $user->materno = $request->Apellido_m;
        $user->rol= 'alumno';
        $user->email = $request->email;
        $user->password = Hash::make($request->paswword);
        $user->save();

        DB::table('alumnos')->insert([
            'matricula' => $request->matricula,
            'carrera_id' => $request->carrera,
            'modalidad_id' => $request->modalidad,
            'sistema_id' => $request->sistema,
            'user_id' => $user->id
        ]);

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
        $carreras = Carrera::all();
        return view('alumnos.edit',['modalidades'=>$modalidades,'sistemas'=>$sistemas,'carreras'=>$carreras, 'alumnos'=>$alumnos]);
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
        $request->validate([
            'matricula' => 'required|unique:alumnos,matricula,'.$id,
        ]);
        DB::table('alumnos')
              ->where('id', $id)
              ->update([
            'matricula' => $request->matricula,
            'carrera_id' => $request->carrera,
            'modalidad_id' => $request->modalidad,
            'sistema_id' => $request->sistema,
        ]);
        $alumno = Alumno::find($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$alumno->user_id,
        ]);
        $user = User::find($alumno->user_id);
        $user->name= $request->Nombre;
        $user->paterno = $request->Apellido_p;
        $user->materno = $request->Apellido_m;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('/alumno');
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
        User::destroy($alumnos->user_id);
        return redirect('/alumno');
    }
}
