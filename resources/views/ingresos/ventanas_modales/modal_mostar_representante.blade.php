<!-- VENTANA MODAL PARA VER REPRESENTANTES -->
<div id="VerRepresentante" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-restroom"></i> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="id">Código Est:</label>
                        <input type="text" class="form-control  col-sm-6" id="id_est" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="title">Céd.Rep:</label>
                        <input type="name" class="form-control col-sm-3" id="ced_rep" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="content">Representante:</label>
                        <input type="name" class="form-control col-sm-9" id="representante" disabled>
                    </div>


                    <div class="form-inline  pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="parentesco">Parentesco:</label>
                        <input type="name" class="form-control col-sm-9" id="parentesco" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="telef">Teléfonos:</label>
                        <input type="name" class="form-control col-sm-9" id="telefono" disabled>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger col-sm-6" data-dismiss="modal"><i
                            class="far fa-paper-plane"></i> Salir <span
                            class="spinner-grow spinner-grow-sm"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<script>
    // mostrar representante
$(document).on('click', '.VerRepresentante', function() {
$('.modal-title').text('Mostrar Representante');
$('#id_est').val($(this).data('id'));
$('#ced_rep').val($(this).data('ced_rep'));
$('#representante').val($(this).data('representante'));
$('#parentesco').val($(this).data('parentesco'));
$('#telefono').val($(this).data('telefono'));
$('#VerRepresentante').modal('show');
});


</script>
