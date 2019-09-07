@extends('layout') @section('content')
<h1>Crear Usuarios</h1>
@include('errors/errors')
<!--<form method="POST" action="{{ url('guardar') }}" class="form">-->
{!! Form::model($users, array('route' => 'users.store', 'method' => 'POST'), array('role' => 'form')) !!} {!! csrf_field() !!}
<div style="text-align: right">
    <a href="{{ url('usuarios/index') }}">Mostrar Todos los Usuarios</a>
</div>
<form role="form">
    @include('contenido/campos') {!! Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) !!} {!! Form::close() !!}
    <!-- Mas campos aqui… -->
</form>
<!--</form>-->
@endsection
