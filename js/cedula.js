$('#cedula').focusout(function(){
	var cedula=$(this).val();

	function limpiar_msg_cedula(){
		setTimeout(function() {
				$('#message_cedula').html("");
							
	      }, 4000);
	}
                        
                        if (cedula!=""){
                            
                            var a=[10];
                            var b=[10];
                            var total=0;
                            for(var i=0;i<10;i++){
                                a[i]=cedula.charAt(i);
                                if((i%2)==1){
                                  b[i]=a[i];

                                  }else{
                                      if((a[i]*2)>=10){
                                        b[i]=(a[i]*2)-9;
                                        }else{
                                            b[i]=a[i]*2;
                                        }
                                  }

                              }

	                        for(var i=0;i<9;i++){
	                            total=parseInt(b[i])+parseInt(total);
	                        }
	                        var verificar=10-(total%10);

	                        if(verificar==a[9] || verificar==10){
	                            // console.log('ok');
	                            $.ajax({
	                            	url: "./cedula.php",
							        type: "POST",
							        data: {
							          cedula: cedula
							        },
							        // cache: false,
							        success: function(data) {
							          // Success message
							          console.log(data);
							          if (data==='no'){

							            $('#message_cedula').html("<div class='alert alert-warning'>");
							            $('#message_cedula > .alert-warning').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							              .append("</button>");
							            $('#message_cedula > .alert-warning')
							              .append("<strong>Ya se encuentra registrado gracias por preferirnos :) </strong>");
							            $('#message_cedula > .alert-warning')
							              .append('</div>');
							            // clear all fields
							            $('#registro').trigger("reset");
							            limpiar_msg_cedula();
							          }
							          else{
							            $('#message_cedula').html("<div class='alert alert-success'>");
							            $('#message_cedula > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							              .append("</button>");
							            $('#message_cedula > .alert-success').append($("<strong>").text("Cedula valida."));
							            $('#message_cedula > .alert-success').append('</div>');
							            //clear all fields
							            limpiar_msg_cedula();
							          }
							        },
							        error: function() {
							          // Fail message
							          $('#message_cedula').html("<div class='alert alert-danger'>");
							          $('#message_cedula > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
							            .append("</button>");
							          $('#message_cedula > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
							          $('#message_cedula > .alert-danger').append('</div>');
							          //clear all fields
							          // $('#contactForm').trigger("reset");
							        },
							        complete: function() {
							          // setTimeout(function() {
							          //   $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
							          // }, 1000);
							        }
	                            });
	                        }else{
	                        	console.log('error');
	                        	$('#registro').trigger("reset");
	                        	
	                        	$('#message_cedula').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>error!</strong> Cedula invalida.  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
	                        	limpiar_msg_cedula();
	                        }
	                    }else{
	                    	console.log('error');
	                    }
});

 $(".numero").keypress(function(e){
                    var key = window.Event ? e.which : e.keyCode 
                    return ((key >= 48 && key <= 57) || (key==8) || (key==0)) 
                });

 // $(".numero").keypress(function (key) {
 //                    window.console.log(key.charCode)
 //            // if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
 //            //     && (key.charCode < 65 || key.charCode > 90) //letras minusculas
 //            //     && (key.charCode != 45) //retroceso
 //            //     && (key.charCode != 241) //ñ
 //            //      && (key.charCode != 209) //Ñ
 //            //      && (key.charCode != 32) //espacio
 //            //      // && (key.charCode != 225) //á
 //            //      // && (key.charCode != 233) //é
 //            //      // && (key.charCode != 237) //í
 //            //      // && (key.charCode != 243) //ó
 //            //      // && (key.charCode != 250) //Ú   0928493659
 //            //      // && (key.charCode != 193) //Á
 //            //      // && (key.charCode != 201) //É
 //            //      // && (key.charCode != 205) //Í
 //            //      // && (key.charCode != 211) //Ó
 //            //      // && (key.charCode != 218) //Ú

 //            //      )
 //            //     return false;
 //        });