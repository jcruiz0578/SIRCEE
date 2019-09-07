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

                var validar = data.validar;

                if (validar === "NO") {
                    alert("No se encontraron registro con esa cedula");
                    document.getElementById("ce1").style.display = "none";
                    document.getElementById("autenticacion1").style.display =
                        "none";
                    document.getElementById("cedulaest").focus();
                } else {
                    document.getElementById("ce1").style.display = "block";
                    document.getElementById("autenticacion1").style.display =
                        "block";

                    $("#apellidosest").val(data.apellidosest);
                    $("#nombresest").val(data.nombresest);
                    $("#sexoest").val(data.sexoest);
                    $("#anoest").val(data.anoest);
                    $("#seccion").val(data.seccion);
                    $("#status").val(data.status);

                    document.getElementById("cedulaest").disabled = true;
                    document.getElementById("apellidosest").disabled = true;
                    document.getElementById("nombresest").disabled = true;
                    document.getElementById("sexoest").disabled = true;
                    document.getElementById("anoest").disabled = true;
                    document.getElementById("seccion").disabled = true;
                    document.getElementById("status").disabled = true;
                }
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
    var status = document.getElementById("status").value;

    if (cedulaest == "") {
        alert("Introduzca una cedula");
        document.getElementById("cedulaest").focus();
        return false;
    }

    if (apellidosest == "") {
        alert("Hay algunos datos Vacio, vuelva a realizar la consulta");
        return false;
    }

    if (status == "E") {
        alert(
            "Estudiante fue Egresado, El personal directivo que gestione la realizacion de otro documento "
        );

        document.getElementById("cedulaest").focus();
        return false;
    }

    document.getElementById("cedulaest").disabled = false;
    document.getElementById("apellidosest").disabled = false;
    document.getElementById("nombresest").disabled = false;
    document.getElementById("sexoest").disabled = false;
    document.getElementById("anoest").disabled = false;
    document.getElementById("seccion").disabled = false;
    document.getElementById("status").disabled = false;

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

$("#reset").on("click", function() {
    document.getElementById("cedulaest").disabled = false;
    document.getElementById("apellidosest").disabled = false;
    document.getElementById("nombresest").disabled = false;
    document.getElementById("sexoest").disabled = false;
    document.getElementById("anoest").disabled = false;
    document.getElementById("seccion").disabled = false;
    document.getElementById("status").disabled = false;

    document.getElementById("ce1").style.display = "none";
    document.getElementById("autenticacion1").style.display = "none";
});
