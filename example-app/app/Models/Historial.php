<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Historial
 *
 * @property $id
 * @property $Fecha_Visualisacion
 * @property $Perfil_id
 * @property $Tipo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Perfil $perfil
 * @property TipoVideo $tipoVideo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Historial extends Model
{
    
    static $rules = [
		'Fecha_Visualisacion' => 'required',
		'Perfil_id' => 'required',
		'Tipo_id' => 'required',
    ];

    protected $perPage = 20;
    protected $table='historial';
    protected $primaryKey='id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Fecha_Visualisacion','Perfil_id','Tipo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function perfil()
    {
        return $this->hasOne('App\Models\Perfil', 'id', 'Perfil_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoVideo()
    {
        return $this->hasOne('App\Models\TipoVideo', 'id', 'Tipo_id');
    }
    

}
