<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reunione
 *
 * @property $id
 * @property $fecha
 * @property $lugar
 * @property $orden
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reunione extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'lugar' => 'required',
		'orden' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','lugar','orden'];



}
