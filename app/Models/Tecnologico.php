<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tecnologico
 *
 * @property $id
 * @property $nombre
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tecnologico extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','correo'];



}
