<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Talla
 *
 * @mixin \Eloquent
 */
class Talla extends Model {
	protected $table = 'tallas';
	protected $primaryKey = 'id_ingreso';
	// or null
	public $incrementing = false;
	public $timestamps = false;
	protected $fillable = [ 
			'id_ingreso',
			'altura',
			'peso',
			'pantalon',
			'camisa',
			'zapatos' 
	];
	public function ingreso() {
		return $this->belongsTo ( 'App\Ingreso', 'id_ingreso' );
	}
}
