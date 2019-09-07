<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Documento
 *
 * @mixin \Eloquent
 */
class Documento extends Model {
	protected $table = 'documentos';
	protected $primaryKey = 'id_ingreso';
	// or null
	public $incrementing = false;
	public $timestamps = false;
	protected $fillable = [ 
			'id_ingreso',
			'dpartida',
			'dfotos',
			'dcedularep',
			'dcedulaest',
			'dnotas_certifi',
			'dcarnet',
			'dpasaporte_alimentario',
			'dcoleccionbicentenaria',
			'becas',
			'permisolopnna',
			'canaima',
			'canaima_funciona',
			'serial_canaima' 
	];
	public function ingreso() {
		return $this->belongsTo ( 'App\Ingreso', 'id_ingreso' );
	}
}
