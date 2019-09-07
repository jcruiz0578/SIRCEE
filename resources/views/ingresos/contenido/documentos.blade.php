<div style="height: 3rem"></div>
{{-- {!! Html::style('css/material-dashboard.css') !!} --}}



<div class="container-fluid">
    <div style="line-height: 30px" id="documentos">
        <h2 class="text-danger font-weight-bold">Documentos para Revisar (Opcional)</h2>

        <div class="form-row text-danger font-weight-bold text-center">
            <div class="form-group col-md-12">
                <p><b>Es nula la exigencia de algun Documento por obligatoriedad, tipificado en la Ley de Simplificación
                        de
                        Documentos</b> </p>

            </div>
        </div>


        {{-- ---------------------------- --}}

        <div class="form-row">
            <div class="form-group col-md-2">
                {{ Form::checkbox('dpartida' ,null, null, array('id'=>'dpartida')) }}<b> PARTIDA DE NAC. </b>
            </div>

            <div class="form-group col-md-2">
                {{ Form::checkbox('dfotos',null, null, array('id'=>'dfotos')) }}<b> FOTOS </b>
            </div>

            <div class="form-group col-md-2">
                {{ Form::checkbox('dcedulaest',null, null, array('id'=>'dcedulaest')) }}<b> C.I. EST </b>
            </div>

            <div class="form-group col-md-2">
                {{ Form::checkbox('dcedularep',null, null, array('id'=>'dcedularep')) }}<b> C.I. REP </b>
            </div>

            <div class="form-group col-md-2">
                {{ Form::checkbox('dnotas_certifi',null, null, array('id'=>'dnotas_certifi')) }}<b> NOTAS CERT</b>
            </div>

        </div>

        {{-- ---------------------------- --}}


        {{-- ---------------------------- --}}

        <div class="form-row">
            <div class="form-group col-md-2">
                {{ Form::checkbox('dcarnet',null, null, array('id'=>'dcarnet')) }}<b> CARNET ESC</b>
            </div>

            <div class="form-group col-md-2">
                {{ Form::checkbox('dpasaporte_alimentario',null, null, array('id'=>'dpasaporte_alimentario')) }}<b>
                    PASAPORTE ALIM </b>
            </div>

            <div class="form-group col-md-3">
                {{ Form::checkbox('dcoleccionbicentenaria',null, null, array('id'=>'dcoleccionbicentenaria')) }}<b>
                    COLECC. BICENTENARIA </b>
            </div>

            <div class="form-group col-md-2">
                {{ Form::checkbox('becas',null, null, array('id'=>'becas')) }}<b>
                    BECADO</b>
            </div>

            <div class="form-group col-md-2">
                {{ Form::checkbox('permisolopnna' ,null, null, array('id'=>'permisolopnna')) }}<b> PERMISO LOPNNA
                </b>
            </div>

        </div>

        {{-- ---------------------------- --}}

        {{-- ---------------------------- --}}

        <div class="form-row">
            <div class="form-group col-md-2">
                {{ Form::checkbox('canaima', null, null, ['id' => 'canaima', 'onChange' => 'activar_canaima()']) }}<b>POSEE
                    PC CANAIMA?:</b>
            </div>

            <div id="canaima_datos" class="form-group col-md-3">
                {!! Form::label('canaima_funciona', 'Funciona la PC CANAIMA?:', ['for' => 'canaima_funciona'] ) !!}
                {{ Form::select('canaima_funciona', ['N/A' => 'N/A','NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control formato', 'id'=>'canaima_funciona']) }}
            </div>

            <div id="canaima_datos2" class="form-group col-md-3">
                {!! Form::label('serial_canaima', 'Serial Canaima: ', ['for' => 'serial_canaima'] ) !!}
                {!! Form::text('serial_canaima', null , ['class' => 'form-control formato', 'id' => 'serial_canaima',
                'value' => '', 'placeholder'=>'CODIGO CANAIMA' ] ) !!}
            </div>

        </div>




    </div>





</div>