<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class TbUsuario
 *
 * @property $id
 * @property $nombre
 * @property $documento
 * @property $password
 * @property $genero
 * @property $fecha_nacimiento
 * @property $telefono
 * @property $eps_id
 * @property $rol_id
 * @property $estado
 * @property $email
 * @property $email_verified_at
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TbUsuario extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'documento' => 'required',
		'genero' => 'required',
		'fecha_nacimiento' => 'required',
		'telefono' => 'required',
		'eps_id' => 'required',
		'rol_id' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','documento','genero','fecha_nacimiento','telefono','eps_id','rol_id','email'];

    public function calcularedad($fecha_nacimiento){
      $date = Carbon::now();
      $edad = $date->diff($fecha_nacimiento);

      return $edad->y;
    }

}
