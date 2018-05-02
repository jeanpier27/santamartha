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
      <div class="col-md-6">
        <div id="container_line"></div>
      </div>
      <div class="col-md-6">
        <div id="container_pie"></div>
      </div>
    </div>
	</div>
  <script>
    $(document).ready(function(){

      Highcharts.chart('container_line', {

          title: {
            text: 'Solar Employment Growth by Sector, 2010-2016'
          },

          subtitle: {
            text: 'Source: thesolarfoundation.com'
          },

          yAxis: {
            title: {
              text: 'Number of Employees'
            }
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
          },

          plotOptions: {
            series: {
              label: {
                connectorAllowed: false
              },
              pointStart: 2010
            }
          },

          series: [{
            name: 'Installation',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
          }, {
            name: 'Manufacturing',
            data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
          }, {
            name: 'Sales & Distribution',
            data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
          }, {
            name: 'Project Development',
            data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
          }, {
            name: 'Other',
            data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
          }],

          responsive: {
            rules: [{
              condition: {
                maxWidth: 500
              },
              chartOptions: {
                legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
                }
              }
            }]
          }

        });

      Highcharts.chart('container_pie', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: 'Browser market shares January, 2015 to May, 2015'
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
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                      style: {
                          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                      }
                  }
              }
          },
          series: [{
              name: 'Brands',
              colorByPoint: true,
              data: [{
                  name: 'Microsoft Internet Explorer',
                  y: 56.33
              }, {
                  name: 'Chrome',
                  y: 24.03,
                  sliced: true,
                  selected: true
              }, {
                  name: 'Firefox',
                  y: 10.38
              }, {
                  name: 'Safari',
                  y: 4.77
              }, {
                  name: 'Opera',
                  y: 0.91
              }, {
                  name: 'Proprietary or Undetectable',
                  y: 0.2
              }]
          }]
      });

    });
  </script>
</body>
</html>