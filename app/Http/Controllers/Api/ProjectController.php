<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function getproject($id)
    {
        $alumno = DB::table('alumnos')->where('user_id', $id)->first();
        $user = DB::table('alumnos')
        ->select('users.*')
        ->leftJoin('users', 'alumnos.user_id', '=', 'users.id')
        ->where('user_id', $id)
        ->first();
        $titulo = DB::table('documents')->where([['alumno_id', $alumno->id], ['type','titulo']])->latest()->first();
        $ct_ac = DB::table('documents')->where([['alumno_id', $alumno->id], ['type','carta aceptacion']])->count();
        $ct_pr = DB::table('documents')->where([['alumno_id', $alumno->id], ['type','carta presentacion']])->count();
        $report = DB::table('documents')->where([['alumno_id', $alumno->id], ['type','reportes']])->count();
        $eval = DB::table('documents')->where([['alumno_id', $alumno->id], ['type','evaluaciones']])->count();
        $ct_li = DB::table('documents')->where([['alumno_id', $alumno->id], ['type','carta liberacion']])->count();
        return response()->json([
            'titulo' => isset($titulo->nombre) ? $titulo->nombre: 'No se ha agregado el Título del proyecto',
            'ct_ac' => $ct_ac,
            'ct_pr' => $ct_pr,
            'report' => $report,
            'eval' => $eval,
            'ct_li' => $ct_li,
            'user' => $user
        ]);
    }
}
