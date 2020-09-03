
		$(document).ready(function() {
			$("#consultar").on("click", function(e) {
				e.preventDefault();
				$("#tabla1").dataTable().fnDestroy();
				var seccion = document.getElementById("seccion").value;
				var anoest = document.getElementById("anoest").value;
				var lapso = document.getElementById("lapso").value;
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
					url: "/calificaciones_consulta_notas",
					type: "get",
					data:{
						anoest:anoest,
             seccion:seccion,
			 lapso:lapso
		 },
		 
	/*  success: function (data) {
						console.log(data);
						alert(data.data[0].castellano);
					}  */

     },

				
	 		
				 columnDefs: [
				 { width: 30, targets: 0 },
				 { width: 230, targets: 1 },
				 {width: 200, targets: 2 },
				 
				 { width: 30, targets: 4 },//  , render: $.fn.dataTable.render.number(',', '.', 0) },
				 { width: 30, targets: 5 },
				 { width: 30, targets: 6 },
				 { width: 30, targets: 7 },
				 { width: 30, targets: 8  },
				 { width: 30, targets: 9 },
				 { width: 30, targets: 10 },
				 {"searchable": false, "orderable": false, "targets": 0 }
				 ],

				 

columns: [
{
	data: null, // para poder validar la numeracion
},
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
	data: "castellano",
	name: "castellano"
},

{
	data: "ingles",
	name: "ingles"
},

{
	data: "matematica",
	name: "Matematica"
},


{
	data: "ed_fisica", 
	name: "ed_fisica"
},


{
	data: "art_patrimonio", 
	name: "art_patrimonio",
	//render: $.fn.dataTable.render.number(",", ".", 2)

	
},

{
	data: "cs_naturales", 
	name: "cs_naturales"

},

{
	data: "fisica", 
	name: "fisica"
},

{
	data: "quimica", 
	name: "quimica"
},

{
	data: "biologia", 
	name: "biologia"
},

{
	data: "cs_tierra", 
	name: "cs_tierra"
},

{
	data: "ghc", 
	name: "ghc"
},

{
	data: "fsn", 
	name: "fsn"
},

{
	data: "orientacion", 
	name: "orientacion"
},

{
	data: "gcrp", 
	name: "gcrp"
},


],


//  coloca las celdas de color con alguna condicion
	"fnRowCallback": function( nRow, myInfraArray)
{
$(nRow).children().each(function(index, td, myInfraArray) {
if ($(td).html() < 10) {
$(td).css("background-color", "#F08080");
}
     
});
},




});

// ocultar columnas de areas  dependiendo el año

if(anoest=="1ER AÑO" || anoest=='2DO AÑO') {
		t.column(10).visible(false);
		t.column(11).visible(false);
		t.column(12).visible(false);
		t.column(13).visible(false);
		t.column(15).visible(false);
	
}

if(anoest=="3ER AÑO") {
	t.column(8).visible(false);
		t.column(9).visible(false);
		t.column(13).visible(false);
		t.column(15).visible(false);
	
}

if(anoest=="4TO AÑO CS") {
	t.column(8).visible(false);
		t.column(9).visible(false);
		t.column(13).visible(false);
		
	
}
if(anoest=="5TO AÑO CS") {
	t.column(8).visible(false);
		t.column(9).visible(false);
		
		
	
}




//"aoColumnDefs": [{ "bVisible": false, "aTargets": [10] }],




// para la numeracion

t.on( 'order.dt search.dt', 
function () { 
	t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) { cell.innerHTML = i+1; } ); } ).draw();

    /*  LLENAR DATATABLE*/
});




/***********CALCULAR Y REGISTRAR DEFINITIVA*******************/
			$("#procesar").on("click", function (e) {
				e.preventDefault();
				if (!confirm("Desea Calcular Definitiva de esta sección..?.. Esto Tardara un poco ")) {
					return false;
				}
				var id_ingreso = $("input[name='id_ingreso[]']").map(function () {
					return this.value;
				}).get();
/* 
				var nota = $("input[name='nota[]']").map(function () {
					return this.value;
				}).get(); */


 
 var lapso = document.getElementById("lapso").value;
 var anoest = document.getElementById("anoest").value;
 var seccion = document.getElementById("seccion").value;
 //var materias = document.getElementById("materias").value;
 
   $.ajaxSetup({
   	headers: {
   		"X-CSRF-TOKEN": $('meta[name="_token"]').attr("content")
   	}
   });
   jQuery.ajax({
	   url: "/calificacion/definitiva3",
   //	 url: "{{ route('calificaciones.registrar')}}",
   	method: "post",
   	data: {
   		id_ingreso: id_ingreso,
   		lapso: lapso,
   		anoest:anoest,
   		seccion: seccion,
   		
   	},
   	success: function (data) {
		   console.log(data);
			  alert("Se terminado el proceso de calculo de Nota Definitiva");
   	}
   });
   //alert("Se terminado el proceso de calculo de Nota Definitiva");
  // $("#tabla1").DataTable().ajax.reload();
});
			/****************************************/
		});



	

	
           
     

