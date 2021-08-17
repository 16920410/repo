<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Liberacion
 *
 * @property $id
 * @property $fecha
 * @property $docente_id
 * @property $semestre
 * @property $created_at
 * @property $updated_at
 *
 * @property Docente $docente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Liberacion extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'docente_id' => 'required',
		'semestre' => 'required',
    'elaboro_id' => 'required',
		'valido_id' => 'required',
  ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','docente_id','semestre', 'elaboro_id', 'valido_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'docente_id');
    }
    

}
