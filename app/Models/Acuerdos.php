<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acuerdos extends Model
{
    use HasFactory;
    static $rules = [
        'orden_id' => 'required',
        'descripcion' => 'required',
        'reunion_id' => 'required',

    ];
    protected $fillable =['reunion_id','orden_id','descripcion'];
    
}
