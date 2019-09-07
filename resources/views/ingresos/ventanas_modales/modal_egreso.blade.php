<!-- VENTANA MODAL  EGRESO -->
<div id="egreso_modal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <i class="far fa-calendar-alt"></i><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="id">Código Est:</label>
                        <input type="text" class="form-control  col-sm-6" id="id_E" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="periodo">Periodo Esc.:</label>
                        <input type="text" class="form-control  col-sm-6" id="periodoescolar" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="title">Céd. Est:</label>
                        <input type="text" class="form-control col-sm-5" id="cedulaE" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Estudiante:</label>
                        <input type="text" class="form-control col-sm-9" id="estudianteE" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Año Est:</label>
                        <input type="text" class="form-control col-sm-3" id="anoestE" disabled>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-sm-6 pb-1">
                            <label class="col-form-label  justify-content-end" for="content">Fecha Ingreso:</label>
                            <input type="date" class="form-control " id="fechaI" disabled>
                        </div>

                        <div class="form-group  col-sm-6 pb-1">
                            <label class="col-form-label justify-content-end" for="content">Fecha Egreso:</label>
                            <input type="date" class="form-control " id="fechaE">
                        </div>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Motivos:</label>
                        <select name="razon" id="razon" class="form-control col-sm-9">
                            <option>N/A</option>
                            <option>Deserción escolar</option>
                            <option>Cambio de Institución del mismo Municipio</option>
                            <option>Cambio de Modalidad</option>
                            <option>Cambio de Institución de otro Municipio</option>
                            <option>Cambio de Institución de otro Estado</option>
                            <option>Bajo Rendimiento Estudiantil/Decisión del Representante</option>
                            <option>Escasos recursos económico de la familia</option>
                            <option>Incorporarse al campo laboral</option>
                            <option>Defunción</option>
                            <option>Enfermedad</option>
                            <option>Emigración</option>
                            <option>Problemas Familiares</option>
                            <option>Matrimonio o concubinato</option>
                            <option>Embarazo precoz</option>
                            <option>Problemas de drogas</option>
                            <option>Sanción penal</option>
                            <option>Sanción Disciplinaria</option>
                            <option>Servicio Militar</option>
                        </select>

                    </div>


                    <div class="modal-footer">
                        <button type="button" id="egresar" class="btn btn-primary  col-sm-6   egreso"
                            data-dismiss="modal"><i class="fas fa-share-square"></i> Egresar <span
                                class="spinner-grow spinner-grow-sm"></span></button>

                        <button type="button" class="btn btn-danger col-sm-6" data-dismiss="modal"><i
                                class="far fa-paper-plane"></i>
                            Salir</button>


                    </div>


            </div>
        </div>
    </div>
</div>


{!! Html::script('js/jquery-3.3.1.js') !!}

{!! Html::script('js/jquery.dataTables.min.js') !!}

{!! Html::script('js/operaciones/egreso.js') !!}