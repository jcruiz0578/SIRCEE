<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Representante
 *
 * @mixin \Eloquent
 */
class Representante extends Model {
	protected $table = 'representantes';
	protected $primaryKey = 'cedularep';
	// or null
	public $incrementing = false;
	public $timestamps = false;
	protected $fillable = [ 
			'cedularep',
			'apellidosrep',
			'nombresrep',
			'sexorep',
			'parentescorep',
			'direccionrep',
			'telefonosrep',
			'emailrep',
			'trabaja',
			'lugartrabajo',
			'sueldo' 
	];
	public function ingreso() {
		return $this->hasMany ( 'App\Ingreso', 'cedularep' );
	}
}
