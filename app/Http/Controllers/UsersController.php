<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::paginate(5);

        return View('usuarios/listar')->with('users', $users);
    }
    public function create()
    {
        $users = new User();
        // return 'Aqui va el form para crear un usuario';
        return view('usuarios/crear')->with('users', $users);
    }
    public function store(Request $request)
    {
        // instancia la clase del modelo User
        $user = new User();

        // valida la informacion que se envia
        $this->validate(request(), [
            'login' => 'required|max:50|unique:users',
            'name' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'categoria' => 'required',
            'status' => 'required',
            'email' => 'required|email|max:255|',
        ]);


        $user->login = $request->input('login');
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->categoria = $request->input('categoria');
        $user->status = $request->input('status');
        $user->email = $request->input('email');
        $user->save();

        return View('home');


        /*   $user->create($request->all());

        return redirect()->to('usuarios/index')->with('message', 'El Registro fue Guardado con Exito'); */
    }

    /**
     *
     * @return mixed
     */
    public function show()
    {
        // return 'Aqui mostramos la info del usuario: ' . $id;
        return View('ingresos/ingresos_egresos');

        /*
		 *
		 * $result = DB::table('ingresos')
		 * ->join('estudiantes', 'estudiantes.cedulaest', '=', 'ingresos.cedulaest')
		 * ->join('representantes', 'representantes.cedularep', '=', 'ingresos.cedularep')
		 * ->select('estudiantes.*', 'ingresos.id_ingreso', 'observacion', 'representantes.*')
		 * ->where('ingresos.periodoescolar', '=', '2009-2010')
		 * ->chunk(100, function ($result) {
		 *
		 * dd($result);
		 *
		 * });
		 *
		 */
        /*
		 * $representante = representante::find(4297479);
		 * // echo $representante ->estudiante;
		 *
		 * foreach ($representante ->estudiante as $result) {
		 * echo $result->nombresest;
		 * echo "</br>";
		 * echo $result->apellidosest;
		 * echo "</br>";
		 * echo $result->pivot->seccion;
		 * }
		 *
		 */
    }
    public function edit($id)
    {
        $users = User::find($id);

        return view('usuarios/modificar')->with('users', $users);
    }
    public function update(Request $request, $id)
    {

        // valida la informacion que se envia
        $this->validate(request(), [
            'name' => ['required', 'max:150'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $users = User::find($id);
        $users->save();

        // Si el usuario no existe entonces
        if (is_null($users)) {
            return redirect()->to('usuarios/index')->with('message', 'Por algun motivo el registro ya no existe');
        }

        // Obtenemos la data enviada por el usuario
        $data = $request->all();

        $users->fill($data);
        // Guardamos el usuario
        $users->save();

        return redirect()->to('usuarios/index')->with('message', 'El Registro fue MODIFICADO con Exito');
    }
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->to('usuarios/index')->with('message', 'El Registro   ' . $user->name . '   Fue Eliminado');
    }
    public function search(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->name . '%')->paginate();

        return View('usuarios/listar')->with('users', $users);
    }
}
