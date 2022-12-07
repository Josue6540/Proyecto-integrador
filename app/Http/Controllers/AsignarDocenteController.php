<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Alumno;

class AsignarDocenteController extends Controller
{
    public function alumnosasignados()
    {
        $asigns = DB::table('alumno_docente')
        ->select('alumno.name as namea', 'alumno.paterno as paternoa', 'alumno.materno as maternoa', 'carreras.nombre as carrera', 'alumnos.matricula', 'alumno_docente.alumno_id')
        ->leftJoin('alumnos', 'alumno_docente.alumno_id', '=', 'alumnos.id')
        ->leftJoin('users as alumno', 'alumnos.user_id', '=', 'alumno.id')
        ->leftJoin('carreras', 'alumnos.carrera_id', '=', 'carreras.id')
        ->where('docente_id', Auth::user()->id)
        ->get();

        return view('moddocente.index')->with('asigns',$asigns);
    }


    public function proyecto($alumno)
    {
        return view('moddocente.proyecto')->with('alumnoshow',$alumno);
    }

    public function documents()
    {
        return view('modalumno.index');
    }

    public function titulo(Request $request)
    {
        if(Auth::user()->rol === 'docente'){
            DB::table('documents')
              ->where([['id', $request->record]])
              ->update([
                'nombre' => $request->titulo,
              ]);
              return redirect('proyecto/'.$request->alumno);
        }else{
            $alumno = Alumno::where('user_id', Auth::user()->id)->get();
            DB::table('documents')->insert([
                'nombre' => $request->titulo,
                'type' => 'titulo',
                'alumno_id' => $alumno[0]['id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            return redirect('/documents');
        }

        
    }

    public function carta_aceptacion(Request $request)
    {
        if(Auth::user()->rol === 'docente'){
            DB::table('documents')
              ->where([['id', $request->record]])
              ->update([
                'nombre' => $request->observacion,
              ]);
              return redirect('proyecto/'.$request->alumno);
        }else{
            $alumno = Alumno::where('user_id', Auth::user()->id)->get();
            $carta_aceptacion = $request->file('carta_aceptacion')->store('carta_aceptacion');
            DB::table('documents')->insert([
                'nombre' => $request->observacion,
                'document' => $carta_aceptacion,
                'type' => 'carta aceptacion',
                'alumno_id' => $alumno[0]['id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            return redirect('/documents');
        }
    }

    public function carta_presentacion(Request $request)
    {
        if(Auth::user()->rol === 'docente'){
            DB::table('documents')
              ->where([['id', $request->record]])
              ->update([
                'nombre' => $request->observacion,
              ]);
              return redirect('proyecto/'.$request->alumno);
        }else{
            $alumno = Alumno::where('user_id', Auth::user()->id)->get();
            $carta_presentacion = $request->file('carta_presentacion')->store('carta_presentacion');
            DB::table('documents')->insert([
                'nombre' => $request->observacion,
                'document' => $carta_presentacion,
                'type' => 'carta presentacion',
                'alumno_id' => $alumno[0]['id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            return redirect('/documents');
        }
    }

    public function reportes(Request $request)
    {
        if(Auth::user()->rol === 'docente'){
            DB::table('documents')
              ->where([['id', $request->record]])
              ->update([
                'nombre' => $request->observacion,
              ]);
              return redirect('proyecto/'.$request->alumno);
        }else{
            $alumno = Alumno::where('user_id', Auth::user()->id)->get();
            $reportes = $request->file('reportes')->store('reportes');
            DB::table('documents')->insert([
                'nombre' => $request->observacion,
                'document' => $reportes,
                'type' => 'reportes',
                'alumno_id' => $alumno[0]['id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            return redirect('/documents');
        }
    }

    public function evaluaciones(Request $request)
    {
        if(Auth::user()->rol === 'docente'){
            DB::table('documents')
              ->where([['id', $request->record]])
              ->update([
                'nombre' => $request->observacion,
              ]);
              return redirect('proyecto/'.$request->alumno);
        }else{
            $alumno = Alumno::where('user_id', Auth::user()->id)->get();
            $evaluaciones = $request->file('evaluaciones')->store('evaluaciones');
            DB::table('documents')->insert([
                'nombre' => $request->observacion,
                'document' => $evaluaciones,
                'type' => 'evaluaciones',
                'alumno_id' => $alumno[0]['id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            return redirect('/documents');
        }
    }

    public function carta_liberacion(Request $request)
    {
        if(Auth::user()->rol === 'docente'){
            DB::table('documents')
              ->where([['id', $request->record]])
              ->update([
                'nombre' => $request->observacion,
              ]);
              return redirect('proyecto/'.$request->alumno);
        }else{
            $alumno = Alumno::where('user_id', Auth::user()->id)->get();
            $carta_liberacion = $request->file('carta_liberacion')->store('carta_liberacion');
            DB::table('documents')->insert([
                'nombre' => $request->observacion,
                'document' => $carta_liberacion,
                'type' => 'carta liberacion',
                'alumno_id' => $alumno[0]['id'],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            return redirect('/documents');
        }
    }

}
