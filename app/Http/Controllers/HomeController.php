<?php

namespace App\Http\Controllers;


use App\Estudiante;
use App\Ingreso;
use App\Representante;
use App\Talla;
use App\Vivienda;
use App\Documento;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;





use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');





    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


         $periodoescolar = $value = session()->get('periodoescolar');

        $request->session()->forget('success');  // borra la sesion flash de mensajes
        $request->session()->forget('error');


        $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
            ->select('estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'estudiantes.nombre_plantel', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
            ->where('periodoescolar', '=', $periodoescolar)
            ->orderBy('anoest', 'asc')
            ->orderBy('seccion', 'asc')
            ->orderBy('cedulaest', 'desc')
            ->get();

        /* ->paginate(10); */



        // echo $cedula= $request->busqueda;
        /*
        if (count($users) > 0) {
            echo $agregar = "SI";
        } else {
            echo $agregar = "NO";
        }
 */


        return view('ingresos/mostrarestudiantes', compact('users'));
    }
}
