<div style="height: 3rem"></div>

<div class="container-fluid">
    <div style="line-height: 30px" id="otros">
        <h2 class="text-danger font-weight-bold">Otros datos del Estudiante</h2>


        {{-- ---------------------------- --}}

        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('emailest', 'E-mail:', ['for' => 'emailest'] ) !!}
                {!! Form::email('emailest', null , ['class' => 'form-control formato', 'id' => 'emailest', 'value' =>
                '',
                'placeholder'=>'Correo Electronico' ] ) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('procedencia', 'Pantel de Procedencia:', ['for' => 'procedencia'] ) !!}
                <select name="id_procedencia" id="id_procedencia" class="form-control formato">
                    <option value="{{ $users->id_procedencia }}" selected>
                        {{ $users->nombre_plantel }}
                    </option>


                    @foreach($Institucion as $inst)

                    <option value="{{$inst->id_procedencia}}">{{$inst->nombre_plantel}}</option>

                    @endforeach



                </select>
            </div>

        </div>

        {{-- ---------------------------- --}}



        <div style="height: 3rem"></div>

        <h3 class="text-danger font-weight-bold">Medidas y Tallas</h3>

        {{-- ---------------------------- --}}

        <div class="form-row">
            <div class="form-group col-md-2">
                {!! Form::label('altura', 'Altura(Metro):', ['for' => 'altura'] ) !!}
                {!! Form::text('altura', null , ['class' => 'form-control formato', 'id' => 'altura', 'value' => ''] )
                !!}
            </div>

            <div class="form-group col-md-2">
                {!! Form::label('peso', 'Peso (Kg):', ['for' => 'peso'] ) !!}
                {!! Form::text('peso', null , ['class' => 'form-control formato', 'id' => 'peso','value' => ''] ) !!}
            </div>


            <div class="form-group col-md-3">
                {!! Form::label('pantalon', 'Pantalón (N°):', ['for' => 'pantalon'] ) !!}
                {!! Form::text('pantalon', null , ['class' => 'form-control formato', 'id' => 'pantalon', 'value' => '']
                ) !!}
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('camisa', 'camisa (Letra):', ['for' => 'camisa'] ) !!}
                {!! Form::text('camisa', null , ['class' => 'form-control formato', 'id' => 'camisa', 'value' => ''] )
                !!}
            </div>

            <div class="form-group col-md-2">
                {!! Form::label('zapatos', 'Zapatos(N°):', ['for' => 'zapatos'] ) !!}
                {!! Form::text('zapatos', null , ['class' => 'form-control formato', 'id' => 'zapatos', 'value' => ''] )
                !!}
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                {!! Form::label('observacion', 'Observaciones:', ['for' => 'observacion'] ) !!}
                {!! Form::textarea('observacion', null , ['size' => '50x3', 'class' => 'form-control formato', 'id' =>
                'observacion', 'onKeyUp' => 'this.value = this.value.toUpperCase()','value' => '',
                'placeholder'=>
                'Informacion relevante del estudiante, que no tiene campo de llenado en la ficha electronica'] ) !!}
            </div>
        </div>




    </div>
</div>