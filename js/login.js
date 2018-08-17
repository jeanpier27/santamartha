$(document).ready(function(){
	$('#formulario').submit(function(e){
		e.preventDefault();
		// alert('kj');
		var usuario=$('#usua').val();
		var contra=$('#contra').val();
		var boton=$('#ingresar');

		// $.post('ingresar.php',{usuario:usuario,contra:contra},function(data,status){
		// 	console.log(data+' '+status);
		// });

		$.ajax({
		                url: "./ingresar.php",
		                type: "POST",
		                data: {
		                  usuario: usuario,
		                  contra: contra
		                },
		                // cache: false,
		                beforeSend: function(){
		                      boton.html("Procesando...");
		                      boton.removeClass("btn-success");
		                      boton.addClass("btn-warning");  
		                      boton.attr("disabled",true);           
		                  },
		                success: function(data) {
		                  // Success message
		                  console.log(data);
		                  if (data==='error'){

		                    $('#message').html("<div class='alert alert-danger'>");
		                    $('#message > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                      .append("</button>");
		                    $('#message > .alert-danger')
		                      .append("<strong>Usuario o contraseña incorrecta :( intenta de nuevo!</strong>");
		                    $('#message > .alert-danger')
		                      .append('</div>');
		                    // clear all fields
		                    $('#formulario').trigger("reset");
		                    // limpiar_msg_registro();
		                  }
		                  else{
		                    // $('#message').html("<div class='alert alert-success'>");
		                    // $('#message > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                    //   .append("</button>");
		                    // $('#message > .alert-success').append($("<strong>").text("Ok registro grabado con exito :)"));
		                    // $('#message > .alert-success').append('</div>');
		                    // //clear all fields
												// $('#formulario').trigger("reset");
												boton.html("Procesando...");
												boton.removeClass("btn-success");
												boton.addClass("btn-warning");  
												boton.attr("disabled",true); 
		                    location.href='dashboard.php';
		                  }
		                },
		                error: function() {
		                  // Fail message
		                  $('#message').html("<div class='alert alert-danger'>");
		                  $('#message > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                    .append("</button>");
		                  $('#message > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
		                  $('#message > .alert-danger').append('</div>');
		                  // //clear all fields
		                  $('#formulario').trigger("reset");
		                  // $('#contactForm').trigger("reset");
		                  // limpiar_msg_registro();
		                },
		                complete: function() {
		                  // limpiar_msg_registro();
		                   
		                    // $('#registro').trigger("reset");
		                  setTimeout(function() {
		                    // $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
		                    $('#message').empty();
		                  }, 7000);
			                  $('#formulario').trigger("reset");
			                  boton.html("Ingresar");
		                      boton.removeClass("btn-warning");
		                      boton.addClass("btn-success");  
		                      boton.removeAttr("disabled");
		                     
		                }
		          	});
	});
});