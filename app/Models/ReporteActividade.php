<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReporteActividade
 *
 * @property $liberacion_id
 * @property $actividad_id
 * @property $evaluacion
 *
 * @property Actividade $actividade
 * @property Liberacion $liberacion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReporteActividade extends Model
{
    
    static $rules = [
		'liberacion_id' => 'required',
		'actividad_id' => 'required',
		'evaluacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['liberacion_id','actividad_id','evaluacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function actividade()
    {
        return $this->hasOne('App\Models\Actividade', 'id', 'actividad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function liberacion()
    {
        return $this->hasOne('App\Models\Liberacion', 'id', 'liberacion_id');
    }
    

}
