<!-- VENTANA MODAL FECHA INGRESO Y EGRESO -->
<div id="fechaIEModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-calendar-alt"></i><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="id">Código Est:</label>
                        <input type="text" class="form-control  col-sm-6" id="id_IE" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="title">Céd. Est:</label>
                        <input type="text" class="form-control col-sm-5" id="cedula_IE" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Estudiante:</label>
                        <input type="text" class="form-control col-sm-9" id="estudiante_IE" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Año Est:</label>
                        <input type="text" class="form-control col-sm-3" id="anoest_IE" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Fecha In:</label>
                        <input type="date" class="form-control col-sm-5" id="fechaI_IE">
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Fecha Eg:</label>
                        <input type="date" class="form-control col-sm-5" id="fechaE_IE">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary col-sm-6" data-dismiss="modal"><i
                                class="far fa-calendar-alt"></i> Modificar <span
                                class="spinner-grow spinner-grow-sm"></span></button>
                        <button type="button" class="btn btn-danger col-sm-6" data-dismiss="modal"><i
                                class="far fa-paper-plane"></i>
                            Salir</button>
                    </div>


            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '.fechaIE-modal', function() {
$('.modal-title').text('Modificar fecha de Ingreso y Egreso');
$('#id_IE').val($(this).data('id'));
$('#cedula_IE').val($(this).data('cedula'));
$('#estudiante_IE').val($(this).data('estudiante'));
$('#anoest_IE').val($(this).data('anoest'));
$('#fechaI_IE').val($(this).data('fecha_ingreso'));

id = $('#id_IE').val();
$('#fechaIEModal').modal('show');
});

</script>




</div>