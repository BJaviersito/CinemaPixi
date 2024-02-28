<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resena
 *
 * @property $id
 * @property $Calificacion
 * @property $Fecha_C
 * @property $Resena
 * @property $created_at
 * @property $updated_at
 *
 * @property Perfil[] $perfils
 * @property TipoVideo[] $tipoVideos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Resena extends Model
{
    
    static $rules = [
		'Calificacion' => 'required',
		'Fecha_C' => 'required',
		'Resena' => 'required',
    ];

    protected $perPage = 20;
    protected $table='resena';
    protected $primaryKey='id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Calificacion','Fecha_C','Resena'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function perfils()
    {
        return $this->hasMany('App\Models\Perfil', 'Resena_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoVideos()
    {
        return $this->hasMany('App\Models\TipoVideo', 'Resena_id', 'id');
    }
    

}
