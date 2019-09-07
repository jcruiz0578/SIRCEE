<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estudiante;
use App\Ingreso;
use App\Egreso;
use App\Representante;
use App\Talla;
use App\Vivienda;
use App\Documento;
use App\Institucion;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade as PDF;





class PdfController extends Controller
{
    public function constancia_estudio($cedulaest)
    {
        $periodoescolar = $value = session()->get('periodoescolar');

        $cedula = $cedulaest;


        $c = Ingreso::with('Estudiante')
            ->where('ingresos.cedulaest', '=', $cedula)
            ->where('periodoescolar', '=', $periodoescolar)
            ->get()->first();


        //return view('reportes/pdf_constancia_estudios', compact('c'));



        $pdf = PDF::loadView('reportes/pdf_constancia_estudios', compact('c'));

        //return $pdf->download('listado.pdf');

        //PDF::setPaper('A4', 'portrait');


        return $pdf->stream();
    }
}
