<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoVideo
 *
 * @property $id
 * @property $Nombre
 * @property $Pelicula_id
 * @property $Serie_id
 * @property $Resena_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Historial[] $historials
 * @property Pelicula $pelicula
 * @property Resena $resena
 * @property Serie $serie
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoVideo extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Pelicula_id' => 'required',
		'Serie_id' => 'required',
		'Resena_id' => 'required',
    ];

    protected $perPage = 20;
    protected $table='tipo_video';
    protected $primaryKey='id';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Pelicula_id','Serie_id','Resena_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historials()
    {
        return $this->hasMany('App\Models\Historial', 'Tipo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelicula()
    {
        return $this->hasOne('App\Models\Pelicula', 'id', 'Pelicula_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function resena()
    {
        return $this->hasOne('App\Models\Resena', 'id', 'Resena_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serie()
    {
        return $this->hasOne('App\Models\Serie', 'id', 'Serie_id');
    }
    

}
