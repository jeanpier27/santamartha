<?php 
// if(isset($_POST['hola'])){
?> 
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <link rel="icon" href="img/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Autoservicios Santa Martha</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"> -->

    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> -->


  </head>

  <body id="page-top">

    <!-- Navigation  -->
    <nav style="background-color: black" class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Santa Martha</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#somos">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#promociones">Promociones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Registro</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contactanos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php" target="_blank">Ingresar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Bienvenidos</div>
          <div class="row">
            <div class="col-sm-12">
              <div class="intro-heading" style="font-size: 38px; color: #fed136; ">Autoservicios Santa Martha</div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </header>
<!-- Home -->
    <section id="somos">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center mb-3">
            <h2 class="section-heading text-uppercase">Quiénes Somos</h2>
          </div>
          <div class="col-md-6 text-center" >
            <h2>Misión</h2>
            <p ALIGN="justify">Obtener la satisfacción total de nuestros clientes, al brindarle el mejor servicio general de calidad total en la limpieza de sus autos, por medio del trabajo en equipo, apoyo ágil, trato amable, superando las expectativas del servicio integral, honesto, oportuno y amable.</p>
          </div>
          <div class="col-md-6 text-center">
            <h2>Visión</h2>
            <p ALIGN="justify">Ser el primer centro de lavado de gran renombre en la ciudad Naranjal, por la calidad del servicio,  del producto y del tiempo de respuesta, asumiendo así el compromiso con nuestra clientela, poniendo a prueba el alto nivel de nuestro equipo de trabajo.</p>
          </div>
        </div>
      </div>
    </section>
  <!-- Carrusel -->

  <section id="promociones">

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="col-lg-12 text-center" >
            <h2 class="section-heading text-uppercase">Promociones</h2>
          </div>
          <br>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <?php 
              require_once('conexion.php');
              $imga=$conexion->query("select imagen from tb_promocion");
              // $res_img=mysqli_fetch_array($imga);
              while($res_img=mysqli_fetch_array($imga)){
                $a=$a.','.$res_img['imagen'];
              }
              list($b,$promo1,$promo2,$promo3) = explode(',', $a);              
             ?>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <!-- <img class="d-block w-100" src="http://lorempixel.com/800/400" alt="First slide"> -->
                <img class="d-block" src="<?php echo $promo1; ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <!-- <img class="d-block w-100" src="http://lorempixel.com/800/400/people" alt="Second slide"> -->
                <img class="d-block" src="<?php echo $promo2; ?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                <!-- <img class="d-block w-100" src="http://lorempixel.com/800/400/nature" alt="Third slide"> -->
                <img class="d-block" src="<?php echo $promo3; ?>" alt="Second slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Servicios -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Servicios</h2>
            <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
          </div>
        </div>
        <div class="row text-center">
          <!-- <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Lavado de Auto Sencillo</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Lavado de Auto Normal</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div> -->
          <!-- <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Web Security</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div> -->
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-address-book fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"><a href="#" style="color: black;" data-toggle="modal" data-target="#agendar">Agendar Servicio</a></h4>
            <div class="modal fade" id="agendar" tabindex="-1" role="dialog" aria-labelledby="agendar" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Agendar Servicio</h5>
                    <button class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times</span></button>
                  </div>
                  <div class="modal-body">
                    <form action="" id="form_agendar">
                      <div class="form-gruop">
                        <div class="alert alert-warning" role="alert"><strong>Advertencia!</strong> Para poder agendar un servicio debe de registrarse primero.</div>
                      </div>
                      <div class="form-group">
                        <label for="">Elije el Servicio</label>
                        <select class="form-control" name="servicio" id="servicio">
                          <option value="Lavada de moto">Lavada de moto</option>
                          <option value="Lavada de carro">Lavada de carro</option>        
                          <option value="Cambio de aceite">Cambio de aceite $15.00</option> 
                          <option value="Cambio de filtro">Cambio de filtro $10.00</option> 
                        </select>
                      </div>
                      <div class="form-group" id="c_carro" style="display:none;">
                        <label for="">Elije tipo de carro</label>
                        <select class="form-control"  name="carro" id="carro">      
                          <option value="Pequeño">Pequeño</option>
                          <option value="Mediano">Mediano</option>  
                          <option value="Grande">Grande</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" name="cedula_agendar" id="cedula_agendar" placeholder="Ingrese su número de Cedula *" maxlength="10" required="">                     
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" name="Nombres" id="nombres_agendar" placeholder="Esperando..." readonly="">                   
                      </div>
                      <div id="message_agendar"></div>
                      <div class="form-group">
                        <label for="">Elije la fecha</label>
                        <select class="form-control" name="fecha" id="fecha_agendar" disabled="disabled">
                          <option value="no">Seleccione...</option>
                         
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="">Elije la hora</label>
                        <select class="form-control" name="hora" id="hora_agendar">
                         
                        </select>
                      </div>

                      <div id="message_agenda_guardar" ></div>


                   </div>
                  <div class="modal-footer">
                    <button class="btn btn-success" id="aceptar_agenda" disabled="disabled">Aceptar</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                    </form>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Productos</h2>
            <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
          </div>

        </div>


        <div class="row">
          <div class="col-md-4">
            <form action=""  >
               <label for="">Categoria</label>
                    <select class="form-control" name="categoria" id="p_categoria">
                      <option value="0">Seleccione...</option>
                        <?php 
                          $sql3=$conexion->query("select * from tb_categoria");
                          while($sql2=mysqli_fetch_array($sql3)){
                         ?>
                         
                        <option value="<?php echo $sql2['id_categoria']; ?>"><?php echo $sql2['categoria']; ?></option>
                      <?php } ?>
                      </select>
              <label for="">Producto</label>
              <select class="form-control" name="producto" id="p_producto" style="padding-top: 3px;">
                
                
              </select>
            </form>
          </div>
          <div class="col-md-8" >
            <div class="row" id="contenedorproducts" >
            </div>
          </div>
        </div>
        <!-- <br> -->
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Registro</h2>
            <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
          </div>
        </div>

        <div class="row text text-center">
          <div class="col">
            <form action="" id="registro" method="post" style="border: 2px solid; padding: 35px; border-radius: 6px; background-image: url(img/formulariofondo.jpg)">
              
              <div class="form-group">
                <label for="cedula" class="text-white float-left" > Cedula</label>
                <input class="form-control numero" type="text" id="cedula" name="cedularegistro" placeholder="Cedula *" maxlength="10" required minlength="10">
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <div id="message_cedula"></div>                    
                  </div>                  
                </div>
                    <!-- <p class="help-block text-danger"></p> -->
              </div>
              <div class="form-group">
                <label for="" class="text-white float-left" > Nombre</label>
                <input class="form-control" type="text" name="nombreregistro" id="nombreregistro" placeholder="Nombre *" required data-validation-required-message="Por favor ingrese su nombre." onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label for="" class="text-white float-left" > Apellido</label>
                <input class="form-control" type="text" name="apellidoregistro" id="apellidoregistro" placeholder="Apellido *" required data-validation-required-message="Por favor ingrese su apellido." onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label for="" class="text-white float-left" > Dirección</label>
                <input class="form-control" type="text" name="direccionregistro" id="direccionregistro" placeholder="Direccion *" required data-validation-required-message="Por favor ingrese su Direccion." onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label for="" class="text-white float-left" > Teléfono</label>
                <input class="form-control numero" type="text" name="telefonoregistro" id="telefonoregistro" maxlength="10" minlength="10" placeholder="Telefono *" maxlength="10" required data-validation-required-message="Por favor ingrese su Teléfono.">
                    <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label for="" class="text-white float-left" > Email</label>
                <input class="form-control" type="email" name="mailregistro"  id="mailregistro" placeholder="Email *" required data-validation-required-message="Por favor ingrese su email.">
                    <p class="help-block text-danger"></p>
              </div>
              <br>
              <div id="success1"></div>
              <div class="form-group">
                <button class="btn btn-success" id="enviarregistro">Enviar</button>
              </div>
            </form>
          </div>          
        </div>

        
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contactanos</h2>
            <h3 class="section-subheading text-muted">Escribenos tus inquietudes.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Nombre *" required data-validation-required-message="Por favor ingrese su nombre." onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Email *" required data-validation-required-message="Por favor ingrese su email.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control numero" id="phone" type="tel" placeholder="Telefono *" required maxlength="10" data-validation-required-message="Por favor su numero de telefono.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Mensaje *" required data-validation-required-message="Por favor ingrese el mensaje."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar Mensaje</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span class="copyright">Copyright &copy; Autoservicios Santa Martha <?php echo date('Y'); ?></span>
          </div>
          <div class="col-md-6">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
      
            </ul>
          </div>

        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <!-- Custom scripts for this registro -->
    <script src="js/cedula.js"></script>
    <script src="js/registro.js"></script>

    <!-- Custom scripts for this agendar -->
    <script src="js/consulta_nombres.js"></script>
    <script src="js/agendar.js"></script>
    <script src="js/hora.js"></script>
    <script src="js/tipo_carro.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>


    <script type="text/javascript">
      $('select[name=producto]').change(function(){
        var producto=$("#p_producto").val();
        // console.log(producto);
        
         $.post("consultaproducto.php",{producto:producto},function(data,status){                               
                // console.log(data);
                // console.log(status);
                $('#contenedorproducts').html(data);  
        });
      });
          $('#p_categoria').change(function(){
            var categoria=$(this).val();
            $.post("cargar_productos.php",{categoria:categoria},function(data,status){                               
                // console.log(data);
                // console.log(status);
                $('#p_producto').html(data);  
              });

            $.post("consultaproducto.php",{categoria:categoria},function(data,status){                               
                // console.log(data);
                // console.log(status);
                $('#contenedorproducts').html(data);  
            });
            
          });
    </script>
     

  </body>

</html>
<?php
//  }else{ 
   ?>
<!-- <center>
<img src="img/mantenimiento.png" alt="">
</center> -->
<?php 
// } 
?>