<?php

namespace App\Http\Controllers;
use App\Documento;
use App\Ingreso;
use App\Talla;
use App\Vivienda;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProsecusionController extends Controller
{
    public function prosecucion_consulta(Request $request){

        // si la peticion es ajax
        $periodoescolar = $request->input('periodoescolar');
        $anoest = $request->input('anoest');
        $seccion = $request->input('seccion');

      /*  $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
            ->select('estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'estudiantes.fnest', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
            ->where('periodoescolar', '=', $periodoescolar)
            ->where('anoest', '=', $anoest)
            ->where('seccion', '=', $seccion)
            ->orderBy('cedulaest', 'asc')
            ->orderBy('fnest', 'asc')
            ->get();*/

        $users = Ingreso::with('estudiante')
            ->where('periodoescolar', '=', $periodoescolar)
            ->where('anoest', '=', $anoest)
            ->where('seccion', '=', $seccion)
            ->where('sw_prosecucion', '=', null)
            ->orderBy('cedulaest', 'asc')
          //  ->orderBy('estudiante.fnest', 'asc')
            ->get();




        return Datatables::of($users)
//            ->addColumn('id_ingreso', '<input type="text" id="id_ingreso[]" name="id_ingreso[]" class="form-control  text-center  " value="{{$id_ingreso}}"  disabled>')
            ->addColumn('chck1', '<input type="checkbox" id="chck1[]" name="chck1[]" value="{{$id_ingreso}}"   >')
           ->rawColumns(['chck1'])
            ->make(true);




    }

    public function prosecucion_registrar(Request $request)
    {

        $id_ingreso = $request->input('id_est');
        $anoestprosecucion = $request->input('anoestprosecucion');

        foreach ($id_ingreso as $ingreso) {

            $ingresos = Ingreso::find($ingreso);
            $ingresos->sw_prosecucion = 'SI';
            $ingresos->save();

            $cedulaest = $ingresos->cedulaest;
            $periodoescolar = '2020-2021'; //'session()->get('periodoescolar');
            $id = trim($periodoescolar . '-' . $cedulaest . 'I');


                $users = new Ingreso();

                $users->id_ingreso = $id;
                $users->periodoescolar = $periodoescolar;
                $users->cedulaest = $cedulaest;
                $users->condicionest = 'REGULAR';
                $users->repitienteest = 'NO';
                $users->materiapendiente = 'NO';
                $users->mp_nombres = 'N/A';
                $users->rezagado = 'NO';
                $users->nuevo_ingreso = 'NO';
                $users->anoest = $anoestprosecucion;
                $users->seccion = $ingresos->seccion;
                $users->cedularep = $ingresos->cedularep;
                $users->fecha_ingreso = date('Y-m-d');
                $users->mes_ingreso = 'JULIO';
                $users->fechasistema = date('Y-m-d');
                $users->reinscripcion = 'N/A';
                $users->tipoinscripcion = 'REGULAR';
                $users->status = 'I';
                $users->observacion = $ingresos->observacion;
                $users->inscriptor = 'JUAN CARLOS RUIZ';
                $users->ficha = '0';
                $users->nombre_plantel = $ingresos->nombre_plantel;

                $users->save();



            $viviendas = Vivienda::find($ingreso);
           $viviendas->save();

            $viviendas1 = new Vivienda();
            $viviendas1->create(array_merge($viviendas->toArray(), ['id_ingreso' => $id]));


            $tallas = Talla::find($ingreso);
            $tallas->save();

            if (!is_null($tallas)) {
                $tallas1 = new Talla();
                $tallas1->create(array_merge($tallas->toArray(), ['id_ingreso' => $id]));
            }

            $documentos = Documento::find($ingreso);
            $documentos->save();
            if (!is_null($documentos)) {
                $documentos1 = new Documento();
                $documentos1->create(array_merge($documentos->toArray(), ['id_ingreso' => $id]));
            }

               /*$viviendas1 = new Vivienda();
               $viviendas1->id_ingreso = $id;
               $viviendas1->tipovia = $viviendas->tipovia;
               $viviendas1->direccionest = $viviendas->direccionest;
               $viviendas1->zonaubicacion = $viviendas->zonaubicacion;
               $viviendas1->tipovivienda = $viviendas->tipovivienda;
               $viviendas1->ubicacionvivienda = $viviendas->ubicacionvivienda;
               $viviendas1->condicionvivienda = $viviendas->condicionvivienda;
               $viviendas1->infraestructura = $viviendas->infraestructura;
               $viviendas1->save();*/





        }

        return response()->json([
            /*'id_est' => $id_ingreso,
            'anoestprosecucion' => $anoestprosecucion,*/
            'vivienda'=> $viviendas,


        ]);

    }



}
