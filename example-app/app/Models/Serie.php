<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Serie
 *
 * @property $id
 * @property $Titulo_serie
 * @property $N_Episodio
 * @property $N_Temporada
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
class Serie extends Model
{
    
    static $rules = [
		'Titulo_serie' => 'required',
		'N_Episodio' => 'required',
		'N_Temporada' => 'required',
		'Imagen' => 'required',
		'Descripcion' => 'required',
		'Ano_Lanzamiento' => 'required',
		'Clasificacion' => 'required',
		'URL' => 'required',
    ];

    protected $perPage = 20;
    protected $table='serie';
    protected $primaryKey='id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Titulo_serie','N_Episodio','N_Temporada','Imagen','Descripcion','Ano_Lanzamiento','Clasificacion','URL'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categorias()
    {
        return $this->hasMany('App\Models\Categorium', 'Serie_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipoVideos()
    {
        return $this->hasMany('App\Models\TipoVideo', 'Serie_id', 'id');
    }
    

}
