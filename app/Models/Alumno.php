<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable=[
        'matricula',
        'carrera_id',
        'user_id'
    ];

    public function carrera(){
        return $this->belongsTo(Carrera::Class);
    }

    public function docente(){
        return $this->hasMany(Docente::Class);
    }
    public function reportes(){
        return $this->hasMany(Reportes::Class);
    }
    public function evaluaciones(){
        return $this->hasMany(Evaluaciones::Class);
    }

    public function user(){
        return $this->hasOne(User::Class);
    }
}
