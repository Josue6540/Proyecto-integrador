<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::all();
        return view('docente.index')->with('docentes',$docentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docente.create');

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
            'email' => 'required|string|unique:users,email',
            'matricula' => 'required|string|unique:docentes,num_personal',
        ]);

        $user = new User();
        $user->name= $request->Nombre;
        $user->paterno = $request->Apellido_p;
        $user->materno = $request->Apellido_m;
        $user->rol= 'docente';
        $user->email = $request->email;
        $user->password = Hash::make($request->paswword);
        $user->save();

        DB::table('docentes')->insert([
            'num_personal' => $request->matricula,
            'user_id' => $user->id
        ]);

        return redirect('/docente');
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
        $docente = Docente::find($id);
        return view('docente.edit', compact('docente'));
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
            'num_personal' => 'required|string|unique:docentes,num_personal,'.$id,
        ]);

        DB::table('docentes')
              ->where('id', $id)
              ->update(['num_personal' => $request->num_personal]);
        $docente = Docente::find($id);
        $request->validate([
            'email' => 'required|string|unique:users,email,'.$docente->user_id,
        ]);
        $user = User::find($docente->user_id);
        $user->name= $request->Nombre;
        $user->paterno = $request->paterno;
        $user->materno = $request->materno;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('/docente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);
        Docente::destroy($id);
        User::destroy($docente->user_id);
        return redirect('/docente');
    }
}
