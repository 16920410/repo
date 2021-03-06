<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materiacursada
 *
 * @property $id
 * @property $nombre
 * @property $clave
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materiacursada extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'clave' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','clave'];



}
