/*nos permite cargar la data de la tabla por medio de ajax*/

$(document).ready(function () {
    $("#tabla1").DataTable({
        scrollY: "400px",
        scrollX: true,
        scrollCollapse: true,
        paging: true,
        pageLength: 35,

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

        ajax: "/ingresos/consultar_secciones",

        columns: [{
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
            {
                data: null,
                render: function (data, type, full) {
                    return full["apellidosest"] + ", " + full["nombresest"];
                }
            },

            {
                data: "sexoest",
                name: "sexoest"
            },
            {
                data: "fnest",
                name: "dnest"
            },
            {
                data: "anoest",
                name: "anoest"
            },
            {
                data: "seccion",
                name: "seccion"
            }
        ]
    });
});

/****************************************************** */

/*se encarga de hacer la operacion de envio del cambio de la seccion */

$("#enviar").on("click", function (e) {
    e.preventDefault();

    var id_est = $("input[name='chck1[]']:checked")
        .map(function () {
            return this.value;
        })
        .get();

    var seccion = document.getElementById("seccion").value;

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content")
        }
    });
    jQuery.ajax({
        url: "/ingresos/asignar_seccion",

        method: "get",
        data: {
            id_est: id_est,
            seccion: seccion
        },
        success: function (data) {
            console.log(data);
        }
    });

    alert("Se Ha intruducido las secciones");

    $("#tabla1")
        .DataTable()
        .ajax.reload();

    document.getElementById("numero").value = 0;
});

/****************************************************** */

/*se encarga del calculo de la suma de los elementos (checkbox) que seleccionamos */

function suma(obj) {
    total = parseInt(document.getElementById("numero").value);
    if (obj.checked) {
        total = parseInt(total + 1);
    } else {
        total = parseInt(total - 1);
    }
    document.getElementById("numero").value = String(total);
}

/*  metodo para construir un elemento html dentro del DATATABLE*/

/* 'columnDefs': [{
 'targets': 3,
 'searchable': false,
 'orderable': false,
 'className': 'dt-body-center',
 'render': function (data, type, full, meta){
 //return '<input type="checkbox" id="chck1[]" name="chck1[]" value="'+ $('<div/>').text(data).html() + '"  onChange="suma(this)" >';
 return '<input type="checkbox" id="chck1[]" name="chck1[]" value=" " onChange="suma(this)">';
 }
 }],
  */
