/* convertir tabla en elemto de datatable */

$(document).ready(function() {
  $("#tabla_operaciones").DataTable({
    scrollCollapse: true,
    paging: false,
    order: false,
    bFilter: false,
    info: false,

    processing: true,

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
    }
  });
});

/************************************************** */

/*operacion de llenar los elementos de la ventana modal */

$(document).on("click", ".egreso-modal", function(e) {
  $(".modal-title").text("Proceso de Egreso");
  $("#id_E").val($(this).data("id"));
  $("#periodoescolar").val($(this).data("periodoescolar"));
  $("#cedulaE").val($(this).data("cedula"));
  $("#estudianteE").val($(this).data("estudiante"));
  $("#anoestE").val($(this).data("anoest"));
  $("#fechaI").val($(this).data("fecha_ingreso"));
  //$("#fechaE").val($(this).data("fecha_egreso"));

  var id = $("#id_E").prop("value");
  $("#egreso_modal").modal("show");
});

/*********************************************************** */

/* operacion de envios de datos para la operacion egreso */

$("#egresar").on("click", function(e) {
  e.preventDefault();

  var id_est = document.getElementById("id_E").value;
  var periodoescolar = document.getElementById("periodoescolar").value;
  var cedulaE = document.getElementById("cedulaE").value;
  var fechaE = document.getElementById("fechaE").value;
  var razon = document.getElementById("razon").value;

  /*  var mes_egreso = "SEPTIEMBRE";
  var fechasistema = "2019-09-02";  */
  var periodo_egreso = "INICIAL";

  if (fechaE == "") {
    alert("Debe Introducir una fecha de Egreso");
    document.getElementById("fechaE").focus();
    return false;
  }

  if (razon == "N/A") {
    alert("Introducir Razón del Egreso");
    document.getElementById("razon").focus();
    return false;
  }

  if (!confirm("Desea EGRESAR este estudiante..? ")) {
    return false;
  }

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content")
    }
  });
  jQuery.ajax({
    url: "/modal/egreso",

    method: "post",
    data: {
      id_ingreso: id_est,
      periodoescolar: periodoescolar,
      cedulaest: cedulaE,
      fecha_egreso: fechaE,
      /*  mes_egreso: mes_egreso, */
      /*  fechasistema: fechasistema, */
      periodo_egreso: periodo_egreso,
      observacion: razon
    },
    success: function(data) {
      console.log(data);
    }
  });

  alert("Se Ha EGRESADO satisfactoriamente");

  location.reload();

  /*  self.table.ajax.reload(); */
});
