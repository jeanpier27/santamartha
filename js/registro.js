$(document).ready(function(){
  $('#registro').submit(function(e){
    e.preventDefault();
    var cedula=$('#cedula').val();
    var nombre=$('#nombreregistro').val();
    var apellido=$('#apellidoregistro').val();
    var direccion=$('#direccionregistro').val();
    var telefono=$('#telefonoregistro').val();
    var email=$('#mailregistro').val();
    var boton=$('#enviarregistro');
    // function limpiar_msg_registro(){
    //           $('#enviarregistro').html("Enviar");
    //           $('#enviarregistro').removeClass("btn-warning");
    //           $('#enviarregistro').addClass("btn-success");  
    //           $('#enviarregistro').removeAttr("disabled");
    
    // }
    $.ajax({
                url: "./registro.php",
                type: "POST",
                data: {
                  cedula: cedula,
                  nombre:nombre,
                  apellido:apellido,
                  direccion:direccion,
                  telefono:telefono,
                  email:email
                },
                // cache: false,
                beforeSend: function(){
                    // setTimeout(function() {
                      boton.html("Procesando...");
                      boton.removeClass("btn-success");
                      boton.addClass("btn-warning");  
                      boton.attr("disabled",true);                             
                      // }, 500);
                  },
                success: function(data) {
                  // Success message
                  // console.log(data);
                  if (data==='error'){

                    $('#success1').html("<div class='alert alert-danger'>");
                    $('#success1 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                      .append("</button>");
                    $('#success1 > .alert-danger')
                      .append("<strong>Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!</strong>");
                    $('#success1 > .alert-danger')
                      .append('</div>');
                    // clear all fields
                    $('#registro').trigger("reset");
                    // limpiar_msg_registro();
                  }
                  else{
                    $('#success1').html("<div class='alert alert-success'>");
                    $('#success1 > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                      .append("</button>");
                    $('#success1 > .alert-success').append($("<strong>").text("Ok registro grabado con exito :)"));
                    $('#success1 > .alert-success').append('</div>');
                    //clear all fields
                    $('#registro').trigger("reset");
                    // limpiar_msg_registro();
                  }
                },
                error: function() {
                  // Fail message
                  $('#success1').html("<div class='alert alert-danger'>");
                  $('#success1 > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                  $('#success1 > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
                  $('#success1 > .alert-danger').append('</div>');
                  //clear all fields
                  $('#registro').trigger("reset");
                  // $('#contactForm').trigger("reset");
                  // limpiar_msg_registro();
                },
                complete: function() {
                  // limpiar_msg_registro();
                   
                    $('#registro').trigger("reset");
                  // setTimeout(function() {
                  //   $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                  // }, 1000);
                }
          });

              boton.html("Enviar");
              boton.removeClass("btn-warning");
              boton.addClass("btn-success");  
              boton.removeAttr("disabled");    
          
    // console.log(cedula + nombre + apellido + direccion+ telefono+ email);  

  });
});

