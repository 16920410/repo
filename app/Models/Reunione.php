<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    'hora_inicio'=>'required',
    'hora_fin'=>'required',
    'elaboro_id'=>'required',
    'valido_id'=>'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','lugar','orden','hora_inicio','hora_fin','elaboro_id','valido_id'];

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
