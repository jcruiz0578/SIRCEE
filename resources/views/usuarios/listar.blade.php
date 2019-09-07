@extends('layout') | @section('content')
<div class="container">
    <div class="row">
        <h2 style="text-align: center">
            <b>Operaciones con Usiarios</b>
        </h2>
        <br> {!! Form::open(['route' => 'users.search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!} {!! csrf_field() !!}
        <div class="form-group nowrap">
            <label for="Listar Usuarios">Nombre</label> <input type="text" class="form-control" name="name">
            <button type="submit" class="btn btn-default">Buscar</button>
            <a href="{{url('usuarios/index')}}" class="btn btn-primary">Todos</a> <a href="{{url('usuarios/crear')}}" class="btn btn-primary">Crear Nuevo</a>
        </div>
        {!! Form::close() !!} @if(Session::has('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
        @endif <br>
        <table class="table table-responsive table-striped nowrap">
            <thead>
                <tr>
                    <th nowrap>id</th>
                    <th nowrap>Login</th>
                    <th nowrap>Nombre de Usuarios</th>
                    <th nowrap>Categoria</th>
                    <th nowrap>Estatus</th>
                    <th nowrap>Correo Electronico</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td nowrap>{{ $user->id }}</td>
                    <td nowrap>{{ $user->login }}</td>
                    <td nowrap>{{ $user->name }}</td>
                    <td nowrap>{{ $user->categoria }}</td>
                    <td nowrap>{{ $user->status }}</td>
                    <td nowrap>{{ $user->email }}</td>
                    <td nowrap><a href="{{ url('usuarios/editar', $user->id) }}" class="btn btn-primary">Editar</a> <a href="{{ url('usuarios/eliminar/'.$user->id) }}"
                        class="btn btn-danger btn-primary" onclick=" return validar();"
                    >Borrar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{--{!! $users->render() !!}--}} {{ $users->links() }}
    </div>
</div>
@endsection
