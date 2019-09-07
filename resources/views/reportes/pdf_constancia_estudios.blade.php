@extends('reportes.plantilla_pdf')
@section('content')


@php
$nombre_completo = $c->estudiante->apellidosest.", ". $c->estudiante->nombresest;

$cedulaest = number_format ( $c->estudiante->cedulaest, 0, '', '.' );

date_default_timezone_set ( "America/Caracas" );
setlocale ( LC_TIME, 'es_ES.UTF-8' );
$fecha_actual = strftime("%A, %d de %B de %Y");

@endphp

<div class="container"
    style="margin-left: 60px; margin-right: 30px; margin-top: 30px;   width: 612px; height: 792px; margin: 0 auto;">


    <div id="separacion" style="height: 4rem"></div>

    <h3 class="font-weight-bold text-center">Constancia de Estudios</h3>
    <p></p>

    <div id="separacion" style="height: 4rem"></div>

    <div id="cuerpo" class="text-justify" style="font-size: 1rem; line-height:1.2rem;">

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El suscrito director del <B>LNB GENERAL EN JEFE JOSÉ FRANCISCO
                BERMÚDEZ,</B> Profesor <b>PABLO
                MANUEL MARIN GONZALEZ</b>,
            titular de la Cédula Identidad N° <b>V-9.453.255</b> hace constar por medio de la presente que
            el(la)

            Estudiante: <B>{{$nombre_completo}}</B>, portador(a)
            de la Cédula
            de Identidad N° V-
            <b>{{$cedulaest}}</b>, es estudiante regular del
            <b>{{$c->anoest}}</b> sección <b>{{$c->seccion}},</b> durante el periodo escolar
            <b>{{$c->periodoescolar}}</b>
        </p>
        <br>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Constancia que se expide, de
            parte interesada en Carúpano en fecha <b>{{$fecha_actual}}</b>
        </p>


    </div>


    <div id="separacion" style="height: 8rem"></div>
    <div id="firma" class=" text-center  font-weight-bold" style="font-size: 0.9rem">
        <b>_______________________________________________</b> <br>
        <b> PROFE.PABLO MANUEL MARIN GONZALEZ </b><br>
        <b> C.I N° 9.453.255</b> <br>
        <b>DIRECTOR (E)</b>

    </div>


</div>


@endsection