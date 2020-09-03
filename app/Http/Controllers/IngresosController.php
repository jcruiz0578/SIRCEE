<?php
namespace App\Http\Controllers;

// use App\User;
use App\Calificacion;
use App\Documento;
use App\Estudiante;
use App\Http\Requests\ValidarIngreso;
use App\Ingreso;
use App\Institucion;
use App\Representante;
use App\Talla;
use App\Vivienda;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session; //validacion personalizada
use Yajra\DataTables\Facades\DataTables;

// use Session;
class IngresosController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        /*
        $request->session()->forget('success');  // borra la sesion flash de mensajes
        $request->session()->forget('error'); */
        $periodoescolar = $value = session()->get('periodoescolar'); // almacena la variable de sesssion
        $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
            ->select('estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
            ->where('periodoescolar', '=', $periodoescolar)
            ->orderBy('periodoescolar', 'desc')
            ->orderBy('anoest', 'asc')
            ->orderBy('seccion', 'asc')
            ->get();
        /* ->paginate(10); */
        $agregar = count($users) > 0 ? "SI" : "NO";
        return View('ingresos/mostrarestudiantes')->with('users', $users)->with('agregar', $agregar);
    }

    public function create($cedula)
    {
        // esta funcion envia al formulario para ingresar nuevos registros

        $users = new Estudiante();
        $users->cedulaest = $cedula;
        $operacion = 'PROSECUCION';
        $Institucion = Institucion::orderBy('nombre_plantel', 'asc')
            ->get();

        return view('ingresos/ingresos_egresos', compact('users', 'operacion', 'Institucion'));
        //return view ( 'ingresos/ingresos_egresos' )->with ( 'users', $users )->with ( 'operacion', $operacion );
    }

    public function store(ValidarIngreso $request)
    {
        // esta funcion agrega nuevos registros
        $data = $request->all(); //  tomar todos los elementos del formulario que vienen via post
        $cedulaest = $request->input('cedulaest');
        $estudiantes = Estudiante::find($cedulaest);
        $telefonosest = $request->input('telefonosrep');
        if (is_null($estudiantes)) {
            $estudiantes = new Estudiante();
            // $estudiantes->create ( $request->all () );
            $estudiantes->create(array_merge($request->all(), ['telefonosest' => $telefonosest]));
        } else {
            $estudiantes->fill($data);
            $estudiantes->save();
        }
        $cedularep = $request->input('cedularep');
        $representantes = Representante::find($cedularep);
        if (is_null($representantes)) {
            $representantes = new Representante();
            $representantes->create($request->all());
        } else {
            $representantes->fill($data);
            $representantes->save();
        }
        $users = new Ingreso(); // inicializar el modelo  Ingreso
        $periodoescolar = session()->get('periodoescolar');
        $condicionest = $request->input('condicionest');
        $id_ingreso = trim($periodoescolar . '-' . $cedulaest . 'I');
        $users->periodoescolar = $periodoescolar;
        $users->id_ingreso = trim($periodoescolar . '-' . $cedulaest . 'I');
        $users->cedulaest = $cedulaest;
        if ($condicionest == "REPITIENTE DE LA INST" or $condicionest == "REPITIENTE OTRA INST") {
            $users->repitienteest = "SI";
        } else {
            $users->repitienteest = "NO";
        }
        $users->materiapendiente = $request->input('materiapendiente');
        $users->mp_nombres = "N/A";
        $users->seccion = "N/A";
        $users->reinscripcion = "N/A";
        $users->fechareinscripcion = date('Y-m-d');
        if ($condicionest == "REZAGADO") {
            $users->rezagado = "SI";
        } else {
            $users->rezagado = "NO";
        }
        if ($condicionest == "NUEVO INGRESO") {
            $users->nuevo_ingreso = "SI";
        } else {
            $users->nuevo_ingreso = "NO";
        }
        $users->condicionest = $request->input('condicionest');
        $users->anoest = $request->input('anoest');
        $users->seccion = "N/A";
        $users->cedularep = $request->input('cedularep');
        $users->fecha_ingreso = $request->input('fecha_ingreso');
        $xfechaIE = trim($request->input('fecha_ingreso'));
        $xfIE = date("Y/m/d", strtotime($xfechaIE));
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
        $users->mes_ingreso = $valormes;
        $fecha_inscripcion_sistema = date('Y-m-d');
        $users->fechasistema = $fecha_inscripcion_sistema;
        $users->status = "I";
        $users->observacion = $request->input('observacion');
        $users->inscriptor = $request->input('inscriptor');
        $users->ficha = $request->input('ficha');

        $users->nombre_plantel = $request->input('nombre_plantel');
        $users->save();

        $viviendas = Vivienda::find($id_ingreso);
        if (is_null($viviendas)) {
            $viviendas = new Vivienda();
            $viviendas->create(array_merge($request->all(), ['id_ingreso' => $id_ingreso]));
        } else {
            $viviendas->fill($data);
            $viviendas->save();
        }
        $tallas = Talla::find($id_ingreso);
        if (is_null($tallas)) {
            $tallas = new Talla();
            $tallas->create(array_merge($request->all(), ['id_ingreso' => $id_ingreso]));
        } else {
            $tallas->fill($data);
            $tallas->save();
        }
        $documentos = Documento::find($id_ingreso);
        if (is_null($documentos)) {
            $documentos = new Documento();
            $documentos->create(array_merge($request->all(), ['id_ingreso' => $id_ingreso]));
        } else {
            $documentos->fill($data);
            $documentos->save();
        }
        $mensaje = "mostrar";
        //Session::flash('success', 'La Cedula   ' . $request->busqueda . '    Esta Registrada');
        Session::flash('message', 'El Registro fue Ingresado con Exito');
        return redirect()->route('ingresos.search_individual', array($id_ingreso, $cedulaest, $mensaje));
    }
    public function show()
    {}
    /**
     *
     * @param
     *          $id_ingreso
     * @return $this
     */

    public function edit($id_ingreso, $operacion)
    {
        $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
            ->join('representantes', 'representantes.cedularep', '=', 'ingresos.cedularep')
            ->join('vivienda', 'vivienda.id_ingreso', '=', 'ingresos.id_ingreso')
            ->join('documentos', 'documentos.id_ingreso', '=', 'ingresos.id_ingreso')
            ->join('tallas', 'tallas.id_ingreso', '=', 'ingresos.id_ingreso')
            ->join('instituciones', 'instituciones.nombre_plantel', '=', 'ingresos.nombre_plantel')
            ->select('estudiantes.*', 'ingresos.*', 'representantes.*', 'vivienda.*', 'tallas.*', 'documentos.*', 'instituciones.*')
            ->where('ingresos.id_ingreso', '=', $id_ingreso)->get()->first();
        $operacion = $operacion;
        $Institucion = Institucion::orderBy('nombre_plantel', 'asc')
            ->get();

//dd($users);

        return view('ingresos/ingresos_egresos', compact('users', 'operacion', 'Institucion'));
    }

    public function update(ValidarIngreso $request, $id_ingreso)
    {
        // busco el usuario en el MODELO por el id_ingreso
        $users = Ingreso::find($id_ingreso);
        $users->save();
        // del MODELO extraigo la cedulaest, como la cedularep del registro
        $cedulaest = $users->cedulaest;
        $cedularep = $users->cedularep;
        // busco en los MODELOS el registro segùn los id
        $estudiantes = Estudiante::find($cedulaest);
        $estudiantes->save();
        $representantes = Representante::find($cedularep);
        $representantes->save();
        $viviendas = Vivienda::find($id_ingreso);
        $viviendas->save();
        $tallas = Talla::find($id_ingreso);
        $tallas->save();
        $documentos = Documento::find($id_ingreso);
        $documentos->save();
        // llamo a todos los campos
        $data = $request->all();
        // todos los campos son guardados en sus respectivas tablas
        // para esto se necesita que los name y id de los componentes de los formularios
        // sean iguales a los campos de las tablas en la bd
        $users->fill($data);
        // Guardamos los datos del modelo
        $users->save();
        $users->estudiante->fill($data)->save();
        $users->representante->fill($data)->save();
        $users->vivienda->fill($data)->save();
        $users->talla->fill($data)->save();
        // $documentos->permisolopnna = $request->input('permisolopnna');
        $documentos->fill($data);
        // SI LOS CHECKBOX NO ESTAN ACTIVOS SE VALIDARAN A 0
        if (!isset($data['dpartida'])) {
            $documentos->dpartida = null;
        }
        if (!isset($data['dfotos'])) {
            $documentos->dfotos = null;
        }
        if (!isset($data['dcedulaest'])) {
            $documentos->dcedulaest = null;
        }
        if (!isset($data['dcedularep'])) {
            $documentos->dcedularep = null;
        }
        if (!isset($data['dnotas_certifi'])) {
            $documentos->dnotas_certifi = null;
        }
        if (!isset($data['dcarnet'])) {
            $documentos->dcarnet = null;
        }
        if (!isset($data['dpasaporte_alimentario'])) {
            $documentos->dpasaporte_alimentario = null;
        }
        if (!isset($data['dcoleccionbicentenaria'])) {
            $documentos->dcoleccionbicentenaria = null;
        }
        if (!isset($data['becas'])) {
            $documentos->becas = null;
        }
        if (!isset($data['permisolopnna'])) {
            $documentos->permisolopnna = null;
        }
        if (!isset($data['canaima'])) {
            $documentos->canaima = null;
        }
        $documentos->save();
        $operacion = "EDITAR";
        // return view('ingresos/ingresos_egresos')->with('users',$users)->with('message', 'El Registro fue Modificado con Exito');
        return redirect()->route('ingresos.editar', array($users->id_ingreso, $operacion))->with('message', 'El Registro fue Modificado con Exito');
    }

    public function destroy($id)
    {
        return "holaaaa";
    }

    public function search(Request $request)
    {
        if ($request->busqueda == "") {
            return redirect()->to('ingresos/index')->with('success', 'No ha Introducido ninguna Cedula...');
        }
        $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
            ->select('estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'estudiantes.nombre_plantel', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
            ->where('ingresos.cedulaest', '=', $request->busqueda)
            ->orderBy('periodoescolar', 'desc')
            ->orderBy('anoest', 'asc')
            ->orderBy('seccion', 'asc')->get();
        /* ->paginate(10); */
        $request->session()->forget('success');
        $request->session()->forget('error');
        if (count($users) > 0) {
            $agregar = "SI";
            Session::flash('success', 'La Cedula   ' . $request->busqueda . '    Esta Registrada');
            return View('ingresos/mostrarestudiantes')->with('users', $users)->with('agregar', $agregar);
        } else {
            $agregar = "NO";
            // esta funcion envia al formulario para ingresar nuevos registros
            // $users = new Estudiante();
            // $users->cedulaest = $request->busqueda;
            // $operacion = 'PROSECUCION';
            // $Institucion = Institucion::orderBy('nombre_plantel', 'asc')
            //     ->get();
            // Session::flash('error', 'La Cedula   ' . $request->busqueda . '   No esta Registrada. Puede Ingresar Este registro ahora');
            // return view('ingresos/ingresos_egresos', compact('users', 'operacion', 'Institucion'));

            $cedula = $request->busqueda;

            return redirect()->route('ingresos.create', array($cedula))->with('error', 'La Cedula   ' . $request->busqueda . '   No esta Registrada. Puede Ingresar Este registro ahora');

        }
    }

    public function search_individual($id_ingreso, $cedulaest, $mensaje)
    {
        $id = $id_ingreso;
        $cedula = $cedulaest;
        $periodoescolar = $value = session()->get('periodoescolar'); // almacena la variable de sesssion
        $mensaje = $mensaje;
        $users = Ingreso::where('id_ingreso', '=', $id)->get();
        /* comprobar si este usuario esta en el periodo escolar actual*/
        $comprobacion = Ingreso::where('cedulaest', '=', $cedula)
            ->where('periodoescolar', '=', $periodoescolar)
            ->get();
        if (count($comprobacion) > 0) {
            $boton = "DESACTIVAR";
        } else {
            $boton = "ACTIVAR";
        }
        /************* */
        return View('ingresos/mostrarestudiantes_operaciones', compact('users', 'boton', 'mensaje'));
        /*    $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
        ->join('representantes', 'representantes.cedularep', '=', 'ingresos.cedularep')
        ->join('vivienda', 'vivienda.id_ingreso', '=', 'ingresos.id_ingreso')
        ->join('documentos', 'documentos.id_ingreso', '=', 'ingresos.id_ingreso')
        ->join('tallas', 'tallas.id_ingreso', '=', 'ingresos.id_ingreso')
        ->select('estudiantes.*', 'ingresos.*', 'representantes.*', 'vivienda.*', 'tallas.*', 'documentos.*')
        ->where('ingresos.id_ingreso', '=', $id)->get(); */
        /* ->paginate(); */
    }

    public function calculo_edad(Request $request)
    {
        $fecha_nac1 = $request->input('fnest');
        // convertir la fecha que viene en formato Y/m/d a d/m/Y
        $fecha_nac = date("d/m/Y", strtotime($fecha_nac1));
        // $fecha_actual = date('d/m/Y'); // fecha actul del pc
        $fecha_actual = date("30/09/2020"); // para pruebas
        // separamos en partes las fechas
        $array_nacimiento = explode("/", $fecha_nac);
        $array_actual = explode("/", $fecha_actual);
        $dias = $array_actual[0] - $array_nacimiento[0]; // calculamos dia
        $meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
        $anos = $array_actual[2] - $array_nacimiento[2]; // calculamos año
        // ajuste de posible negativo en $días
        if ($dias < 0) {
            --$meses;
            // ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
            switch ($array_actual[1]) {
                case 1:
                    $dias_mes_anterior = 31;
                    break;
                case 2:
                    $dias_mes_anterior = 31;
                    break;
                case 3:
                    if (bisiesto($array_actual[0])) {
                        $dias_mes_anterior = 29;
                        break;
                    } else {
                        $dias_mes_anterior = 28;
                        break;
                    }
                case 4:
                    $dias_mes_anterior = 31;
                    break;
                case 5:
                    $dias_mes_anterior = 30;
                    break;
                case 6:
                    $dias_mes_anterior = 31;
                    break;
                case 7:
                    $dias_mes_anterior = 30;
                    break;
                case 8:
                    $dias_mes_anterior = 31;
                    break;
                case 9:
                    $dias_mes_anterior = 31;
                    break;
                case 10:
                    $dias_mes_anterior = 30;
                    break;
                case 11:
                    $dias_mes_anterior = 31;
                    break;
                case 12:
                    $dias_mes_anterior = 30;
                    break;
            }
            $dias = $dias + $dias_mes_anterior;
        }
        // ajuste de posible negativo en $meses
        if ($meses < 0) {
            --$anos;
            $meses = $meses + 12;
        }
        function bisiesto($anio_actual)
        {
            $bisiesto = false;
            // probamos si el mes de febrero del año actual tiene 29 días
            if (checkdate(2, 29, $anio_actual)) {
                $bisiesto = true;
            }
            return $bisiesto;
        }
        // echo "<br>Tu edad es: $anos años con $meses meses y $dias días";
        $edad = $anos . " AÑOS " . $meses . " MES(ES) ";
        // return response ()->json ( [ 'edad' => $edad, 'state' => 'sucre' ] );
        return response()->json(['edad' => $edad]);
    }

    public function representantes_consulta(Request $request)
    {
        $cedularep = $request->input('cedularep');
        $representantes = Representante::find($cedularep);
        $representantes->save();
        $apellidosrep = $representantes->apellidosrep;
        $nombresrep = $representantes->nombresrep;
        $sexorep = $representantes->sexorep;
        $parentescorep = $representantes->parentescorep;
        $telefonosrep = $representantes->telefonosrep;
        $emailrep = $representantes->emailrep;
        $trabaja = $representantes->trabaja;
        $lugartrabajo = $representantes->lugartrabajo;
        $sueldo = $representantes->sueldo;
        $direccionrep = $representantes->direccionrep;
        return response()->json([
            'apellidosrep' => $apellidosrep,
            'nombresrep' => $nombresrep,
            'sexorep' => $sexorep,
            'parentescorep' => $parentescorep,
            'telefonosrep' => $telefonosrep,
            'emailrep' => $emailrep,
            'trabaja' => $trabaja,
            'lugartrabajo' => $lugartrabajo,
            'sueldo' => $sueldo,
            'direccionrep' => $direccionrep,
        ]);
    }

    public function consultar_secciones(Request $request)
    {
        // si la peticion es ajax
        if ($request->ajax()) {
            $periodoescolar = $value = session()->get('periodoescolar');
            $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
                ->select('estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'estudiantes.fnest', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
                ->where('periodoescolar', '=', $periodoescolar)
                ->orderBy('anoest', 'asc')
                ->orderBy('fnest', 'desc')
                ->get();
            return Datatables::of($users)
                ->addColumn('chck1', '<input type="checkbox" id="chck1[]" name="chck1[]" value="{{$id_ingreso}}"   onChange="suma(this)" >')
                ->rawColumns(['chck1'])
                ->make(true);
        }
        // si no es ajax
        return view('ingresos/asignar_seccion');
    }

    public function asignar_seccion(Request $request)
    {
        $id_ingreso = $request->input('id_est');
        $seccion = $request->input('seccion');
        foreach ($id_ingreso as $ingreso) {
            // se busca con el id_ingreso
            $cambio_seccion = Ingreso::find($ingreso);
            $cambio_seccion->save();
            // se remplaza  con el nuevo id_ingreso
            $cambio_seccion->seccion = $seccion;
            $cambio_seccion->save();
        }
        return response()->json([
            'id_est' => $id_ingreso,
            'seccion' => $seccion,
        ]);
    }



    public function constancia_estudios()
    {
        return view('ingresos/constancia_estudios');
    }

    public function constancia_estudios_proceso(Request $request)
    {
        if ($request->ajax()) {
            $periodoescolar = $value = session()->get('periodoescolar');
            $cedulaest = $request->input('cedulaest');

            $estudiantes = Ingreso::where('cedulaest', '=', $cedulaest)->get();

            if (count($estudiantes) > 0) {
                $validar = "SI";

                $c = Ingreso::with('Estudiante')
                    ->where('ingresos.cedulaest', '=', $cedulaest)
                    ->where('periodoescolar', '=', $periodoescolar)
                    ->first();
                $apellidosest = $c->estudiante->apellidosest;
                $nombresest = $c->estudiante->nombresest;
                $sexoest = $c->estudiante->sexoest;
                $anoest = $c->anoest;
                $seccion = $c->seccion;
                $status = $c->status;
                return response()->json([
                    'apellidosest' => $apellidosest,
                    'nombresest' => $nombresest,
                    'sexoest' => $sexoest,
                    'anoest' => $anoest,
                    'seccion' => $seccion,
                    'status' => $status,
                    'validar' => $validar,
                ]);
            } else {
                $validar = "NO";
                return response()->json([
                    'validar' => $validar,
                ]);
            }
        }
    }

    public function calificaciones_consulta(Request $request)
    {
        // si la peticion es ajax
        $periodoescolar = $value = session()->get('periodoescolar');
        $anoest = $request->input('anoest');
        $seccion = $request->input('seccion');

        $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
            ->select('estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'estudiantes.fnest', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
            ->where('periodoescolar', '=', $periodoescolar)
            ->where('anoest', '=', $anoest)
            ->where('seccion', '=', $seccion)
            ->orderBy('cedulaest', 'desc')
            ->orderBy('fnest', 'desc')
            ->get();

        return Datatables::of($users)
            ->addColumn('id_ingreso', '<input type="text" id="id_ingreso[]" name="id_ingreso[]" class="form-control  text-center  " value="{{$id_ingreso}}"  disabled>')
            ->addColumn('nota', '<input type="text" id="nota[]" name="nota[]" style="width: 60px; text-align: center"  >')
            ->rawColumns(['nota', 'id_ingreso'])
            ->make(true);
    }


public function calificaciones_consulta_notas(Request $request)
    {
        // si la peticion es ajax
        $periodoescolar = $value = session()->get('periodoescolar');
        $anoest = $request->input('anoest');
        $seccion = $request->input('seccion');
     $lapso = $request->input('lapso');



     
                $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
                ->join('calificaciones', 'calificaciones.id_ingreso', '=', 'ingresos.id_ingreso')
                ->select('calificaciones.*', 'estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'estudiantes.fnest', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
                ->where('ingresos.periodoescolar', '=', $periodoescolar)
                 ->where('anoest', '=', $anoest)
                 ->where('seccion', '=', $seccion)
                 ->where('lapso', '=', $lapso)
                ->orderBy('cedulaest', 'desc')
                 ->orderBy('fnest', 'desc')
                ->get();
               
      

            return Datatables::of($users)
                ->addColumn('id_ingreso', '<input type="text" id="id_ingreso[]" name="id_ingreso[]" class="form-control  text-center  " value="{{$id_ingreso}}" style="width: 230px; text-align: center"  >')
               /*  ->addColumn('castellano', '<input type="text" id="castellano[]" name="castellano[]" value="{{$castellano}}" style="width: 30px; text-align: center"  >')
                ->addColumn('ingles', '<input type="text" id="ingles[]" name="ingles[]" value="{{$ingles}}" style="width: 30px; text-align: center"  >')
                ->addColumn('matematica', '<input type="text" id="matematica[]" name="matematica[]" value="{{$matematica}}" style="width: 30px; text-align: center"  >')
                 ->rawColumns(['id_ingreso', 'castellano', 'ingles',  'matematica']) */
                 ->rawColumns(['id_ingreso'])
                 ->make(true);

    
            
        
                 

    }












    public function calificaciones_registrar(Request $request)
    {
        $periodoescolar = $value = session()->get('periodoescolar');
        $id_ingreso = $request->input('id_ingreso');
        $lapso = $request->input('lapso');
        $anoest = $request->input('anoest');
        $seccion = $request->input('seccion');
        $materias = $request->input('materias');
        $nota = $request->input('nota');

        for ($i = 0; $i < count($id_ingreso); $i++) {

/***********************************/
// se busca el registro con id_ingreso, periodoescolar y lapso en la tabla

            $comprobacion1 = Calificacion::where('id_ingreso', '=', $id_ingreso[$i])
                ->where('periodoescolar', '=', $periodoescolar)
                ->where('lapso', '=', $lapso)
                ->first();

//si no esta el registro
            if (is_null($comprobacion1)) {

/***********************************/
                $comprobacion = Calificacion::where('id_ingreso', '=', $id_ingreso[$i])
                    ->where('periodoescolar', '=', $periodoescolar)
                    ->where('lapso', '=', $lapso)
                    ->where($materias, '>=', 0)
                    ->first();

                if (is_null($comprobacion)) {
                    $calificaciones = new Calificacion(); // ae crea el registro  nuevo
                    $calificaciones->id_ingreso = $id_ingreso[$i];
                    $calificaciones->periodoescolar = $periodoescolar;
                    $calificaciones->lapso = $lapso;
                    $calificaciones->$materias = $nota[$i];
                    $calificaciones->save();

                } else {
                    // se actualiza

                    $calificaciones = Calificacion::where('id_ingreso', '=', $id_ingreso[$i])
                        ->where('periodoescolar', '=', $periodoescolar)
                        ->where('lapso', '=', $lapso)
                        ->where($materias, '>=', 0)
                        ->update([$materias => $nota[$i]]);

                }
/***************************************************/

            } else {

                $calificaciones2 = Calificacion::where('id_ingreso', '=', $id_ingreso[$i])
                    ->where('periodoescolar', '=', $periodoescolar)
                    ->where('lapso', '=', $lapso)
                    ->update([$materias => $nota[$i]]);

            }

            //return $calificaciones;
            // return response()->json([
            //             'id_ingreso' => $id_ingreso,
            //             'periodoescolar' => $periodoescolar,
            //             'lapso' => $lapso,
            //             'anoest' => $anoest,
            //             'seccion' => $seccion,
            //             'materias' => $materias,
            //             'nota' => $nota,
            //        ]);
        }
    }



 public function calificaciones_comboArea(Request $request)
    {
        $rpta = "";

        if ($_POST ["elegido"] == "1ER AÑO") {
            $rpta = '
            <option value="Seleccionar">Seleccionar</option>
            <option value="castellano">Castellano</option>
            <option value="ingles">Ingles</option>
            <option value="matematica">Matematica</option>
            <option value="ed_fisica">Educación Física</option>
            <option value="art_patrimonio">Arte y Patrimonio</option>
            <option value="cs_naturales">Cs Naturales</option>
            <option value="ghc">GHC</option>
            <option value="orientacion">Orientación</option>
            <option value="gcrp">Grupos de Creación, Recreación y Produción</option>		
                    ';
        }
        
        if ($_POST ["elegido"] == "2DO AÑO") {
            $rpta = '
            <option value="Seleccionar">Seleccionar</option>
            <option value="castellano">Castellano</option>
            <option value="ingles">Ingles</option>
            <option value="matematica">Matematica</option>
            <option value="ed_fisica">Educación Física</option>
            <option value="art_patrimonio">Arte y Patrimonio</option>
            <option value="cs_naturales">Cs Naturales</option>
            <option value="ghc">GHC</option>
            <option value="orientacion">Orientación</option>
            <option value="gcrp">Grupos de Creación, Recreación y Produción</option>	
                    ';
        }
        
        if ($_POST ["elegido"] == "3ER AÑO") {
            $rpta = '
            <option value="Seleccionar">Seleccionar</option>
            <option value="castellano">Castellano</option>
            <option value="ingles">Ingles</option>
            <option value="matematica">Matematica</option>
            <option value="ed_fisica">Educación Física</option>
            <option value="fisica">Fisica</option>
            <option value="quimica">Química</option>
            <option value="bio">Biologia</option>
            <option value="ghc">GHC</option>
            <option value="orientacion">Orientación</option>
            <option value="gcrp">Grupos de Creación, Recreación y Produción</option>	
                    
                    ';
        }
        
        
        if ($_POST ["elegido"] == "4TO AÑO CS") {
            $rpta = '
            <option value="Seleccionar">Seleccionar</option>
            <option value="castellano">Castellano</option>
            <option value="ingles">Ingles</option>
            <option value="matematica">Matematica</option>
            <option value="ed_fisica">Educación Física</option>
            <option value="fisica">Fisica</option>
            <option value="quimica">Química</option>
            <option value="bio">Biologia</option>
            <option value="ghc">GHC</option>
            <option value="fsn">FSN</option>
            <option value="orientacion">Orientación</option>
            <option value="gcrp">Grupos de Creación, Recreación y Produción</option>	
                    
                    ';
        }
        
        if ($_POST ["elegido"] == "5TO AÑO CS") {
            $rpta = '
            <option value="Seleccionar">Seleccionar</option>
            <option value="castellano">Castellano</option>
            <option value="ingles">Ingles</option>
            <option value="matematica">Matematica</option>
            <option value="ed_fisica">Educación Física</option>
            <option value="fisica">Fisica</option>
            <option value="quimica">Química</option>
            <option value="bio">Biologia</option>
            <option value="cs_tierra">Cs Tierra</option>
            <option value="ghc">GHC</option>
            <option value="fsn">FSN</option>
            <option value="orientacion">Orientación</option>
            <option value="gcrp">Grupos de Creación, Recreación y Produción</option>	
                    
                    ';
        }
        
        
        
        
        echo $rpta;
    }






  public function calificacion_definitiva3(Request $request)
    {

// se asignan las variales que vienen de calificacion_llenado.blade.php
        $periodoescolar = $value = session()->get('periodoescolar');
        $id_ingreso = $request->input('id_ingreso');
        $lapso = $request->input('lapso');
        $anoest = $request->input('anoest');
        $seccion = $request->input('seccion');


if ($anoest=='1ER AÑO' OR $anoest=='2DO AÑO') {
    $materias = array('castellano', 'ingles', 'matematica', 'ed_fisica', 'art_patrimonio', 'cs_naturales' , 'ghc', 'orientacion');

}
if ($anoest=='3ER AÑO') {
    $materias = array('castellano', 'ingles', 'matematica', 'ed_fisica', 'fisica', 'quimica', 'biologia', 'ghc');
}

if ($anoest== '4TO AÑO CS') {
    $materias=array('castellano', 'ingles', 'matematica', 'ed_fisica', 'fisica', 'quimica', 'biologia', 'ghc', 'fsn');
}

if ($anoest== '5TO AÑO CS'){
    $materias = array('castellano', 'ingles', 'matematica', 'ed_fisica', 'fisica', 'quimica', 'biologia', 'cs_tierra', 'ghc', 'fsn');
}


        //$materias = array('castellano', 'ingles', 'matematica', 'ed_fisica', 'art_patrimonio', 'cs_naturales' , 'fisica', 'quimica', 'biologia', 'cs_tierra', 'ghc', 'fsn');



        foreach ($materias as $materia) {
            for ($i=0; $i<count($id_ingreso) ; $i++) {  // se realiza un ciclo que cuente y recorra la cantidad de id_ingresos
  
                $cal = Calificacion::where('id_ingreso', '=', $id_ingreso[$i])
                  ->where('lapso', '<>', 'D')
                   ->where('lapso', '<>', 'R')
                 ->avg($materia);
                $definitiva = round($cal);

                
                //se busca ahora si hay registro con nota cuantitativa
                $comprobacion = Calificacion::where('id_ingreso', '=', $id_ingreso[$i])
                    ->where('periodoescolar', '=', $periodoescolar)
                    ->where('lapso', '=', "D")
                    ->first();
                    
                    if ($definitiva >0) {
                        if (is_null($comprobacion)) {
                            $calificaciones = new Calificacion(); // si no hay registro con calificaciones  crea el registro  nuevo
    
                            $calificaciones->id_ingreso = $id_ingreso[$i];
                            $calificaciones->periodoescolar = $periodoescolar;
                            $calificaciones->lapso = 'D';
                            $calificaciones->$materia= $definitiva;
                            $calificaciones->save();
                        } else {
                            // si existe registro se actualiza las notas

                            $calificaciones =  Calificacion::where('id_ingreso', '=', $id_ingreso[$i])
                        ->where('periodoescolar', '=', $periodoescolar)
                        ->where('lapso', '=', 'D')
                       ->update([$materia => $definitiva]);
                        }
                    }
            }
        }
 
  //return $calificaciones;
        return response()->json([
             'id_ingreso' => $id_ingreso,
              'anoest' => $anoest,
             
            
        ]);

    

    }



public function calificacion_definitiva32(Request $request)
    {
        // si la peticion es ajax
        $periodoescolar = $value = session()->get('periodoescolar');
        $anoest = $request->input('anoest');
        $seccion = $request->input('seccion');
     // $lapso = $request->input('lapso');

$id_ingreso = $request->input('id_ingreso');
        

   //  for($i=0; $i<count($id_ingreso) ; $i++){  // se realiza un ciclo que cuente y recorra la cantidad de id_ingresos
 for ($i=0; $i<1 ; $i++) {
    
    for ($y = 1; $y < 5; $y++) {
         if ($y == 1) {
             $lapso = "1";
         }

         if ($y == 2) {
             $lapso = "2";
         }

         if ($y == 3) {
             $lapso = "3";
         }
         if ($y == 4) {
             $lapso = "D";
         }


 

     
         $users = Ingreso::join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
                ->join('calificaciones', 'calificaciones.id_ingreso', '=', 'ingresos.id_ingreso')
                ->select('calificaciones.*', 'estudiantes.apellidosest', 'estudiantes.nombresest', 'estudiantes.sexoest', 'estudiantes.fnest', 'ingresos.id_ingreso', 'ingresos.periodoescolar', 'ingresos.cedulaest', 'ingresos.anoest', 'ingresos.seccion', 'ingresos.status')
                ->where('ingresos.periodoescolar', '=', $periodoescolar)
                 ->where('anoest', '=', $anoest)
                 ->where('seccion', '=', $seccion)
                 ->where('lapso', '=', $lapso)
                ->orderBy('cedulaest', 'desc')
                 ->orderBy('fnest', 'desc')
                ->get();
 
                $total[$i][$y] = $users;







     }
 }

 


    return $total;
            
        
                 

    }


  




}