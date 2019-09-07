
<div class="form-group">{!! Form::label('name', 'id Generado Automaticamente', ['for' => 'name'] ) !!} {!! Form::text('id', null , ['class' => 'form-control', 'id' => 'id', 'readonly' ] ) !!}</div>
<div class="form-group ">{!! Form::label('login', 'Introduzca el login', ['for' => 'login'] ) !!} {!! Form::text('login', null , ['class' => 'form-control', 'id' => 'login', 'placeholder' => 'Escribe
    el login...', 'value' => 'old(login)' ] ) !!}</div>
<div class="form-group">{!! Form::label('name', 'Introduzca Nombres y Apellidos', ['for' => 'name'] ) !!} {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' =>
    'Escribe el Nombre y Apellidos...', 'value' => 'old(name)' ] ) !!}</div>
<div class="form-group">
    {!! Form::label('categoria', 'Introduzca la categoria', ['for' => 'categoria'] ) !!} <select name="categoria" class="form-control">
        <option value="{{ $users->categoria or 'N/A' }}" disabled selected>{{ $users->categoria or 'N/A' }}</option>
        <option value="USUARIO">USUARIO</option>
        <option value="OPERADOR">OPERADOR</option>
        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('status', 'Introduzca el Estatus', ['for' => 'status'] ) !!} <select name="status" class="form-control">
        <option value="{{ $users->status or 'N/A'}}" disabled selected>{{ $users->status or 'N/A'}}</option>
        <option value="Activo">Activo</option>
        <option value="No Activo">No Activo</option>
    </select>
</div>
<div class="form-group">{!! Form::label('email', 'Introduzca el email', ['for' => 'email'] ) !!} {!! Form::email('email', null , ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Escribe
    el Correo Electronico...', 'value' => 'old(email)' ] ) !!}</div>
<div class="form-group">{!! Form::label('password', 'Introduzca Contraseña', ['for' => 'password'] ) !!} {!! Form::password('password', null , ['class' => 'form-control', 'id' => 'password', 'value'
    => 'old(password)'] ) !!}</div>
