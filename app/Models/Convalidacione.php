<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Convalidacione
 *
 * @property $id
 * @property $nombre_alumno
 * @property $plan_externo
 * @property $plan_interno
 * @property $tecnologico_procedente
 * @property $tecnologico_receptor
 * @property $created_at
 * @property $updated_at
 *
 * @property ConvalidacionMateria[] $convalidacionMaterias
 * @property PlanEstudio $planEstudio
 * @property PlanEstudio $planEstudio
 * @property Tecnologico $tecnologico
 * @property Tecnologico $tecnologico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Convalidacione extends Model
{
    
    static $rules = [
		'nombre_alumno' => 'required',
		'plan_externo' => 'required',
		'plan_interno' => 'required',
		'tecnologico_procedente' => 'required',
		'tecnologico_receptor' => 'required',
		'fecha' => 'required',
		'elaboro_id' => 'required',
		'valido_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_alumno','plan_externo','plan_interno','tecnologico_procedente','tecnologico_receptor', 'fecha', 'elaboro_id', 'valido_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function convalidacionMaterias()
    {
        return $this->hasMany('App\Models\ConvalidacionMateria', 'convalidacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function planInterno()
    {
        $this->hasOne('App\Models\PlanEstudio', 'id', 'plan_externo');
        return $this->hasOne('App\Models\PlanEstudio', 'id', 'plan_interno');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function planExterno()
    {
        
        return $this->hasOne('App\Models\PlanEstudio', 'id', 'plan_externo');
    }
    
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function planEstudio()
    // {
    //     return 
    // }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tecnologicoProcedente()
    {
        return $this->hasOne('App\Models\Tecnologico', 'id', 'tecnologico_procedente');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tecnologicoReceptor()
    {
        return $this->hasOne('App\Models\Tecnologico', 'id', 'tecnologico_receptor');
    }
    
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function tecnologico()
    // {
    //     return $this->hasOne('App\Models\Tecnologico', 'id', 'tecnologico_receptor');
    // }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function elaboro()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'elaboro_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function valido()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'valido_id');
    }
    

}
