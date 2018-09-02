$(document).ready(function(){
	$('#fecha_agendar').change(function(){
		var fecha=$('#fecha_agendar').val();
		var servicio=$('#servicio').val();
		if(fecha!='no'){
			if(servicio=='Cambio de aceite' || servicio=='Cambio de filtro'){
				$.ajax({
					url: "./hora2.php",
					type: "POST",
					data: {
						fecha: fecha,
						servicio:servicio
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
						console.log(data);
						if(data!=''){
							$('#hora_agendar').html(data);
							$('#aceptar_agenda').removeAttr("disabled");

						}else{
							// $('#c_carro').css('display','none');
							$('#aceptar_agenda').attr("disabled",true);
							$('#hora_agendar').html(data);
						}
						// if (data==='error'){

						//   $('#message_agenda_guardar').html("<div class='alert alert-danger'>");
						//   $('#message_agenda_guardar > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
						//     .append("</button>");
						//   $('#message_agenda_guardar > .alert-danger')
						//     .append("<strong>Lo sentimos :( Tienes que registrarte primero para poder agendar!</strong>");
						//   $('#message_agenda_guardar > .alert-danger')
						//     .append('</div>');
						//   // clear all fields
						//   $('#form_agendar').trigger("reset");
						//   // limpiar_msg_registro();
						// }
						// else{
						//   $('#message_agenda_guardar').html("<div class='alert alert-success'>");
						//   $('#message_agenda_guardar > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
						//     .append("</button>");
						//   $('#message_agenda_guardar > .alert-success').append($("<strong>").text("Ok registro grabado con exito :)"));
						//   $('#message_agenda_guardar > .alert-success').append('</div>');
						//   //clear all fields
						//   $('#form_agendar').trigger("reset");
						//   // limpiar_msg_registro();
						//    // $('#nombres_agendar').val(data);
						//    // $('#aceptar_agenda').removeAttr("disabled");
						// }
					},
					error: function() {
						// Fail message
						// $('#message_agenda_guardar').html("<div class='alert alert-danger'>");
						// $('#message_agenda_guardar > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
						//   .append("</button>");
						// $('#message_agenda_guardar > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
						// $('#message_agenda_guardar > .alert-danger').append('</div>');
						// // //clear all fields
						// $('#form_agendar').trigger("reset");
						// $('#contactForm').trigger("reset");
						// limpiar_msg_registro();
					},
					complete: function() {
						// limpiar_msg_registro();
						 
							// $('#registro').trigger("reset");
						// setTimeout(function() {
						//   // $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
						//   $('#message_agenda_guardar').empty();
						// }, 7000);
						 //  boton.html("Aceptar");
						//     boton.removeClass("btn-warning");
						//     boton.addClass("btn-success");  
						//     boton.attr("disabled",true);
					}
			});
			}else{
			$.ajax({
		                url: "./hora.php",
		                type: "POST",
		                data: {
		                  fecha: fecha
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
		                  console.log(data);
		                  if(data!=''){
			                  $('#hora_agendar').html(data);
			                  $('#aceptar_agenda').removeAttr("disabled");

		                  }else{
		                  	// $('#c_carro').css('display','none');
		                  	$('#aceptar_agenda').attr("disabled",true);
		                  	$('#hora_agendar').html(data);
		                  }
		                  // if (data==='error'){

		                  //   $('#message_agenda_guardar').html("<div class='alert alert-danger'>");
		                  //   $('#message_agenda_guardar > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                  //     .append("</button>");
		                  //   $('#message_agenda_guardar > .alert-danger')
		                  //     .append("<strong>Lo sentimos :( Tienes que registrarte primero para poder agendar!</strong>");
		                  //   $('#message_agenda_guardar > .alert-danger')
		                  //     .append('</div>');
		                  //   // clear all fields
		                  //   $('#form_agendar').trigger("reset");
		                  //   // limpiar_msg_registro();
		                  // }
		                  // else{
		                  //   $('#message_agenda_guardar').html("<div class='alert alert-success'>");
		                  //   $('#message_agenda_guardar > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                  //     .append("</button>");
		                  //   $('#message_agenda_guardar > .alert-success').append($("<strong>").text("Ok registro grabado con exito :)"));
		                  //   $('#message_agenda_guardar > .alert-success').append('</div>');
		                  //   //clear all fields
		                  //   $('#form_agendar').trigger("reset");
		                  //   // limpiar_msg_registro();
		                  //    // $('#nombres_agendar').val(data);
		                  //    // $('#aceptar_agenda').removeAttr("disabled");
		                  // }
		                },
		                error: function() {
		                  // Fail message
		                  // $('#message_agenda_guardar').html("<div class='alert alert-danger'>");
		                  // $('#message_agenda_guardar > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                  //   .append("</button>");
		                  // $('#message_agenda_guardar > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
		                  // $('#message_agenda_guardar > .alert-danger').append('</div>');
		                  // // //clear all fields
		                  // $('#form_agendar').trigger("reset");
		                  // $('#contactForm').trigger("reset");
		                  // limpiar_msg_registro();
		                },
		                complete: function() {
		                  // limpiar_msg_registro();
		                   
		                    // $('#registro').trigger("reset");
		                  // setTimeout(function() {
		                  //   // $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
		                  //   $('#message_agenda_guardar').empty();
		                  // }, 7000);
			                 //  boton.html("Aceptar");
		                  //     boton.removeClass("btn-warning");
		                  //     boton.addClass("btn-success");  
		                  //     boton.attr("disabled",true);
		                }
								});
			}
		}else{
			$('#hora_agendar').empty();
			$('#aceptar_agenda').attr("disabled",true);
		}
	});

	$('#hora_agendar').change(function(){
		// $('#aceptar_agenda').removeAttr("disabled");
	});
});