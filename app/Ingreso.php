<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ingreso
 *
 * @mixin \Eloquent
 */
class Ingreso extends Model
{
	protected $table = 'ingresos';
	protected $primaryKey = 'id_ingreso';
	// or null
	public $incrementing = false;
	public $timestamps = false;
	protected $fillable = [
		'id_ingreso',
		'periodoescolar',
		'cedulaest',
		'repitienteest',
		'materiapendiente',
		'mp_nombres',
		'rezagado',
		'nuevo_ingreso',
		'condicionest',
		'anoest',
		'seccion',
		'cedularep',
		'fecha_ingreso',
		'mes_ingreso',
		'fechasistema',
		'reinscripcion',
		'fechareinscripcion',
		'tipoinscripcion',
		'status',
		'observacion',
		'inscriptor',
		'ficha',
		'nombre_plantel'
	];
	public function representante()
	{
		return $this->belongsTo('App\Representante', 'cedularep');
	}
	public function estudiante()
	{
		return $this->belongsTo('App\Estudiante', 'cedulaest');
	}

	public function egreso()
	{
		return $this->hasOne('App\Egreso', 'id_ingreso');
	}


	public function talla()
	{
		return $this->hasOne('App\Talla', 'id_ingreso');
	}
	public function vivienda()
	{
		return $this->hasOne('App\Vivienda', 'id_ingreso');
	}
	public function documento()
	{
		return $this->hasOne('App\Documento', 'id_ingreso');
	}

	public function institucion()
	{
		return $this->belongsTo('App\Institucion', 'nombre_plantel');
	}
}
