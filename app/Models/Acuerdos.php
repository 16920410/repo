<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acuerdos extends Model
{
    use HasFactory;
    protected $fillable =['reunion_id','descripcion'];
}
