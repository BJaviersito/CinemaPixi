<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $Nombre
 * @property $Correo
 * @property $Contrasena
 * @property $FechaRegistros
 *
 * @property Perfil[] $perfils
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'Correo' => 'required',
		'Contrasena' => 'required',
		'FechaRegistros' => 'required',
    ];

    protected $perPage = 20;
    protected $table='usuario';
    protected $primaryKey='id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Correo','Contrasena','FechaRegistros'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function perfils()
    {
        return $this->hasMany('App\Models\Perfil', 'Usuario_id', 'id');
    }
    

}
