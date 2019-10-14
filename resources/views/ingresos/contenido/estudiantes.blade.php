<div class="container-fluid">

    <h2 class="text-danger font-weight-bold">Datos del Estudiante</h2>

    <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::label('cedulaest', 'Cedula de Identidad:', ['for' => 'cedulaest'] ) !!}
            {!! Form::text('cedulaest', null, ['class' => 'form-control formato', 'cedulaest' => 'cedulaest'] ) !!}

        </div>
    </div>


    {{-- ---------------------------- --}}


    <div class="form-row">
        <div class="form-group col-md-5">
            {!! Form::label('apellidosest', 'Apellidos:', ['for' => 'apellidosest', ] ) !!}
            {!! Form::text('apellidosest', null, ['class' => 'form-control formato', 'id' => 'apellidosest','onKeyUp' =>
            'this.value = this.value.toUpperCase()', 'placeholder' => 'introduzca los Apellidos...', 'value' => '' ] )
            !!}
        </div>

        <div class="form-group col-md-5">

            {!! Form::label('nombresest', 'Nombres:', ['for' => 'nombresest'] ) !!}
            {!! Form::text('nombresest', null, ['class' => 'form-control formato', 'id' => 'nombresest','onKeyUp' =>
            'this.value = this.value.toUpperCase()', 'placeholder' => 'introduzca los Nombres...', 'value' => '' ] ) !!}
        </div>


        <div class="form-group col-md-2">

            {!! Form::label('sexoest', 'Sexo:', ['for' => 'sexoest'] ) !!}
            {{ Form::select('sexoest', ['N/A' => 'N/A', 'F' => 'Femenino', 'M' => 'Masculino'], null, ['class' => 'form-control formato']) }}

        </div>

    </div>
    {{-- ---------------------------- --}}

    <div class="form-row">
        <div class="form-group col-md-3">
            {!! Form::label('lateralidad', 'Lateralidad:', ['for' => 'lateralidad'] ) !!}
            {{ Form::select('lateralidad', ['N/A' => 'N/A',
                'D' => 'Derecho(a)',
                'Z' => 'Zurdo(a)',
                'A' => 'Ambidiestro(a)'], null, ['class' => 'form-control formato', 'id' => 'lateralidad']) }}&nbsp; &nbsp; &nbsp;
        </div>

        <div class="form-group col-md-3">

            {!! Form::label('fnest', 'Fecha de Nacimiento:', ['for' => 'fnest'] ) !!}
            {!! Form::Date('fnest', null , ['class' => 'form-control formato', 'id' => 'fnest', 'placeholder' =>
            'dd/mm/aaaa...', 'value' => '' ] ) !!}
        </div>


       
        <div class="form-group col-md-4">

            {!! Form::label('edad', 'Edad Calculada:', ['for' => 'edad'] ) !!}
            {!! Form::text('edad', null , ['class' => 'form-control formato', 'id' => 'edad', 'placeholder' => 'DAR
            CLICK....', 'value' => '' ] ) !!}

        </div>

         <div class="form-group col-md-2">
            {!! Form::label('ordennac', 'Orden de Nac.:', ['for' => 'ordennac'] ) !!}
            {!! Form::number('orden_nac', null , ['class' => 'form-control formato', 'id' => 'orden_nac', 'value'
            =>'','min'=> '0', 'max'=>'20' ] ) !!}
        </div>

    </div>

    {{-- ---------------------------- --}}

    <div class="form-row">
       

        <div class="form-group col-md-3">

            {!! Form::label('estado_nac', 'Estado de Nac:', ['for' => 'estado_nac'] ) !!}

            <select name="estado_nac" id="estado_nac" class="form-control formato">
                <option value="{{isset($users->estado) ? $users->estado: 'N/A' }}" disabled selected>{{isset($users->estado) ? $users->estado: 'N/A' }}
                </option>
                {{ $data = DB::table('ubicacion_estado')->select('nombre')->get() }}
                @foreach($data as $rol)
                <option value="{{$rol->nombre}}">{{$rol->nombre}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-md-7">

            {!! Form::label('lugar_nac', 'Lugar de Nac:', ['for' => 'lugar_nac'] ) !!}
            {!! Form::text('lugar_nac', null , ['class' => 'form-control formato', 'id' => 'lugar_nac', 'onKeyUp' =>
            'this.value = this.value.toUpperCase()','value' => '' ] ) !!}

        </div>
        <div class="form-group col-md-2">
            {!! Form::label('estado_civil', 'Est Civil:', ['for' => 'estado_civil'] ) !!}

            {{ Form::select('estado_civil', ['N/A' =>'N/A',
    'Soltero(a)' => 'Soltero(a)',
    'Casado(a)' => 'Casado(a)',
    'Divorciado(a)' => 'Divorciado(a)',
    'Viudo(a)' => 'Viudo(a)',
    'Concubinato' => 'Concubinato'], null,['class' => 'form-control formato'])  }}
        </div>

    </div>

    {{-- ---------------------------- --}}



    {{-- ---------------------------- --}}

    <div class="form-row">
        <div class="form-group col-md-3">
            {!! Form::label('materiapendiente', 'Materia Pendiente?:', ['for' => 'materiapendiente'] ) !!}
            {{ Form::select('materiapendiente',['N/A' => 'N/A',
            'NO' => 'NO',
            'SI' => 'SI'], null, ['class' => 'form-control formato']) }}
        </div>

        <div class="form-group col-md-3">
            {!! Form::label('condicionest', 'Condición de Estudio:', ['for' => 'condicionest'] ) !!}
            {{  Form::select('condicionest', ['N/A' => 'N/A',
    'NUEVO INGRESO' => 'NUEVO INGRESO',
    'REGULAR' => 'REGULAR',
    'REPITIENTE DE LA INST' => 'REPITIENTE DE LA INST',
    'REPITIENTE OTRA INST' => 'REPITIENTE OTRA INST',
    'REZAGADO' => 'REZAGADO'], null, ['class' => 'form-control formato']) }}
        </div>


        <div class="form-group col-md-3">

            {!! Form::label('anoest', 'Año de Estudio:', ['for' => 'anoest'] ) !!}
            {{ Form::select('anoest', ['N/A' => 'N/A',
            '1ER AÑO' => '1ER AÑO',
            '2DO AÑO' => '2DO AÑO',
            '3ER AÑO' => '3ER AÑO',
            '4TO AÑO CS' => '4TO AÑO CS',
            '5TO AÑO CS' => '5TO AÑO CS'], null, ['class' => 'form-control formato']) }}

        </div>
        <div class="form-group col-md-3">
            {!! Form::label('seccion', 'Sección:', ['for' => 'seccion'] ) !!}
            {!! Form::text('seccion', null , ['class' => 'form-control formato', 'id' => 'seccion', 'value' => '' ] )
            !!}
        </div>

    </div>

    {{-- ---------------------------- --}}