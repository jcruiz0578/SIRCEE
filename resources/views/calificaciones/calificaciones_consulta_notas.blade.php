@extends('plantilla')
@section('content')
@include('errors/errors')
{!! Html::style('css/jquery.dataTables.min.css') !!}
<h2 class="text-center  font-weight-bold">
	Consultar  calificaciones
</h2>
@include('mensajes')
<div class="container-fluid  pt-4  pb-4"  style="background-color:#eef1f1;  box-shadow: 14px 14px 35px #999;
border-radius: 1.2rem 1.2rem 1.2rem 1.2rem;">
<!-- {!! Form::open(['route' => 'calificacion.definitiva3', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
{!! csrf_field() !!}
 -->

<div class="form-row  font-weight-bold">
	<div class="form-group col-sm-3   ">
		<label for="">Año de estudio</label>
		<select id="anoest" name="anoest" class="form-control font-weight-bold">
			<option value="N/A">N/A</option>
			<option value="T">Todas</option>
			<option value="1ER AÑO">1ER AÑO</option>
			<option value="2DO AÑO">2DO AÑO</option>
			<option value="3ER AÑO">3ER AÑO</option>
			<option value="4TO AÑO CS">4TO AÑO CS</option>
			<option value="5TO AÑO CS">5TO AÑO CS</option>
		</select>
	</div>
	<div class="form-group col-sm-2 ">
		<label for="">Sección</label>
		<select id="seccion" name="seccion" class="form-control font-weight-bold">
			<option value="N/A">N/A</option>
			<option value="Todas">Todas</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
			<option value="F">F</option>
			<option value="G">G</option>
			<option value="H">H</option>
			<option value="I">I</option>
			<option value="U">U</option>
		</select>
		
	</div>


	<div class="form-group col-md-2">
			<label for="">Periodo</label>
			<select name="lapso" id="lapso" class="form-control font-weight-bold">
				<option value="N/A">N/A</option>
				<option value="1">1ER LAPSO</option>
				<option value="2">2DO LAPSO</option>
				<option value="3">3ER LAPSO</option>
				<option value="D">DEFINITIVA</option>
				<option value="R">REVISION</option>
			</select>
		</div>
	<div class="form-group     col-md-2  align-self-end ">
		<button type="submit" id="consultar" name="consultar" class="btn btn-primary  form-control font-weight-bold enviar" style="height: 4rem;border-radius: 1.2rem 1.2rem 1.2rem 1.2rem; "><span><i class="fa fa-list-alt"></i> Consultar</button>
		</div>
</div>
	
	
	
	
<div class= "container-fluid pt-4" style=" width: 100%;">
	

	
	<table id="tabla1" class="display nowrap  table  table-hover  table-bordered text-center " style="width: 100%; ">
		<thead class="text-white bg-primary">
			<tr class="font-weight-bold">
				<th>N°</th>
				<th>Código</th>
				<th>Cedula Id</th>
				<th>Apellidos y Nombres</th>
				<th>Cast</th>
				<th>Ing</th>
				<th>Mat</th>
				<th>Ed Fis</th>
				<th>A.P</th>
				<th>Cs Nat</th>
				<th id="fisicat">Fis</th>
				<th>Quim</th>
				<th>Bio</th>
				<th>Cs Ti</th>
				<th>GHC</th>
				<th>FSN</th>
				<th>Orient</th>
				<th>GCRP</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot class="text-white bg-primary">
			<tr class="font-weight-bold">
				<th>N°</th>
				<th>Código</th>
				<th>Cedula Id</th>
				<th>Apellidos y Nombres</th>
				<th>Cast</th>
				<th>Ing</th>
				<th>Mat</th>
				<th>Ed Fis</th>
				<th>A.P</th>
				<th>Cs Nat</th>
				<th id="fisicab">Fis</th>
				<th>Quim</th>
				<th>Bio</th>
				<th>Cs Ti</th>
				<th>GHC</th>
				<th>FSN</th>
				<th>Orient</th>
				<th>GCRP</th>
			</tr>
		</table>

		</div>

		<div class="  container-fluid form-row  font-weight-bold   justify-content-center  pt-3">
			<div class="form-group col-sm-4  col-md-3">
				<button type="submit" id="procesar" name="procesar" class="btn btn-outline-primary  form-control font-weight-bold enviar" style="height: 4rem;  border-radius: 1.2rem 1.2rem 1.2rem 1.2rem;  "><span><i class="fas fa-check"></i> Procesar Definitiva</span></button>
			
				<!-- {!! Form::close() !!}  -->
		
			
			</div>
		</div>
	</div>
	


	
	{!! Html::script('js/jquery-3.3.1.js') !!}
	{!! Html::script('js/jquery.dataTables.min.js') !!}
	{!! Html::script('js/operaciones/calificaciones_consultar_notas.js') !!}
	

	
	@endsection