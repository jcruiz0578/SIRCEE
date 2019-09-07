<div style="height: 30px"></div>
<div style="line-height: 30px" id="documentos">
    <h3>
        <b style="color: red">Documentos para Revisar (Opcional)</b>
    </h3>
    <b style="color: red; text-align: center">Es nula la exigencia de algun Documento por obligatoriedad, </b> <b
        style="color: red; text-align: center">tipificado en la Ley de Simplificación de
        Documentos</b>
    <div class="form-group form-inline">
        {{ Form::checkbox('dpartida' ,null, null, array('id'=>'dpartida')) }}<b> PARTIDA DE NAC. </b>&nbsp;&nbsp;&nbsp;



        {{ Form::checkbox('dfotos',null, null, array('id'=>'dfotos')) }}<b> FOTOS </b>&nbsp;&nbsp;&nbsp;
        {{ Form::checkbox('dcedulaest',null, null, array('id'=>'dcedulaest')) }}<b> C.I. EST </b>&nbsp;&nbsp;&nbsp;
        {{ Form::checkbox('dcedularep',null, null, array('id'=>'dcedularep')) }}<b> C.I. REP </b>&nbsp;&nbsp;&nbsp;
        {{ Form::checkbox('dnotas_certifi',null, null, array('id'=>'dnotas_certifi')) }}<b> NOTAS CERT
        </b>&nbsp;&nbsp;&nbsp;
    </div>
    <div class="form-group form-inline">
        {{ Form::checkbox('dcarnet',null, null, array('id'=>'dcarnet')) }}<b> CARNET ESC
        </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{ Form::checkbox('dpasaporte_alimentario',null, null, array('id'=>'dpasaporte_alimentario')) }}<b> PASAPORTE
            ALIM </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{ Form::checkbox('dcoleccionbicentenaria',null, null, array('id'=>'dcoleccionbicentenaria')) }}<b> COLECC.
            BICENTENARIA </b>&nbsp;&nbsp;&nbsp;
    </div>
    <div class="form-group form-inline">
        {{ Form::checkbox('becas',null, null, array('id'=>'becas')) }}<b>
            BECADO</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{ Form::checkbox('permisolopnna' ,null, null, array('id'=>'permisolopnna')) }}<b> PERMISO LOPNNA
        </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        {{ Form::checkbox('canaima', null, null, ['id' => 'canaima', 'onChange' => 'activar_canaima()']) }}<b>PC.
            CANAIMA.</b>&nbsp;&nbsp;&nbsp;
    </div>
    <div id="canaima_datos">
        <div class="form-group form-inline">
            {!! Form::label('canaima_funciona', 'Funciona la PC CANAIMA?:', ['for' => 'canaima_funciona'] ) !!}
            {{ Form::select('canaima_funciona', ['N/A' => 'N/A','NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control formato', 'id'=>'canaima_funciona']) }}
            &nbsp; &nbsp;&nbsp;
            {!! Form::label('serial_canaima', 'Serial Canaima: ', ['for' => 'serial_canaima'] ) !!}
            {!! Form::text('serial_canaima', null , ['class' => 'form-control formato', 'id' => 'serial_canaima',
            'value' => '', 'placeholder'=>'CODIGO CANAIMA' ] ) !!}
        </div>
    </div>
</div>