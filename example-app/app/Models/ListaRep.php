<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ListaRep
 *
 * @property $id
 * @property $Nombre_lista
 *
 * @property Perfil[] $perfils
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ListaRep extends Model
{
    
    static $rules = [
		'Nombre_lista' => 'required',
    ];

    protected $perPage = 20;
    protected $table='lista_rep';
    protected $primaryKey='id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre_lista'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function perfils()
    {
        return $this->hasMany('App\Models\Perfil', 'id_Lista', 'id');
    }
    

}
