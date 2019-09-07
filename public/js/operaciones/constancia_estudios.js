jQuery(document).ready(function() {
  jQuery("#cedulaest").focusout(function(e) {
    e.preventDefault();

    var cedulaest = document.getElementById("cedulaest").value;

    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content")
      }
    });
    jQuery.ajax({
      url: "/ingresos/constancia_estudios_proceso",
      method: "post",
      data: {
        cedulaest: cedulaest
      },
      success: function(data) {
        console.log(data);

        $("#apellidosest").val(data.apellidosest);
        $("#nombresest").val(data.nombresest);
        $("#sexoest").val(data.sexoest);
        $("#anoest").val(data.anoest);
        $("#seccion").val(data.seccion);
      }
    });
  });

  /* para enviar informacion */

  /**************************** */
});

$("#ce").on("click", function(e) {
  e.preventDefault();

  var cedulaest = document.getElementById("cedulaest").value;
  var apellidosest = document.getElementById("apellidosest").value;

  if (cedulaest == "") {
    alert("Introduzca una cedula");
    return false;
  }

  if (apellidosest == "") {
    alert("Hay algunos datos Vacio, vuelva a realizar la consulta");
    return false;
  }

  /* pasaremos la ruta a traves de get con la variable cedulaest  */

  var base = "/reportes/constancia_estudio"; // el / principal es la salida de ruta de la carpeta js
  var url = base + "/" + cedulaest;

  window.location.href = url;

  //  window.location.replace(url);
});

$("#autenticacion").on("click", function(e) {
  e.preventDefault();

  //var cedulaest = document.getElementById("cedulaest").value;

  alert("Aún este modulo no esta realizado...Paciencia");
});
