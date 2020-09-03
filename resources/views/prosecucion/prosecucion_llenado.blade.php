@extends('plantilla')
@section('content')
@include('errors/errors')
{!! Html::style('css/jquery.dataTables.min.css') !!}
<h2 class="text-center  font-weight-bold">
	Prosecución de estudiantes (INSCRIPCIÓN)
</h2>
@include('mensajes')
<div class="container  table-responsive pt-4  pb-4" style="background-color:#eef1f1;  box-shadow: 14px 14px 35px #999;
border-radius: 1.2rem 1.2rem 1.2rem 1.2rem;">
<div class="form-row  font-weight-bold">
	<div class="form-group col-md-3   ">
		<label for="anoest">Año de estudio</label>
		<select id="anoest" name="anoest" class="form-control font-weight-bold">
			<option value="N/A">N/A</option>
			<option value="T">Todas</option>
			<option value="1ER AÑO">1ER AÑO</option>
			<option value="2DO AÑO">2DO AÑO</option>
			<option value="3ER AÑO">3ER AÑO</option>
			<option value="4TO AÑO CS">4TO AÑO CS</option>
			<option value="5TO AÑO CS">5TO AÑO CS</option>
		</select>
	</div>
	<div class="form-group col-md-2 ">
		<label for="seccion">Sección</label>
		<select id="seccion" name="seccion" class="form-control font-weight-bold">
			<option value="N/A">N/A</option>
			<option value="Todas">Todas</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
			<option value="F">F</option>
			<option value="G">G</option>
			<option value="H">H</option>
			<option value="I">I</option>
			<option value="U">U</option>
		</select>
	</div>

    <div class="form-group col-md-2 ">
        <label for="periodoescolar">Periodo Escolar</label>
        <select id="periodoescolar" name="periodoescolar" class="form-control font-weight-bold">
            <option value="N/A">N/A</option>
            <option value="2019-2020">2019-2020</option>

        </select>
    </div>

    <div class="form-group col-md-3   ">
        <label for="anoestprosecucion">Año de estudio a inscribir</label>
        <select id="anoestprosecucion" name="anoestprosecucion" class="form-control font-weight-bold">
            <option value="N/A">N/A</option>

            <option value="1ER AÑO">1ER AÑO</option>
            <option value="2DO AÑO">2DO AÑO</option>
            <option value="3ER AÑO">3ER AÑO</option>
            <option value="4TO AÑO CS">4TO AÑO CS</option>
            <option value="5TO AÑO CS">5TO AÑO CS</option>
        </select>
    </div>


	<div class="form-group     col-md-2  align-self-end ">
		<button type="submit" id="consultar" name="consultar" class="btn btn-primary  form-control font-weight-bold enviar" style="height: 4rem;border-radius: 1.2rem 1.2rem 1.2rem 1.2rem; "><i class="fa fa-list-alt"></i> Consultar</button>
		</div>
	</div>
    <form name="f1">
    <table id="tabla1" class="table  table-hover  table-bordered text-center " style="width: 100%; ">
		<thead class="text-white bg-primary">
			<tr class="font-weight-bold">
				<th>N°</th>
                <th></th>
				<th>Código</th>
				<th>Cedula Id</th>
				<th>Apellidos y Nombres</th>

			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot class="text-white bg-primary">
			<tr class="font-weight-bold">
				<th>N°</th>
                <th></th>
				<th>Código</th>
				<th>Cedula Id</th>
				<th>Apellidos y Nombres</th>

			</tr>
		</table>
        <a href="javascript:seleccionar_todo()">Marcar todos</a> <br>
        <a href="javascript:deseleccionar_todo()">Desmarcar Todos</a>
    </form>
		<div class="form-row  font-weight-bold   justify-content-center  pt-3">
			<div class="form-group col-sm-4  col-md-3">
				<button type="submit" id="registrar" name="registrar" class="btn btn-outline-primary  form-control font-weight-bold enviar" style="height: 4rem;  border-radius: 1.2rem 1.2rem 1.2rem 1.2rem;  "><span><i class="fas fa-check"></i> Prosecución</span></button>
			</div>
		</div>
	</div>

	{!! Html::script('js/jquery-3.3.1.js') !!}
	{!! Html::script('js/jquery.dataTables.min.js') !!}


	<script type="text/javascript">
		$(document).ready(function() {
			$("#consultar").on("click", function(e) {
				e.preventDefault();
				$("#tabla1").dataTable().fnDestroy();
				var seccion = document.getElementById("seccion").value;
				var anoest = document.getElementById("anoest").value;
                var periodoescolar = document.getElementById("periodoescolar").value;
				/*  LLENAR DATATABLE*/
				var t =	$("#tabla1").DataTable({
					scrollY: "400px",
					scrollX: true,
					scrollCollapse: true,
					pageLength: 35,
					paging: false,
					order: false,
					bFilter: false,
					info: true,
					lengthMenu: [
					[10, 25, 35, -1],
					[10, 25, 35, "All"]
					],
				// /* "order": [[4, 'asc'], [1, 'Desc']],
				order: false,
				language: {
					lengthMenu: "Mostrar _MENU_ registros",
					search: "Buscar:",
					info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
					infoEmpty: "Mostrando 0 a 0 de 0 registros",
					sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
					sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
					paginate: {
						first: "Primero",
						last: "Ultimo",
						next: "Próximo",
						previous: "Anterior"
					}
				},
				processing: true,
				serverSide: true,
				"ajax": {
					url: "/prosecucion_consulta",
					type: "get",
					data:{
						anoest:anoest,
                        seccion:seccion,
                        periodoescolar:periodoescolar
         }
     },
				 //ajax: "/calificaciones_consulta",
				 columnDefs: [
				 { width: 50, targets: 0 },
                 { width: 50, targets: 1 },
				 { width: 250, targets: 2 },
				 {width: 200, targets: 3 },

				 {"searchable": false, "orderable": false, "targets": 0 }
				 ],
//"order": [[ 1, 'asc' ]],
// para la nu,eracion
//"columnDefs": [ { "searchable": false, "orderable": false, "targets": 0 } ], "order": [[ 1, 'asc' ]],
columns: [
{
	data: null, // para poder validar la numeracion
},
    {
        data: "chck1",
        name: "chck1"
    },

{
	data: "id_ingreso",
	name: "id_ingreso"

},
{
	data: "cedulaest",
	name: "cedulaest"
},

    { data: null, render: function (data) {
            // Combinar campos
            return data.estudiante.apellidosest+', '+data.estudiante.nombresest;
        } },

]
});
// para la numeracion
t.on( 'order.dt search.dt', function () { t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) { cell.innerHTML = i+1; } ); } ).draw();
/*  LLENAR DATATABLE*/
});
			/***********REGISTRAR*******************/
			$("#registrar").on("click", function (e) {
				e.preventDefault();


                var id_est = $("input[name='chck1[]']:checked")
                    .map(function () {
                        return this.value;
                    })
                    .get();

				if(id_est==""){
                    alert("Debe seleccionar a los estudiantes");
                    return false;
                }

                var anoestprosecucion = document.getElementById("anoestprosecucion").value;


                if (!confirm("Desea realizar el Proceso de prosecución..? ")) {
                    return false;
                }


   $.ajaxSetup({
   	headers: {
   		"X-CSRF-TOKEN": $('meta[name="_token"]').attr("content")
   	}
   });
   jQuery.ajax({
   	url: "/prosecucion/registrar",
   	method: "get",
   	data: {
        id_est: id_est,
        anoestprosecucion: anoestprosecucion

   	},
   	success: function (data) {
   		console.log(data);
   	}
   });
   alert("Se han inscrito los estudiantes en la modalidad prosecución");
   $("#tabla1").DataTable().ajax.reload();

});
			/****************************************/
		});
	</script>

<script>
    function seleccionar_todo(){
        for (i=0;i<document.f1.elements.length;i++)
            if(document.f1.elements[i].type == "checkbox")
                document.f1.elements[i].checked=1
    }

    function deseleccionar_todo(){
        for (i=0;i<document.f1.elements.length;i++)
            if(document.f1.elements[i].type == "checkbox")
                document.f1.elements[i].checked=0
    }

</script>





	@endsection
