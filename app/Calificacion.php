<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';
	protected $primaryKey = 'id';
	// or null
	public $incrementing = true;
	public $timestamps = false;
	protected $fillable = [ 
		'id_ingreso', 'periodoescolar', 'lapso', 'anoest', 'seccion', 'castellano', 'ingles', 'matematica', 'ed_fisica', 'art_patrimonio', 'cs_naturales', 'fisica', 'quimica', 'biologia', 'cs_tierra', 'ghc', 'fsn', 'orientacion', 'gcrp'
	];
	
}
