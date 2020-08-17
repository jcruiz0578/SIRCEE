@extends('plantilla')
@section('content')
@include('errors/errors')
<div class="container-fluid">
    <h2 class="text-center  font-weight-bold">
        Operaciones con Estudiante
    </h2>
    <br>
    {!! Form::open(['route' => 'ingresos.search', 'method' => 'post', 'novalidate', 'class' => 'form-inline'])
    !!}
    {!! csrf_field() !!}
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        {!!Form::text('busqueda', null, ['class' => 'form-control', 'id' => 'busqueda', 'value' => '',
        'placeholder'=>'Introd. Cedula Id' ] ) !!}
    </div>
    <div class="form-group col-md-2">
        <button type="submit" class="form-control  btn btn-primary "><span><i
                    class="fa fa-search"></i></span>Buscar</button>
    </div>
</div>
{!! Form::close() !!}
@if(Session::has('message'))
<p class="alert alert-success">{{Session::get('message')}}</p>
@endif
<br>
<div class="container-fluid  table-responsive">
    <table id="tabla_operaciones" class="table  table-striped text-center" style="width: 100% ">
        <thead class="text-white bg-primary" >
            <tr>
                <th>Periodo Esc</th>
                <th>id_Ingreso</th>
                <th>Cedula Id</th>
                <th>Apellidos y Nombres</th>
                <th>sexo</th>
                <th>Año de Estudio</th>
                <th>Sección</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr style="color: blue">
                <td>{{ $user->periodoescolar }}</td>
                <td>{{ $user->id_ingreso }}</td>
                <td id="cedulaest">{{ $user->cedulaest }}</td>
                <td> {{ $estudiantes = $user->estudiante->apellidosest.", ". $user->estudiante->nombresest }}</td>
                <td>{{ $user->estudiante->sexoest }}</td>
                <td>{{ $user->anoest }}</td>
                <td>{{ $user->seccion }}</td>
                <td>{{ $user->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- {{ $users->links() }} --}}
<div style="height: 15px"></div>
<div class="container justify-content-center ">
    {{-- para comparar los periodos escolareas --}}
    <input type="hidden" name="mensaje" id="mensaje" value="{{$mensaje}}">
    <input type="hidden" name="boton" id="boton" value="{{$boton}}">
    <input type="hidden" name="status" id="status" value="{{$user->status}}">
    {{--  --}}
    <div class="form-row justify-content-center">
        <div id="boton_prosecucion" style="display:none" class="form-group col-md-4">
            <a href="{{ url('ingresos/editar',array($user->id_ingreso, $operacion='PROSECUCION')) }}"
                class="form-control btn btn-primary  "><i class="fa fa-signal"></i><b> Prosecución</b><span
                    class="spinner-grow spinner-grow-sm"></span></a>
        </div>
        <div class="form-group col-md-3">
            <a href="{{ url('ingresos/editar',array($user->id_ingreso, $operacion='EDITAR')) }}"
                class=" form-control btn btn-success  disabled"><span><i class="fa fa-list-alt"></i></span><b> Modificar</b></a>
        </div>
        <div class="form-group col-md-3">
            <button class=" form-control VerRepresentante btn btn-secondary"  data-id="{{$user->id_ingreso}}"
                data-ced_rep="{{$user->cedularep}}"
                data-representante="{{$representante = $user->representante->apellidosrep.', '. $user->representante->nombresrep}}"
                data-parentesco="{{$user->representante->parentescorep}}"
                data-telefono="{{$user->representante->telefonosrep}}">
                <span><i class="fa fa-users"></i></span> <b>Mostrar Representante</b></button>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
            <button class="cedula-modal btn btn-warning form-control"  disabled   style="vertical-align: middle;"
                data-id="{{$user->id_ingreso}}" data-cedula="{{$user->cedulaest}}">
                <span><i class="fa fa-id-card"></i></span> <b>Modificar cédula</b></button>
        </div>
        <div class="form-group col-md-3">
            <button class="fechaIE-modal btn btn-info form-control "  disabled data-id="{{$user->id_ingreso}}"
                data-cedula="{{$user->cedulaest}}"
                data-estudiante="{{$estudiante = $user->estudiante->apellidosest.', '. $user->estudiante->nombresest}}"
                data-anoest="{{$user->anoest}}" data-fecha_ingreso="{{$user->fecha_ingreso}}">
                <span><i class="far fa-calendar-alt"></i></span> <b>Modif. Fecha Ingleso/Egreso</b></button>
        </div>
        <div id="egreso1" style="display:none" class="form-group col-md-3">
            <button class="egreso-modal btn btn-danger form-control"  disabled  data-id="{{$user->id_ingreso}}"
                data-cedula="{{$user->cedulaest}}"
                data-estudiante="{{$estudiante = $user->estudiante->apellidosest.', '. $user->estudiante->nombresest}}"
                data-anoest="{{$user->anoest}}" data-fecha_ingreso="{{$user->fecha_ingreso}}"
                data-periodoescolar="{{$user->periodoescolar}}">
                <span><i class="fa fa-times-circle"></i></span> <b>Egreso</b><span
                    class="spinner-grow spinner-grow-sm"></span></button>
        </div>
    </div>
</div>
{{-- VENTANA MODAL--}}
@include('ingresos/ventanas_modales/modal_mostar_representante')
@include('ingresos/ventanas_modales/modal_modificar_cedula')
@include('ingresos/ventanas_modales/modal_modificar_fechaIE')
@include('ingresos/ventanas_modales/modal_egreso')
@endsection

{!! Html::script('js/jquery-3.3.1.js') !!}



<script>
    /* para activar o no el boton prosecucion del archivo mostrarestudiantes_operaciones */
jQuery(document).ready(function(){
var boton = $("#boton").prop('value');
var mensaje = $("#mensaje").prop('value');
var egreso =$("#status").prop('value');
if (egreso == 'I') {
document.getElementById('egreso1').style.display = 'block';
}
if (boton == 'ACTIVAR') {
document.getElementById('boton_prosecucion').style.display = 'block';
} else{
    if (mensaje == 'mostrar') {
alert("Este estudiante esta registrado en el Periodo Escolar Actual");
    }
}
if (mensaje=='cedula') {
    alert("La cedula se ha modificado correctamente....");
}
});
</script>
