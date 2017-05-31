<?php
include("../conexion/conexion.php");


    $result1 = $connection->query("SELECT count(*) as num1 FROM noticias where idcategoria='1';");
    $result2 = $connection->query("SELECT count(*) as num2 FROM noticias where idcategoria='2';");
    $result3 = $connection->query("SELECT count(*) as num3 FROM noticias where idcategoria='3';");
    $result4 = $connection->query("SELECT count(*) as num4 FROM noticias where idcategoria='4';");
    $result5 = $connection->query("SELECT count(*) as num5 FROM noticias where idcategoria='5';");
    $result6 = $connection->query("SELECT count(*) as num6 FROM noticias where idcategoria='9';");

    $obj1=$result1->fetch_object();
    $obj2=$result2->fetch_object();
    $obj3=$result3->fetch_object();
    $obj4=$result4->fetch_object();
    $obj5=$result5->fetch_object();
    $obj6=$result6->fetch_object();

    $smp=$obj1->num1;
    $hw=$obj2->num2;
    $sw=$obj3->num3;   
    $tb=$obj4->num4;   
    $con=$obj5->num5;  
    $tv=$obj6->num6;
    
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Smartphone',     <?php echo "$smp"?>],
          ['Hardware',      <?php echo "$hw"?>],
          ['Software',  <?php echo "$sw"?>],
          ['Tablets', <?php echo "$tb"?>],
          ['Consolas',    <?php echo "$con"?>],
            ['Televisores',    <?php echo "$tv"?>]
        ]);

        var options = {
          title: 'Porcentaje de noticias por categorías'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
