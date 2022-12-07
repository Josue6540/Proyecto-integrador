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
        'user_id',
        'modalidad_id',
        'sistema_id',
    ];

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
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function modalidad(){
        return $this->belongsTo(Modalidad::Class, 'modalidad_id');
    }

    public function sistema(){
        return $this->belongsTo(Sistema::Class, 'sistema_id');
    }

    public function carrera(){
        return $this->belongsTo(Carrera::Class, 'carrera_id');
    }
}
