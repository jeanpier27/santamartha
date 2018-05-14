$(document).ready(function(){
	$('#frm_categoria').submit(function(e){
		e.preventDefault();
		// alert('kj');
		var categoria=$('#new_categoria').val();
		var boton=$('#guardar_c');

		// $.post('ingresar.php',{usuario:usuario,contra:contra},function(data,status){
		// 	console.log(data+' '+status);
		// });

		$.ajax({
		                url: "./new_categoria.php",
		                type: "POST",
		                data: {
		                  categoria: categoria
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

		                    $('#message_categoria').html("<div class='alert alert-danger'>");
		                    $('#message_categoria > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                      .append("</button>");
		                    $('#message_categoria > .alert-danger')
		                      .append("<strong>Lo sentimo error al guardar :( intenta de nuevo!</strong>");
		                    $('#message_categoria > .alert-danger')
		                      .append('</div>');
		                    // clear all fields
		                    // $('#frm_categoria').trigger("reset");
		                    // limpiar_msg_registro();
		                  }
		                  else{
		                    $('#message_categoria').html("<div class='alert alert-success'>");
		                    $('#message_categoria > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                      .append("</button>");
		                    $('#message_categoria > .alert-success').append($("<strong>").text("Ok registro grabado con exito :)"));
		                    $('#message_categoria > .alert-success').append('</div>');
		                    //clear all fields
		                    $('#frm_categoria').trigger("reset");
		                    // location.href='dashboard.php';
		                  }
		                },
		                error: function() {
		                  // Fail message
		                  $('#message_categoria').html("<div class='alert alert-danger'>");
		                  $('#message_categoria > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                    .append("</button>");
		                  $('#message_categoria > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
		                  $('#message_categoria > .alert-danger').append('</div>');
		                  // //clear all fields
		                  $('#frm_categoria').trigger("reset");
		                  // $('#contactForm').trigger("reset");
		                  // limpiar_msg_registro();
		                },
		                complete: function() {
		                  // limpiar_msg_registro();
		                   
		                    // $('#registro').trigger("reset");
		                  setTimeout(function() {
		                    // $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
		                    $('#message_categoria').empty();
		                  }, 7000);
			                  $('#frm_categoria').trigger("reset");
			                  boton.html("Guardar");
		                      boton.removeClass("btn-warning");
		                      boton.addClass("btn-success");  
		                      boton.removeAttr("disabled");
		                     
		                }
		          	});
	});
});