jQuery(document).ready(function(){
    jQuery('#edad').focusin(function(e){
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       jQuery.ajax({
         method: 'post',
         //url: "{{ route('calculo_edad')}}",   // asi cuando esta en archivo blade
         url: '/calculo_edad',
         
          data: {
             fnest: $('#fnest').val()
          },
          success: function(data) {
             console.log(data);
             $("#edad").val(data.edad);
          }});
       });
    });