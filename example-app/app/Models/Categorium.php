<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorium
 *
 * @property $id
 * @property $Nombre_Categoria
 * @property $Pelicula_id
 * @property $Serie_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Pelicula $pelicula
 * @property Serie $serie
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categorium extends Model
{
    
    static $rules = [
		'Nombre_Categoria' => 'required',
		'Pelicula_id' => 'required',
		'Serie_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_Categoria','Pelicula_id','Serie_id'];


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
    public function serie()
    {
        return $this->hasOne('App\Models\Serie', 'id', 'Serie_id');
    }
    

}
