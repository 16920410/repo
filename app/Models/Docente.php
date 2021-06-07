<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 *
 * @property $id
 * @property $nombre
 * @property $rfc
 * @property $telefono
 * @property $puesto_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Puesto $puesto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Docente extends Model
{

    static $rules = [
		'nombre' => 'required',
		'rfc' => 'required',
		'telefono' => 'required',
		'puesto_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','rfc','telefono','puesto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puesto()
    {
        return $this->hasOne('App\Models\Puesto', 'id', 'puesto_id','cargo');
    }


}
