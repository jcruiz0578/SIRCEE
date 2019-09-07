<?php

namespace App\Http\Controllers;

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
//use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;



class IngresosModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function egreso(Request $request)
    {

        if ($request->ajax()) {


            $id_ingreso = $request->input('id_ingreso');
            $periodoescolar = $request->input('periodoescolar');
            $cedulaest = $request->input('cedulaest');
            /*  $fecha_egreso = $request->input('fecha_egreso'); */
            /*  $mes_egreso = $request->input('mes_egreso'); */
            $periodo_egreso = $request->input('periodo_egreso');
            $observacion = $request->input('observacion');




            /************************************* */
            $fecha_egreso = trim($request->input('fecha_egreso'));
            $xfIE = date("Y/m/d", strtotime($fecha_egreso));

            $valorF = explode("/", $xfIE);

            $valormes1 = $valorF[1]; // Y/m/d [0] = año [1]= mes [2]= dia

            if ($valormes1 == '01') {
                $valormes = "ENERO";
            }

            if ($valormes1 == "02") {
                $valormes = "FEBRERO";
            }

            if ($valormes1 == "03") {
                $valormes = "MARZO";
            }

            if ($valormes1 == "04") {
                $valormes = "ABRIL";
            }

            if ($valormes1 == "05") {
                $valormes = "MAYO";
            }
            if ($valormes1 == "06") {
                $valormes = "JUNIO";
            }

            if ($valormes1 == "07") {
                $valormes = "JULIO";
            }

            if ($valormes1 == "08") {
                $valormes = "AGOSTO";
            }

            if ($valormes1 == "09") {
                $valormes = "SEPTIEMBRE";
            }

            if ($valormes1 == "10") {
                $valormes = "OCTUBRE";
            }

            if ($valormes1 == "11") {
                $valormes = "NOVIEMBRE";
            }

            if ($valormes1 == "12") {
                $valormes = "DICIEMBRE";
            }



            /******************************************* */

            /* crea el registro nuevo en la tabla/modelo egreso */

            $egreso = new Egreso();


            $egreso->id_ingreso = $id_ingreso;
            $egreso->periodoescolar = $periodoescolar;
            $egreso->cedulaest = $cedulaest;
            $egreso->fecha_egreso = $fecha_egreso;
            $egreso->mes_egreso = $valormes;
            $egreso->fechasistema =  date('Y-m-d');
            $egreso->periodo_egreso = $periodo_egreso;
            $egreso->observacion = $observacion;
            $egreso->save();




            /* modfica el campo STATUS   DE "I" A "E" */

            $ingresos = Ingreso::find($id_ingreso);
            $ingresos->save();
            // se remplaza por la cedula nueva       
            $ingresos->status = 'E';
            $ingresos->save();





            return response()->json([
                "mensaje" => $request->all()
            ]);
        }



        /*  return response()->json([
            'id_est' =>  $id_ingreso,
            'periodoescolar' => $periodoescolar,
            'cedulaE' => $cedulaE,
            'fechaE'  => $fechaE,
            'razon'   => $razon
        ]); */
    }





    public function ModificarCedula(Request $request)
    {

        $periodoescolar = $value = session()->get('periodoescolar');


        // variables que provienen del ajax en modal_modificar cedula
        $id_ingreso = $request->input('id_est');
        $cedulaV_mod = $request->input('cedulaV_mod');
        $cedulaN_mod = $request->input('cedulaN_mod');


        // se busca por la cedula actual
        $estudiantes = Estudiante::find($cedulaV_mod);
        $estudiantes->save();
        // se remplaza por la cedula nueva       
        $estudiantes->cedulaest = $cedulaN_mod;
        $estudiantes->save();

        $nombre = $estudiantes->nombresest;

        // valor de la cedula modificada
        $cedulaest = $estudiantes->cedulaest;

        // se hace una busqueda en la tabla/modelo  ingreso  con la cedula modificada
        $ingresos = Ingreso::where('cedulaest', '=', $cedulaest)->get();

        // se recorre  la variable $ingreso y se obtienen sus datos
        foreach ($ingresos as $ingreso) {
            $periodoescolar = $ingreso->periodoescolar;
            $cedulaest = $ingreso->cedulaest;
            $id_ingreso1 = $ingreso->id_ingreso;

            // se busca con el id_ingreso
            $ingresos_mod = Ingreso::find($id_ingreso1);
            $ingresos_mod->save();
            $id_ingreso = trim($periodoescolar . '-' . $cedulaest . 'I');

            // se remplaza  con el nuevo id_ingreso
            $ingresos_mod->id_ingreso = $id_ingreso;
            $ingresos_mod->save();
        }



        return response()->json([
            'cedulaest' =>  $cedulaest,
            'id_est' => $id_ingreso,
            'periodo' => $periodoescolar,

        ]);
    }
}
