<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlanEstudio
 *
 * @property $id
 * @property $nombre
 * @property $clave
 * @property $created_at
 * @property $updated_at
 *
 * @property MateriasPlan[] $materiasPlans
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PlanEstudio extends Model
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiasPlans()
    {
        return $this->hasMany('App\Models\MateriasPlan', 'plan_id', 'id');
    }
    

}
