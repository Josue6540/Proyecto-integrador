<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable=[
        'num_personal',
        'user_id'
    ];

    public function alumno(){
        return $this->belongsTo(Alumno::Class);
    }
    public function carrera(){
        return $this->belongsTo(Carrera::Class);
    }

    public function jefe_carrera(){
        return $this->belongsTo(Jefe_Carrera::Class);
    }

    public function user(){
        return $this->belongsTo(User::Class, 'user_id');
    }
}
