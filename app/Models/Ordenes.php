<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;
    static $rules = [
        'num_orden' => 'required',
        'descripcion' => 'required',
        'reunion_id' => 'required'

    ];
    public $fillable = ['num_orden','descripcion','reunion_id'];
}
