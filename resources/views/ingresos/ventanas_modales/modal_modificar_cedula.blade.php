<!-- VENTANA MODAL PARA MODIFICAR CEDULA -->
<div id="cedulaModal" class="modal fade" data-backdrop='static' data-keyboard='false' tabindex='-1' role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-id-card"></i> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="id">Código Est:</label>
                        <input type="text" class="form-control  col-sm-6" id="id_mod" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-3 justify-content-end" for="title">Céd.Actual:</label>
                        <input type="name" class="form-control col-sm-5" id="cedulaV_mod" disabled>
                    </div>

                    <div class="form-inline pb-1">
                        <label class="col-form-label col-sm-4 justify-content-start" for="content">Cédula
                            Nueva:</label>
                        <input type="number" class="form-control col-sm-5" id="cedulaN_mod" autofocus>
                    </div>


                    <div class="modal-footer">
                        <button id="boton_mod" type="button" class="btn btn-primary col-sm-6 modi_ced"><i
                                class="fa fa-id-card"></i>
                            Modificar <span class="spinner-grow spinner-grow-sm"></span></button>
                        <button id="boton_cerrar" type="button" class="btn btn-danger col-sm-6" data-dismiss="modal"><i
                                class="far fa-paper-plane"></i>
                            Salir</button>
                    </div>


            </div>
        </div>
    </div>
</div>


{!! Html::script('js/operaciones/modificar_cedula.js') !!}




</div>