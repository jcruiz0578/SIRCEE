<!-- section en donde se se desarrollara javascript y ajax y se mostrara en yield de layaot.blade.php -->




<script>
    jQuery(document).ready(function(){
      
      
      $('#trabajo').hide(); // OCULTA EL DIV REFERENTE A LO DEL TRABAJO
      $("#trabajo_sueldo").hide();
      $("#canaima_datos").hide(); // OCULTA EL DIV REFERENTE A LOS DATOS CANAIMA 
      
      
/* activar si el representante trabaja o no */
      var tp = $("#trabaja").prop('value');
    
    if (tp == 'NO') {
    document.getElementById("lugartrabajo").value = "N/A";
    document.getElementById("sueldo").value = "N/A";
    
    $('#trabajo').hide();
    $("#trabajo_sueldo").hide();
    
    } else {
    $('#trabajo').show();
    $("#trabajo_sueldo").show();
   
    }

/* ------------------------------------   */

if ($('#canaima').prop('checked') ) {


$("#canaima_datos").show();
$("#canaima_datos2").show();

} else {
$("#canaima_datos").hide();
$("#canaima_datos2").hide();

document.getElementById("canaima_funciona").value = "N/A";
document.getElementById("serial_canaima").value = "N/A";

}


//**************************************









      
//  ajax inicio  para el llamado del calculo de la edad      
      
      jQuery('#edad').focusin(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });
          jQuery.ajax({
             //url: "{{ url('/grocery/post') }}",
             url: "{{ route('calculo_edad')}}",
             method: 'post',
             data: {
                fnest: $('#fnest').val()
             },
             success: function(data) {
                console.log(data);
                $("#edad").val(data.edad);
             }
            
            });
          });
      
 //  ajax  fin  para el llamado del calculo de la edad          
      

// INICIO AJAX consulta de representantes

jQuery('#cedularep').focusout(function (e) {
    e.preventDefault();
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }
   });
   jQuery.ajax({
    url: "{{ route('representantes_consulta')}}",
    method: 'post',
    data: {
       cedularep: $('#cedularep').val()
    },
    success: function(data) {
        console.log(data);
        $("#apellidosrep").val(data.apellidosrep);
        $("#nombresrep").val(data.nombresrep);
        $("#sexorep").val(data.sexorep);
        $("#parentescorep").val(data.parentescorep);
        $("#telefonosrep").val(data.telefonosrep);
        $("#emailrep").val(data.emailrep);
        $("#trabaja").val(data.trabaja);
    



            var si_trabaja = data.trabaja;
                if (si_trabaja == 'SI') {
                    $("#trabajo").show();
                    $("#trabajo_sueldo").show();
                    $("#lugartrabajo").val(data.lugartrabajo);
                    $("#sueldo").val(data.sueldo);                        
                 }

                if (si_trabaja == 'NO' || si_trabaja=='N/A') {	
                     $("#trabajo").hide();	
                     $("#trabajo_sueldo").hide();
                 }

       
                $("#direccionrep").val(data.direccionrep);

   }

});
});



// FIN AJAX consulta de representantes

         });
</script>




<script>
    function activar_trabajo(){

      var tp = $("#trabaja").prop('value');
   
           if (tp == 'NO') {
               document.getElementById("lugartrabajo").value = "N/A";
               document.getElementById("sueldo").value = "N/A";
   
               $('#trabajo').hide();
               $("#trabajo_sueldo").hide();
   
           } else {
               $('#trabajo').show(); 
               $("#trabajo_sueldo").show();
               document.getElementById("sueldo").value = "N/A";
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
             $("#canaima_datos2").show();
   
       } else {
           $("#canaima_datos").hide();
           $("#canaima_datos2").hide();
   
           document.getElementById("canaima_funciona").value = "N/A";
         document.getElementById("serial_canaima").value = "N/A";
   
       }
   }










</script>