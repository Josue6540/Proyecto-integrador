<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Carrera extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre_carrera',
        'logo',
        'numero'
    ];

    public function sistema(){
        return $this->belongsTo(Sistema::class);
    }
    public function modalidad(){
        return $this->belongsTo(Modalidad::class);
    }

}
