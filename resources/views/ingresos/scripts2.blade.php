 <!-- section en donde se se desarrollara javascript y ajax y se mostrara en yield de layaot.blade.php -->
	 

<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type = "text/javascript">

 
$(document).ready(function () {

    $('#trabajo').hide(); // OCULTA EL DIV REFERENTE A LO DEL TRABAJO
    $("#canaima_datos").hide(); // OCULTA EL DIV REFERENTE A LOS DATOS CANAIMA

   
    // calcular la edad
    $("#edad").focusin(function (e) {
        e.preventDefault(); 
       
        $.ajax({
            
            url: "{{ route('calculo_edad')}}",
            dataType: "json",
            method: "post",

            data: {
                fnest: $('#fnest').val()
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },


           
        })
            .done(function (data) {
                console.log(data);
                $("#edad").val(data.edad);

            });
	});


 if ($('#canaima').prop('checked') ) {

       $("#canaima_datos").show();

    } 





var tp = $("#trabaja").prop('value');
	if (tp == "SI") {
	
	$("#trabajo").show();

	}


});

  
function activar_trabajo(){

	var tp = $("#trabaja").prop('value');

        if (tp == 'NO') {
            document.getElementById("lugartrabajo").value = "N/A";
            document.getElementById("sueldo").value = "N/A";

            $('#trabajo').hide();

        } else {
            $('#trabajo').show(); 
            document.getElementById("sueldo").value = "";
        }

 
	}

function activar_direccion() {
    // validar la direccion del representante
    var dire = $("#direccionest").prop('value');

    if (radioDireccionSI.checked) {
        document.getElementById("direccionrep").value = dire;
    }

    if (radioDireccionNO.checked) {
        document.getElementById("direccionrep").value = "";


    }
}


function activar_canaima() {
    // activa o desactiva lo referente al los datos de la canaima


 if ($('#canaima').prop('checked') ) {

         
          $("#canaima_datos").show();

    } else {
        $("#canaima_datos").hide();

        document.getElementById("canaima_funciona").value = "N/A";
		document.getElementById("serial_canaima").value = "N/A";

    }
}

 </script>

 





		