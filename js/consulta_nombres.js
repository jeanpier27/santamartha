$(document).ready(function(){
	$('#cedula_agendar').focusout(function(){
		// $('#nombres_agendar').val('Esperando...');
		var cedula=$('#cedula_agendar').val();
		$('#fecha_agendar').attr("disabled",true);
		if(cedula!=''){
				$.ajax({
		                url: "./consulta_nombres.php",
		                type: "POST",
		                data: {
		                  cedula: cedula
		                },
		                // cache: false,
		                beforeSend: function(){
		                    // setTimeout(function() {
		                      // boton.html("Procesando...");
		                      // boton.removeClass("btn-success");
		                      // boton.addClass("btn-warning");  
		                      // boton.attr("disabled",true);                             
		                      // }, 500);
		                  },
		                success: function(data) {
		                  // Success message
		                  // console.log(data);
		                  if (data==='no'){

		                    $('#message_agendar').html("<div class='alert alert-danger'>");
		                    $('#message_agendar > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                      .append("</button>");
		                    $('#message_agendar > .alert-danger')
		                      .append("<strong>Lo sentimos :( Tienes que registrarte primero para poder agendar!</strong>");
		                    $('#message_agendar > .alert-danger')
		                      .append('</div>');
		                    // // clear all fields
		                    // $('#registro').trigger("reset");
		                    // limpiar_msg_registro();
		                    // $('#nombres_agendar').val('tiene que registrarse primero');
		                    $('#cedula_agendar').val('');		                    
		                     $('#aceptar_agenda').attr("disabled",true);
		                     $('#fecha_agendar').attr("disabled",true);
		                     $('#nombres_agendar').val('Esperando...');

		                  }
		                  else{
		                    // $('#success1').html("<div class='alert alert-success'>");
		                    // $('#success1 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                    //   .append("</button>");
		                    // $('#success1 > .alert-success').append($("<strong>").text("Ok registro grabado con exito :)"));
		                    // $('#success1 > .alert-success').append('</div>');
		                    // //clear all fields
		                    // $('#registro').trigger("reset");
		                    // limpiar_msg_registro();
		                     $('#nombres_agendar').val(data);
		                     $('#fecha_agendar').removeAttr("disabled");

		                     $.ajax({
		                     	url: "./fecha.php",
				                success: function(data){
				                	// console.log(data);
				                	$('#fecha_agendar').html(data);
				                }

		                     });
		                  }
		                },
		                error: function() {
		                  // Fail message
		                  $('#message_agendar').html("<div class='alert alert-danger'>");
		                  $('#message_agendar > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                    .append("</button>");
		                  $('#message_agendar > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
		                  $('#message_agendar > .alert-danger').append('</div>');
		                  // //clear all fields
		                  // $('#registro').trigger("reset");
		                  // $('#contactForm').trigger("reset");
		                  // limpiar_msg_registro();
		                },
		                complete: function() {
		                  // limpiar_msg_registro();
		                   
		                    // $('#registro').trigger("reset");
		                  setTimeout(function() {
		                    // $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
		                    $('#message_agendar').empty();
		                  }, 5000);
		                }
		          	});
		}else{
			$('#fecha_agendar').empty();
		}
	});
});