<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvalidacionMateria extends Model
{
    use HasFactory;
    static $rules = [
        'materia_cursada' => 'required',
        'materia_convalidada' => 'required',
        'calificacion' => 'required',
        'porcentaje' => 'required',
        'convalidacion_id' => 'required',
    ];
    protected $fillable = [
        'materia_cursada',
        'materia_convalidada',
        'calificacion',
        'porcentaje',
        'convalidacion_id',
    ];
}
