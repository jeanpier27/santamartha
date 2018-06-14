$(document).ready(function(){
	$('#guardar_compras').submit(function(e){
		e.preventDefault();
		// alert('kj');
		// var categoria=$('#new_categoria').val();
		var boton=$('#guardar_t');
		var campos= $(this).serialize();
		

		$.ajax({
		                url: "./guardar_ventas.php",
		                type: "POST",
		                // data: {
		                //   categoria: categoria
		                // },
		                data:campos,
		                // contentType y processData poner en false para enviar archivos al servidor
		                // contentType:false,
		                // processData:false,
		                // cache: false,
		                beforeSend: function(){
		                      boton.html("Procesando...");
		                      boton.removeClass("btn-success");
		                      boton.addClass("btn-warning");  
		                      boton.attr("disabled",true);           
		                  },
		                success: function(data) {
		                  // Success message
		                  // console.log(parseInt(data));
		                  if(data==='rep'){
		                  	swal({
							  position: 'center',
							  type: 'warning',
							  title: 'Ya se encuentra registrada esta factura',
							  showConfirmButton: false,
							  timer: 3500
							})
		                  }
		                  if(data==='error'){
		                  	swal({
							  position: 'center',
							  type: 'error',
							  title: 'Ah ocurrido un error intente de nuevo :(',
							  showConfirmButton: false,
							  timer: 3500
							})
		                  }
		                  if(parseInt(data)>0){
		                  	swal({
							  title: 'Ok?',
							  text: "Registro grabado con exito :)",
							  type: 'success',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  // cancelButtonColor: '#d33',
							  showCancelButton: false,
							  confirmButtonText: 'Aceptar',
							  allowOutsideClick:false,
							}).then((result) => {
							  if (result.value) {
							  	window.open('factura.php?id_fact='+data+'', '_blank');
							    location.href = 'ventas.php';
							  }
							})
		                  }
		                  // if (data==='error'){

		                  //   $('#message_producto').html("<div class='alert alert-danger'>");
		                  //   $('#message_producto > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                  //     .append("</button>");
		                  //   $('#message_producto > .alert-danger')
		                  //     .append("<strong>Lo sentimo error al guardar :( intenta de nuevo!</strong>");
		                  //   $('#message_producto > .alert-danger')
		                  //     .append('</div>');
		                  //   // clear all fields
		                  //   // $('#frm_categoria').trigger("reset");
		                  //   // limpiar_msg_registro();
		                  // }
		                  // else{
		                  //   $('#message_producto').html("<div class='alert alert-success'>");
		                  //   $('#message_producto > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                  //     .append("</button>");
		                  //   $('#message_producto > .alert-success').append($("<strong>").text("Ok registro grabado con exito :)"));
		                  //   $('#message_producto > .alert-success').append('</div>');
		                  //   //clear all fields
		                  //   $('#frm_producto').trigger("reset");
		                  //   // location.href='dashboard.php';
		                  // }
		                },
		                error: function(data) {
		                	// console.log(data);
		                  // Fail message
		                  // $('#message_producto').html("<div class='alert alert-danger'>");
		                  // $('#message_producto > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
		                  //   .append("</button>");
		                  // $('#message_producto > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
		                  // $('#message_producto > .alert-danger').append('</div>');
		                  // // //clear all fields
		                  // $('#frm_producto').trigger("reset");
		                  // $('#contactForm').trigger("reset");
		                  // limpiar_msg_registro();
		                  swal({
							  position: 'center',
							  type: 'error',
							  title: 'Ah ocurrido un error intente de nuevo :(',
							  showConfirmButton: false,
							  timer: 3500
							})

		                },
		                complete: function() {
		                  // limpiar_msg_registro();
		                   
		                    // $('#registro').trigger("reset");
		                  // setTimeout(function() {
		                  //   // $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
		                  //   $('#message_producto').empty();
		                  // }, 7000);
			                  $('#frm_producto').trigger("reset");
			                  boton.html("Guardar");
		                      boton.removeClass("btn-warning");
		                      boton.addClass("btn-success");  
		                      boton.removeAttr("disabled");
		                     
		                }
		          	});
	});
});