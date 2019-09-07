<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Vivienda
 *
 * @mixin \Eloquent
 */
class Vivienda extends Model {
	protected $table = 'vivienda';
	protected $primaryKey = 'id_ingreso';
	// or null
	public $incrementing = false;
	public $timestamps = false;
	protected $fillable = [ 
			'id_ingreso',
			'tipovia',
			'direccionest',
			'zonaubicacion',
			'tipovivienda',
			'ubicacionvivienda',
			'condicionvivienda',
			'infraestructura' 
	];
	public function ingreso() {
		return $this->belongsTo ( 'App\Ingreso', 'id_ingreso' );
	}
}
