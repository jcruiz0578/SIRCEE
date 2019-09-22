<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Estudiante
 *
 * @mixin \Eloquent
 */
class Estudiante extends Model
{
	protected $table = 'estudiantes';
	protected $primaryKey = 'cedulaest';
	// or null
	public $incrementing = false;
	public $timestamps = false;
	protected $fillable = [
		'cedulaest',
		'apellidosest',
		'nombresest',
		'sexoest',
		'lateralidad',
		'fnest',
		'orden_nac',
		'estado_nac',
		'lugar_nac',
		'estado_civil',
		'direccionest',
		'telefonosest',
		'emailest',
		'nombre_plantel'
	];
	public function ingreso()
	{
		return $this->hasMany('App\Ingreso', 'cedulaest');
	}
}
