@extends('plantilla')

@section('content')
@include('errors/errors')



{!! Html::style('css/jquery.dataTables.min.css') !!}


<h2 class="text-center  font-weight-bold">
	Asignar calificaciones
</h2>

@include('mensajes')





<div class="container">


	<div class="form-row  font-weight-bold">


		<div class="form-group col-md-2">
			<label for="">Año de estudio</label>
			<select id="anoest" name="anoest" class="form-control font-weight-bold">
				<option >N/A</option>
				<option >Todas</option>
				<option >1ER AÑO</option>
				<option >2DO AÑO</option>
				<option >3ER AÑO</option>
				<option >4TO AÑO CS</option>
				<option >5TO AÑO CS</option>
			</select>
		</div>

		<div class="form-group col-md-1">
			<label for="">Sección</label>

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



		<div class="form-group     col-md-2  align-self-end ">
			<button type="submit" id="consultar" name="consultar" class="btn btn-primary  form-control font-weight-bold enviar" style="height: 4rem; "><span><i class="fa fa-list-alt"></i> Consultar</button>
		</div>

	</div>

	<div class="form-row  font-weight-bold   justify-content-end">

		<div class="form-group col-md-2">
			<label for="">Area</label>
			<select name="combomaterias" id="combomaterias" class="form-control font-weight-bold">
				<option value="N/A">N/A</option>
			</select>

		</div>


		<div class="form-group col-md-2">
			<label for="">Periodo</label>
			<select name="periodo" id="periodo" class="form-control font-weight-bold">
				<option value="N/A">N/A</option>
				<option value="1">1ER LAPSO</option>
				<option value="2">2DO LAPSO</option>
				<option value="3">3ER LAPSO</option>
				<option value="D">DEFINITIVA</option>
				<option value="R">REVISION</option>
			</select>
		</div>


	</div>


</div>

<br>
<br>

<div class="container  table-responsive">

	<table id="tabla1" class="table  table-hover  table-bordered text-center " style="width: 100%">
		<thead class="text-white bg-primary">
			<tr class="font-weight-bold">

				<th>Código</th>
				<th>Cedula Id</th>
				<th>Apellidos y Nombres</th>
				<th>Nota</th>


			</tr>
		</thead>
		<tbody>


		</tbody>

		<tfoot class="text-white bg-primary">
			<tr class="font-weight-bold">

				<th>Código</th>
				<th>Cedula Id</th>
				<th>Apellidos y Nombres</th>
				<th>Nota</th>

			</tr>
	</table>



</div>






@endsection

{!! Html::script('js/jquery-3.3.1.js') !!}
{!! Html::script('js/jquery.dataTables.min.js') !!}



<script type="text/javascript">
	$(document).ready(function() {


		$("#consultar").on("click", function(e) {
			e.preventDefault();


$("#tabla1").dataTable().fnDestroy();


 var seccion = document.getElementById("seccion").value;
  var anoest = document.getElementById("anoest").value;



/*  LLENAR DATATABLE*/
		t=	$("#tabla1").DataTable({



				scrollY: "400px",
				scrollX: true,
				scrollCollapse: true,
				pageLength: 35,
				paging: false,
				order: false,
				bFilter: false,
				info: false,

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
          url: "/calificaciones_consulta",
          type: "get",
           data:{
             anoest:anoest,
             seccion:seccion //<!-----
            }

        },





				 //ajax: "/calificaciones_consulta",


				columns: [

					{
						data: "id_ingreso",
						name: "id_ingreso"
					},
					{
						data: "cedulaest",
						name: "cedulaest"
					},
					{
						data: null,
						render: function(data, type, full) {
							return full["apellidosest"] + ", " + full["nombresest"];
						}
					},


					{
						data: "nota",
						name: "nota"
					},


				]


			});



/*  LLENAR DATATABLE*/





		});





	});
</script>