<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MateriasPlan
 *
 * @property $plan_id
 * @property $materia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Materia $materia
 * @property PlanEstudio $planEstudio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MateriasPlan extends Model
{
    protected $table = 'materias_plan';
    
    static $rules = [
		'plan_id' => 'required',
		'materia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['plan_id','materia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'materia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function planEstudio()
    {
        return $this->hasOne('App\Models\PlanEstudio', 'id', 'plan_id');
    }
    

}
