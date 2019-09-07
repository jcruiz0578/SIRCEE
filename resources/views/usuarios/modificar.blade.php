@extends('layout') 
@section('content')
<h3 class="">
    Editar Usuario: <b>{{ $users->name }}</b>
</h3>
@include('errors/errors') 
{!! Form::model($users, [ 'route' => ['users.update', $users->id], 'method' => 'PUT']) !!}
<div style="text-align: right">
    <b> <a href="{{url('usuarios/index')}}">Mostrar Todos los Usuarios</a></b>
</div>
@include('contenido/campos')
<button type="submit" class="btn btn-lg btn-primary">Guardar</button>
{!! Form::close() !!} 
@endsection
