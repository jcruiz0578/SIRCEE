<div style="height: 3rem"></div>

<div class="container-fluid">
    <div style="line-height: 30px" id="otros">
        <h2 class="text-danger font-weight-bold">Datos del Representante</h2>


        <div class="form-row">
            <div class="form-group col-md-3">
                {!! Form::label('cedularep', 'Cedula de Identidad:', ['for' => 'cedularep'] ) !!}
                {!! Form::text('cedularep', null , ['class' => 'form-control formato', 'cedularep' => 'cedularep'] ) !!}
            </div>


        </div>
        {{-- ---------------------------- --}}


        <div class="form-row">
            <div class="form-group col-md-5">
                {!! Form::label('apellidosrep', 'Apellidos:', ['for' => 'apellidosrep', ] ) !!}
                {!! Form::text('apellidosrep', null , ['class' => 'form-control formato', 'id' => 'apellidosrep',
                'onKeyUp' =>
                'this.value = this.value.toUpperCase()','placeholder' => 'introduzca los Apellidos...', 'value' => '' ]
                )
                !!}
            </div>

            <div class="form-group col-md-5">

                {!! Form::label('nombresrep', 'Nombres:', ['for' => 'nombresrep'] ) !!}
                {!! Form::text('nombresrep', null , ['class' => 'form-control formato', 'id' => 'nombresrep', 'onKeyUp'
                =>
                'this.value = this.value.toUpperCase()', 'placeholder' => 'introduzca los Nombres...', 'value' => '' ] )
                !!}
            </div>


            <div class="form-group col-md-2">
                {!! Form::label('sexorep', 'Sexo:', ['for' => 'sexorep'] ) !!}
                {{ Form::select('sexorep', ['N/A' => 'N/A',
    'F' => 'Femenino',
    'M' => 'Masculino'], null,['class' => 'form-control formato']) }}
            </div>

        </div>
        {{-- ---------------------------- --}}


        {{-- ---------------------------- --}}


        <div class="form-row">
            <div class="form-group col-md-4">
                {!! Form::label('parentescorep', 'Parentesco:', ['for' => 'parentescorep'] ) !!}
                {{ Form::select('parentescorep', ['N/A' => 'N/A',
            'MADRE' => 'MADRE',
            'PADRE' => 'PADRE',
            'TIO(A)' => 'TIO(A)',
            'ABUELO(A)' => 'ABUELO(A)',
            'PADRASTRO' => 'PADRASTRO',
            'MADRASTRA' => 'MADRASTRA',
            'HERMANO(A)' => 'HERMANO(A)',
            'REPRESENTANTE ANTE LA LOPNA' => 'REPRESENTANTE ANTE LA LOPNA'], null, ['class' => 'form-control formato']) }}
            </div>

            <div class="form-group col-md-5">

                {!! Form::label('telefonosrep', 'Teléfonos:', ['for' => 'telefonosrep', ] ) !!}
                {!! Form::text('telefonosrep', null , ['class' => 'form-control formato', 'id' => 'telefonosrep',
                'value' => ''
                ] ) !!}
            </div>


            <div class="form-group col-md-3">
                {!! Form::label('emailrep', 'E-mail:', ['for' => 'emailrep'] ) !!}
                {!! Form::email('emailrep', null , ['class' => 'form-control formato', 'id' => 'emailrep', 'placeholder'
                =>
                'Correo Electronico...', 'value' => '' ] ) !!}
            </div>

        </div>
        {{-- ---------------------------- --}}


        {{-- ---------------------------- --}}


        <div class="form-row">
            <div class="form-group col-md-5">
                {!! Form::label('trabaja', 'Trabaja?:', ['for' => 'trabaja'] ) !!}
                {{ Form::select('trabaja', ['NO' => 'NO',
            'NO' => 'NO',
            'SI' => 'SI'], null, ['class' => 'form-control formato', 'id'=>'trabaja', 'onChange' => 'activar_trabajo()']) }}
            </div>
        </div>

        <div class="form-row">

            <div id="trabajo" class="form-group col-md-6">
                {!! Form::label('lugartrabajo', 'Lugar de Trabajo:', ['for' => 'lugartrabajo', ] ) !!}
                {!! Form::text('lugartrabajo', null, ['class' => 'form-control formato', 'id' => 'lugartrabajo',
                'onKeyUp' =>
                'this.value = this.value.toUpperCase()'] ) !!}
            </div>


            <div id="trabajo_sueldo" class="form-group col-md-6">
                {!! Form::label('sueldo', 'Sueldo que devenga?:', ['for' => 'sueldo'] ) !!}
                {{ Form::select('sueldo', ['N/A' => 'N/A',
                         'MINIMO' => 'MINIMO',
                         'POR ENCIMA' => 'POR ENCIMA',
                         'POR DEBAJO' => 'POR DEBAJO'], null, ['class' => 'form-control formato', 'id'=>'sueldo']) }}

            </div>

        </div>
        {{-- ---------------------------- --}}


        {{-- ---------------------------- --}}


        <div class="form-row pt-3">
            <div class="form-group col-md-5">
                {!! Form::label('radiodireccion', 'La misma Dirección del estudiante?:', ['for' => 'radiodireccion'] )
                !!}
                <input type="radio" name="radioDireccion" id="radioDireccionSI" value="SI"
                    onChange="activar_direccion()"><b>SI</b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="radioDireccion" id="radioDireccionNO" value="NO"
                    onChange="activar_direccion()"><b>NO</b>
            </div>

            <div class="form-group col-md-7">

                {!! Form::text('direccionrep', null , ['class' => 'form-control formato', 'id' =>
                'direccionrep','onKeyUp' =>
                'this.value = this.value.toUpperCase()', 'value' => '',
                'placeholder'=>'(URB/CALLE/SECTOR/VEREDA/N°CASA)' ] )
                !!}
            </div>




        </div>
        {{-- ---------------------------- --}}






    </div>
</div>
