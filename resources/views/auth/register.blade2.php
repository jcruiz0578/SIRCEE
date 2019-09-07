@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="">
                <div class="panel-heading">
                    <h2>
                        <b>Registro de usuarios</b>
                    </h2>
                </div>
                <div class="panel-body">
                   <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group">{!! Form::label('name','&nbsp;&nbsp;&nbsp;&nbsp;id Generado Automaticamente', ['for' => 'name'] ) !!} 
                        {!! Form::text('id', null , ['class' => 'form-control', 'id' => 'id', 'readonly' ] ) !!}</div>
                        <div class ="form-group{{ $errors->has('login') ? ' has-error' : '' }}"> 
                        {!! Form::label('login', '&nbsp;&nbsp;&nbsp;&nbsp;Introduzca el login', ['for' => 'login'] ) !!}
                        {!! Form::text('login', null , ['class' => 'form-control', 'id' => 'login', 'placeholder' => 'Escribe el login...', 'value' => 'old(login)' ] ) !!} 
                        @if($errors->has('login')) <span class="help-block"> <strong>{{$errors->first('login') }}</strong></span> @endif 
                
                </div>
                
                <div class="form-group">
                    {!! Form::label('name', '&nbsp;&nbsp;&nbsp;&nbsp;Introduzca Nombres y Apellidos', ['for' => 'name'] ) !!} 
                    {!! Form::text('name', null , ['class' =>'form-control', 'id' => 'name', 'placeholder' => 'Escribe el Nombre y Apellidos...', 'value' => 'old(name)' ] ) !!}</div>
       
                    <div class="form-group">
                    {!! Form::label('categoria', '&nbsp;&nbsp;&nbsp;&nbsp;Introduzca la categoria', ['for' => 'categoria'] ) !!} 
                    <select name="categoria" class="form-control">
                        <option value="N/A" disabled selected>N/A</option>
                        <option value="USUARIO">USUARIO</option>
                        <option value="OPERADOR">OPERADOR</option>
                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    </select>
                </div>
               
                <div class="form-group">
                    {!! Form::label('status', '&nbsp;&nbsp;&nbsp;&nbsp;Introduzca el Estatus', ['for' => 'status'] ) !!} 
                    <select name="status" class="form-control">
                        <option value="N/A" disabled selected>N/A</option>
                        <option value="Activo">Activo</option>
                        <option value="No Activo">No Activo</option>
                    </select>
                </div>
               
               <div class="form-group">
                   {!! Form::label('email', '&nbsp;&nbsp;&nbsp;&nbsp;Introduzca el email', ['for' => 'email'] ) !!} 
                   {!! Form::email('email', null , ['class' => 'form-control', 'id' => 'email', 
                   'placeholder' => 'Escribe el Correo Electronico...', 'value' => 'old(email)' ] ) !!}
                </div>
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', '&nbsp;&nbsp;&nbsp;&nbsp;Introduzca Contraseña', ['for' => 'password'] ) !!} 
                    <input id="password" type="password" class="form-control" name="password" required>
                   
                    @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong>
                    </span> @endif
                </div>
                
                <div class="form-group">
                    {!! Form::label('password-confirm', '&nbsp;&nbsp;&nbsp;&nbsp;Introduzca Contraseña', ['for' => 'password-confirm'] ) !!} 
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    {!! Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
