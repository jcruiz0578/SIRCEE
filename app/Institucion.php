<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Institucion
 *
 * @mixin \Eloquent
 */
class Institucion extends Model
{
	protected $table = 'instituciones';
	protected $primaryKey = 'id_procedencia';
	//protected $primaryKey = 'id';
	// or null
	public $incrementing = true;
	public $timestamps = false;
	protected $fillable = [
		'id_procedencia',
		'estado',
		'municipio',
		'parroquia',
		'codigo_plantel',
		'codigo_estadístico',
		'codigo_circuito',
		'nombre_plantel',
		'nivel',
		'dependencia'
	];

	public function ingreso()
	{
		return $this->hasMany('App\Ingreso', 'id_procedencia');
	}
}
