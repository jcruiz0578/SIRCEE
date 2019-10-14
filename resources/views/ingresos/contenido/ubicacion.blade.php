<div style="height: 3rem"></div>

<div class="container-fluid">
    <div style="line-height: 30px" id="ubicacion">

        <h2 class="text-danger font-weight-bold">Datos y Ubicación Domiciliaria del Estudiante</h2>


        {{-- ---------------------------- --}}

        <div class="form-row">
            <div class="form-group col-md-2">
                {!! Form::label('tipovia', 'Tipo de Vía:', ['for' => 'tipovia'] ) !!}

                {{ Form::select('tipovia', ['N/A' => 'N/A', 
                    'AUTOPISTA' => 'AUTOPISTA', 
                    'AVENIDA' =>'AVENIDA', 
                    'CALLE' => 'CALLE', 
                    'CALLEJON' => 'CALLEJON', 
                    'ESQUINA' => 'ESQUINA', 
                    'MANZANA' => 'MANZANA', 
                    'CARRETERA' => 'CARRETERA', 
                    'VEREDA' => 'VEREDA'], null, ['class' => 'form-control formato']) }}
            </div>

            <div class="form-group col-md-7">
                {!! Form::label('direccionest', 'Dirección (URB/CALLE/SECTOR/VEREDA/N°CASA):', ['for' => 'direccionest']
                ) !!}
                {!! Form::text('direccionest', null , ['class' => 'form-control formato', 'id' => 'direccionest',
                'onKeyUp' =>
                'this.value = this.value.toUpperCase()','value' => '', 'placeholder'=>'(URB/CALLE/SECTOR/VEREDA/N°CASA)'
                ] ) !!}
            </div>



            <div class="form-group col-md-3">
                {!! Form::label('zonaubicacion', 'Zona Ubicación:', ['for' => 'zonaubicacion'] ) !!}
                {{ Form::select('zonaubicacion', ['N/A' => 'N/A', 
                    'Urbana' => 'Urbana',
                    'Rural' => 'Rural'], null, ['class' => 'form-control formato']) }}
            </div>

        </div>

        {{-- ---------------------------- --}}



        {{-- ---------------------------- --}}

        <div class="form-row">
            <div class="form-group col-md-3">
                {!! Form::label('tipovivienda', 'Tipo de Vivienda:', ['for' => 'tipovivienda'] ) !!}
                {{ Form::select('tipovivienda', ['N/A' => 'N/A', 
            'Casa' => 'Casa', 
            'Apartamento' => 'Apartamento', 
            'Rancho' => 'Rancho', 
            'Quinta' => 'quinta', 
            'Casa Vecindad' => 'Casa Vecindad', 
            'Improvisada' => 'Improvisada', 
            'Refugio' => 'Refugio'], null, ['class' => 'form-control formato']) }}
            </div>

            <div class="form-group col-md-3">
                {!! Form::label('ubicacionvivienda', 'Ubic. de Vivienda:', ['for' => 'ubucacionvivienda'] ) !!}
                {{ Form::select('ubicacionvivienda', ['N/A' => 'N/A', 
                    'Urbanización' => 'Urbanización', 
                    'Barrio' => 'Barrio', 
                    'Caserio' => 'Caserio', 
                    'Zona Residencial' => 'Zona Residencial'], null, ['class' => 'form-control formato']) }}
            </div>



            <div class="form-group col-md-3">
                {!! Form::label('condicionvivienda', 'Cond. de Vivienda:', ['for' => 'condicionvivienda'] ) !!}
                {{ Form::select('condicionvivienda', ['N/A' => 'N/A',
                        'Alquilada' => 'Alquilada', 
                        'Propia Pagada' => 'Propia Pagada', 
                        'Propia Pagandose' => 'Propia Pagandose', 
                        'Al cuidado' => 'Al cuidado', 
                        'Arrimado' => 'Arrimado', 
                        'Cedida' => 'Cedida', 'De la Empresa' => 'De la Empresa', 
                        'Anexo' => 'Anexo', 
                        'Prestada' => 'Prestada', 
                        'Herencia' => 'Herencia'], null, ['class' => 'form-control formato']) }}
            </div>


            <div class="form-group col-md-3">
                {!!Form::label('infraestructura', 'Cond. Infraestructura:', ['for' => 'infraestructura'] ) !!}
                {{ Form::select('infraestructura', ['N/A' => 'N/A', 
                        'Buena' => 'Buena', 
                        'Deteriorada' => 'Deteriorada', 
                        'Deplorable' => 'Deplorable', 
                        'Excelente' => 'Excelente', 
                        'Regular' => 'Regular'], null, ['class' => 'form-control formato']) }}
            </div>

        </div>

        {{-- ---------------------------- --}}








    </div>
</div>