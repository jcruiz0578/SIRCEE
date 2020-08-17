<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarIngreso extends FormRequest
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'cedulaest' => 'required',
			'nombresest' => 'required', 'max:150',
			'apellidosest' => 'required',
			'sexoest' => 'not_in:N/A',
			'lateralidad' => 'not_in:N/A',
			'fnest' => 'required',
			'orden_nac'=> 'required',
			'estado_nac' => 'not_in:N/A',
			'lugar_nac' => 'required',
			'materiapendiente' => 'not_in:N/A',
			'condicionest' => 'not_in:N/A',
			'anoest' => 'not_in:N/A',
			'tipovia' => 'not_in:N/A',
			'direccionest' => 'required',
			'zonaubicacion' => 'not_in:N/A',
			'tipovivienda' => 'not_in:N/A',
			'ubicacionvivienda' => 'not_in:N/A',
			'condicionvivienda' => 'not_in:N/A',
			'infraestructura' => 'not_in:N/A',
			'nombre_plantel' => 'required',
			'cedularep' => 'required',
			'apellidosrep' => 'required',
			'nombresrep' => 'required',
			'sexorep' => 'not_in:N/A',
			'parentescorep' => 'not_in:N/A',
			'direccionrep' => 'required',
			'ficha' => 'required',
			'fecha_ingreso' => 'required'

		];
	}
	public function messages()
	{
		return [
			'cedulaest.required' => 'Introducir la cedula del Estudiante (DATOS DEL ESTUDIANTE)',
			'nombresest.required' => 'Introducir los  Nombres del Estudiante (DATOS DEL ESTUDIANTE)',
			'apellidosest.required' => 'Introducir los  Apellidos del Estudiante  (DATOS DEL ESTUDIANTE)',
			'sexoest.not_in' => 'Introducir el Sexo del Estudiante (DATOS DEL ESTUDIANTE)',
			'lateralidad.not_in' => 'Introducir lateralidad del Estudiante (DATOS DEL ESTUDIANTE)',
			'fnest.required' => 'Introducir la fech. Nacim del Estudiante (DATOS DEL ESTUDIANTE)',
			'orden_nac.required' => 'Introducir Orden de Nacim del Estudiante (DATOS DEL ESTUDIANTE)',
			'estado_nac.not_in' => 'Introducir Estado de Nacimiento del Estudiante (DATOS DEL ESTUDIANTE)',
			'lugar_nac.required' => 'Introducir Lugar de Naci. del Estudiante (DATOS DEL ESTUDIANTE)',
			'materiapendiente.not_in' => 'Introducir si posee materia pendiente el Estudiante (DATOS DEL ESTUDIANTE)',
			'condicionest.not_in' => 'Introducir Condición de Estudio  (DATOS DEL ESTUDIANTE)',
			'anoest.not_in' => 'Introducir Año de Estudio  (DATOS DEL ESTUDIANTE)',
			'tipovia.not_in' => 'Introducir el tipo de vía  (Datos y Ubicación Domiciliaria)',
			'direccionest.required' => 'Introducir la dirección del Estudiante (Datos y Ubicación Domiciliaria)',
			'zonaubicacion.not_in' => 'Introducir la Zona de Ubicación del Estudiante  (Datos y Ubicación Domiciliaria)',
			'tipovivienda.not_in' => 'Introducir el tipo de vivienda del Estudiante  (Datos y Ubicación Domiciliaria)',
			'ubicacionvivienda.not_in' => 'Introducir la ubicación de la vivienda del Estudiante  (Datos y Ubicación Domiciliaria)',
			'condicionvivienda.not_in' => 'Introducir la condición de la vivienda del Estudiante  (Datos y Ubicación Domiciliaria)',
			'infraestructura.not_in' => 'Introducir la condición de infraestructura de la vivienda del Estudiante  (Datos y Ubicación Domiciliaria)',
			'nombre_plantel.required' => 'Introducir el PLANTEL DE PROCEDENCIA',
			'cedularep.required' => 'Introducir cédula del Representante (DATOS DEL REPRESENTANTE)',
			'nombresrep.required' => 'Introducir los  Nombres del Representante (DATOS DEL REPRESENTANTE)',
			'apellidosrep.required' => 'Introducir los  Apellidos del Representante  (DATOS DEL REPRESENTANTE)',
			'sexorep.not_in' => 'Introducir el Sexo del Representante (DATOS DEL REPRESENTANTE)',
			'parentescorep.not_in' => 'Introducir el Parentesco del Representante (DATOS DEL REPRESENTANTE)',
			'ficha.required' => 'Introducir la ficha de inscripción del Estudiante',
			'fecha_ingreso.required' => 'Introducir la fecha ingreso del Estudiante',

		];
	}
}
