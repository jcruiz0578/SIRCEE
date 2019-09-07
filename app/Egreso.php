<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    protected $table = 'egresos';
    protected $primaryKey = 'id_ingreso';
    // or null
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id_ingreso',
        'periodoescolar',
        'cedulaest',
        'fecha_egreso',
        'mes_egreso',
        'fechasistema',
        'periodo_egreso',
        'observación'
    ];
    public function ingreso()
    {
        return $this->belongsTo('App\Ingreso', 'id_ingreso');
    }
}
