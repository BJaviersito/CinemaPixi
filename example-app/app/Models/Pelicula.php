<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 *
 * @property $id
 * @property $Titulo_peli
 * @property $Imagen
 * @property $Descripcion
 * @property $Ano_Lanzamiento
 * @property $Clasificacion
 * @property $URL
 * @property $created_at
 * @property $updated_at
 *
 * @property Categorium[] $categorias
 * @property TipoVideo[] $tipoVideos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pelicula extends Model
{
    
    static $rules = [
		'Titulo_peli' => 'required',
		'Imagen' => 'required',
		'Descripcion' => 'required',
		'Ano_Lanzamiento' => 'required',
		'Clasificacion' => 'required',
		'URL' => 'required',
    ];

    protected $perPage = 20;
    protected $table='pelicula';
    protected $primaryKey='id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Titulo_peli','Imagen','Descripcion','Ano_Lanzamiento','Clasificacion','URL'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categorias()
    {
        return $this->hasMany('App\Models\Categorium', 'Pelicula_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoVideos()
    {
        return $this->hasMany('App\Models\TipoVideo', 'Pelicula_id', 'id');
    }
    

}
