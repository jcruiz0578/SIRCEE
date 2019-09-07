$(document).on("click", ".cedula-modal", function (e) {
  $(".modal-title").text("Modificar Cédula");
  $("#id_mod").val($(this).data("id"));
  $("#cedulaV_mod").val($(this).data("cedula"));
  $("#cedulaN_mod").val("");
  id = $("#id_mod").val();
  $("#cedulaModal").modal("show");
});

$(".modal-footer").on("click", ".modi_ced", function (e) {
  e.preventDefault();

  var id_est = document.getElementById("id_mod").value;
  var cedulaV_mod = document.getElementById("cedulaV_mod").value;
  var cedulaN_mod = document.getElementById("cedulaN_mod").value;

  if (cedulaN_mod == "") {
    alert("Debe Introducir la Cédula del Estudiante");
    document.getElementById("cedulaN_mod").focus();
    return false;
  }

  if (!confirm("Desea Procesar estos Datos..? ")) {
    return false;
  }

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content")
    }
  });
  jQuery.ajax({
    url: "/modal/cedula",

    method: "post",
    data: {
      id_est: id_est,
      cedulaV_mod: cedulaV_mod,
      cedulaN_mod: cedulaN_mod
    },
    success: function (data) {
      console.log(data);

      var cedulaModificada = data.cedulaest;
      var id_est = data.id_est;

      alert("La cedula ya fue Mofificada");



      // modifca el valor de un elemento en latabla por su id
      //document.getElementById("cedulaest").innerHTML = cedulaModificada;

      var mensaje = "cedula"; // para el mensaje de la operacion modificada

      //var base = '{{url('ingresos/search_individual')}}';
      var base = "/ingresos/search_individual"; // el / principal es la salida de ruta de la carpeta js

      var url = base + "/" + id_est + "/" + cedulaModificada + "/" + mensaje;

      //window.location.href=url;

      window.location.replace(url);
    }
  });
});
