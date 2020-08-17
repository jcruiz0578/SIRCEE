@extends('plantilla')

@section('content')
@include('errors/errors')
@if(Session::has('message'))
<p class="alert alert-success">{{Session::get('message')}}</p>
@endif

<style>
	input.formato,
	select.formato,
	textarea.formato {
		font-weight: bold;
		box-shadow: 15px 15px 15px #999;
		font-size: 1.2rem;

	}

	label {
		font-weight: bold;

		font-size: 1.2rem;
	}

	.formato_boton {
		background-repeat: no-repeat;
		background-position: top;
		width: 90%;
		height: 90px;
		text-align: bottom;
		padding-top: 40px;
		font-weight: bold;
		box-shadow: 15px 15px 15px #999;
		background: #e5e5e5;
		border-radius: 15px;
		border-top-style: solid;
	}
</style>










<input type="hidden" name="prueba" id="prueba" value="{{$operacion}}">





{{ $opcion_crud = session()->get('opcion_crud')}}


@php
if ($operacion=='EDITAR'){

$ruta= 'ingresos.update';
$titulo='ACTUALIZAR';

}

@endphp


@php
if ($operacion=='PROSECUCION'){

$ruta= 'ingresos.store';
$titulo='INSCRIPCIÓN';

}


@endphp
@include('mensajes')

{{-- {{$ruta}} --}}


{!!Form::model($users, [ 'route' => [$ruta, $users->id_ingreso], 'method' => 'POST', 'novalidate', 'id' =>'myForm']) !!}
@if ($operacion=="EDITAR")
{{ method_field('PUT') }}
@endif
{{ csrf_field() }}



<div style="height: 10px"></div>

<div class="container-fluid">



	{{-- <div class="row justify-content-end"> {{-- se coloca todo ell contenido a la derecha --}}
	<div class="float-right">
		<div class=" offset-sm-12"> {{-- con offset-md-12   se expande la totalidad dela columna  --}}
			<h5 class="text-center pr-2">Último Período Escolar:<b>{{$users->periodoescolar}}</b></h5>


			<div class=" text-center pr-2">
				<input type="text" name="ie" id="ie" value="{{$users->status}}"
					style="width: 100px; height: 100px; text-align: center; font-weight: bold; font-size: 4rem">
			</div>
		</div>
	</div>


	<input type="hidden" name="id_ingreso_actual" id="id_ingreso_actual" value="{{$users->id_ingreso or ""}}">
	<input type="hidden" name="inscriptor" id="inscriptor" value="{{ Auth::user()->name }}">

</div>

<div class="container-fluid">


	@include('ingresos/contenido/estudiantes')
	@include('ingresos/contenido/ubicacion')
	@include('ingresos/contenido/otros_datos')
	@include('ingresos/contenido/representantes')
	{{-- @include('ingresos/contenido/documentos') --}}

</div>

<div style="height: 2rem"></div>

<hr>

<div class="form-row  justify-content-end">
	<div class="form-group col-md-3">
		{!! Form::label('ficha', 'N° FICHA DE INSCRIPCIÓN:', ['for' => 'ficha'] ) !!}
		{!! Form::text('ficha', null, ['class' => 'form-control formato', 'id' => 'ficha', 'value' => '']
		)!!}
	</div>

	<div class="form-group col-md-3">
		{!! Form::label('fecha_ingreso', 'FECHA DE INGRESO / EGRESO:', ['for' => 'fecha_ingreso'] ) !!}
		{!! Form::date('fecha_ingreso', null , ['class' => 'form-control formato', 'id' => 'fecha_ingreso', 'value' =>
		'']
		)!!}
	</div>
</div>





</div>

<div style="height: 40px"></div>



<div class="container">

	<div class="form-row justify-content-center">

		<div class="form-group col-md-5">
			<button class="form-control  btn-primary  font-weight-bold" type="submit"><b>{{$titulo}}</b></button>
		</div>

	</div>


</div>






{!! Form::close() !!}




@endsection


{!! Html::script('js/jquery-3.3.1.js') !!}

@include('ingresos/scripts_ingreos_egresos')



<script type="text/javascript">
	$.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
</script>
