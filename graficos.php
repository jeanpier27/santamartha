<?php 
date_default_timezone_set('America/Bogota');
session_start();
if(!isset($_SESSION['nombres'])){
header('location:cerrar_sesion.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php require_once('meta.php'); ?>
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script>
    $(document).ready(function(){
      $('.nav-item').removeClass('active');
      $('#reportes').addClass('active');
      
    });
  </script>
	<title>Autoservicios Santa Martha</title>
</head>
<body>

	<?php require_once('menu.php'); ?>
	<div style="width: 1px; height: 80px;"></div>
	<div class="container" style="background: #fff; border-radius: 20px;">
    <div class="row">      
      <div class="col-12"><center><h1>Gráficos</h1></center></div>
      <div class="col-md-12">
        <div id="container_line"></div>
      </div>
      <br><br>
      <div class="col-md-12">
        <div id="container_pie"></div>
      </div>
    </div>
	</div>
  <script>
    $(document).ready(function(){

      Highcharts.chart('container_line', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Santa Martha'
  },
  subtitle: {
    text: 'autoserviciosantamartha.com'
  },
  xAxis: {
    categories: [
      'Ene',
      'Feb',
      'Mar',
      'Abr',
      'May',
      'Jun',
      'Jul',
      'Ago',
      'Sep',
      'Oct',
      'Nov',
      'Dic'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Santa Martha'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} $</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Compras',
    data:[ 
    <?php 
    require_once('conexion.php');
    for($i=1;$i<=12;$i++){
    $compra=$conexion->query("SELECT ifnull(sum(total),0) as total FROM `tb_compras` WHERE year(fecha_compra)='2018' and month(fecha_compra)='".$i."'");
    $respcomp=mysqli_fetch_array($compra);
      echo $respcomp[0].',';
    } ?>
    ]
  }, {
    name: 'Ventas',
    data: [
    <?php 
    for($i=1;$i<=12;$i++){
    $venta=$conexion->query("SELECT ifnull(sum(total),0) as total FROM `tb_factura` WHERE year(fecha)='2018' and month(fecha)='".$i."'");
    $respvent=mysqli_fetch_array($venta);
      echo $respvent[0].',';
    } ?>
    ]
  }, {
    name: 'Gastos',
    data: [
    <?php 
    for($i=1;$i<=12;$i++){
    $gasto=$conexion->query("SELECT ifnull(sum(valor),0) as total FROM `tb_gastos` WHERE year(fecha)='2018' and month(fecha)='".$i."'");
    $respgast=mysqli_fetch_array($gasto);
      echo $respgast[0].',';
    } ?>
    ]

  }]
});

      Highcharts.chart('container_pie', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: 'Santa Martha'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
                      format: '<b>{point.name}</b>: {point.percentage:.1f} ',
                      style: {
                          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                      }
                  }
              }
          },
          series: [{
              name: 'Porcentaje',
              colorByPoint: true,
              data: [{
                  name: 'Compras',

                  <?php 
                    $compra=$conexion->query("SELECT ifnull(sum(total),0) as total FROM `tb_compras` WHERE year(fecha_compra)='2018'");
                    $respcomp=mysqli_fetch_array($compra);
                      echo 'y:'.$respcomp[0];
                    ?>
              }, {
                  name: 'Ventas',
                   <?php 
                    $venta=$conexion->query("SELECT ifnull(sum(total),0) as total FROM `tb_factura` WHERE year(fecha)='2018'");
                    $respvent=mysqli_fetch_array($venta);
                      echo 'y:'.$respvent[0].',';
                     ?>
                  sliced: true,
                  selected: true
              }, {
                  name: 'Gastos',
                  <?php 
                    $gasto=$conexion->query("SELECT ifnull(sum(valor),0) as total FROM `tb_gastos` WHERE year(fecha)='2018'");
                    $respgast=mysqli_fetch_array($gasto);
                      echo 'y:'.$respgast[0];
                    ?>
              }]
          }]
      });

    });
  </script>
</body>
</html>