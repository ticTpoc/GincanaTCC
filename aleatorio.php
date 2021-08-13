<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
        <?php

        
       include_once "includes/funcao.php";

       
        
      /* 
      DESENHAR GRÁFICO
      
       function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Mobs', 'qtd'],
            
            /*
            for($i = 0; $i < $qtdmobs; $i++){
                echo '["' . $mobs[$i] . '",' . $numeros[$i] . '],';
            }
            
        ]);

        var options = {
            chart: {
            title: 'Sorteio de prêmios',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }*/
            
      ?>

    <title>Document</title>
</head>
<body>

<?php
 algoritmo(10);









 
 ?>
<div id="columnchart_material" style="width: 95vw; height: 95vh;"></div>
</body>
</html>