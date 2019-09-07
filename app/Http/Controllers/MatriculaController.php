<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Ingreso;
use App\Representante;
use App\Talla;
use App\Vivienda;
use App\Documento;
use App\Institucion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;






class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function matricula()
    {

        $totalf = 0;
        $totalm = 0;
        $totaltotal = 0;

        for ($x = 1; $x < 6; $x++) {

            if ($x == 1) {
                $anno = "1ER AÑO";
            }
            if ($x == 2) {
                $anno = "2DO AÑO";
            }
            if ($x == 3) {
                $anno = "3ER AÑO";
            }

            if ($x == 4) {
                $anno = "4TO AÑO CS";
            }

            if ($x == 5) {
                $anno = "5TO AÑO CS";
            }



            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) {
                    $sexo = "F";
                }

                if ($i == 2) {
                    $sexo = "M";
                }




                $periodoescolar = $value = session()->get('periodoescolar');

                $counts = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
                    ->select('estudiantes.sexoest', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion')
                    ->where('anoest', '=', $anno)
                    ->where('periodoescolar', '=', $periodoescolar)
                    ->where('sexoest', '=', $sexo)
                    ->where('status', '=', 'I')
                    ->count();

                $total[$x][$i] = $counts;
            }

            $titulo = " MATRICULA GENERAL ACTUAL";

            // 	LA VARIABLE $totalsexo acumula la sumatoria de la cantidad de femenino y masculino
            //e	cho "EL TOTALES DE LA SUMA DE LOS SEXOS ES ".$totalsexo[$x]= $total[$x][1]+$total[$x][2]."</br>";
            $totalsexo[$x] = $total[$x][1] + $total[$x][2];


            //e	cho "</br>";
            // 	ACUMULAR LA CANTIDAD DE TODOS LOS FEMENINOS DEL PROCEDO
            $totalf = $total[$x][1] + $totalf;

            // 	ACUMULAR LA CANTIDAD DE TODOS LOS MASCULINOS DEL PROCEDO
            $totalm = $total[$x][2] + $totalm;

            // 	aqui sumaremos todos los totales de cada año para tenr el total final

            $totaltotal = $totalsexo[$x] + $totaltotal;
            // 	tambien se pudiera realizar de la siguiente forma
            // 	$totaltotal=$totalf+$totalm
            //e	cho "</br>";
            // 	fin del ciclo para el año escolar

        }


        return View('matricula/matricula_general', compact('total', 'totalsexo', 'totalf', 'totalm', 'totaltotal', 'titulo'));
    }
}
