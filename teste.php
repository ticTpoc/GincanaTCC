
<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>  
    

    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";




function algoritmo($min,$max){
$numero = null;

$numero = random_int($min,$max/2) + random_int($min,$max/2);

return $numero;
}

function randommob($qtd){

    $numero = random_int(1,$qtd);

 switch ($numero) {
    case 1:
        return "goblin";
        break;
    case 2:
        return "orc";
        break;
    case 3:
        return "dragão";
        break;

        default:
        return 'goblin';
}
}

function arrayalgoritmo($min,$max,$vezes,$qtd){

    $array = array();

    for($cont=0; $cont<$vezes; $cont++){

       
        for($i=0; $i<$qtd; $i++){

            $miniarray=array("y" => algoritmo($min,$max), "label" => randommob($qtd) );
            
        }
        $array[$cont] = $miniarray;
        
    }

 return $array;   
}


$dataPoints =  array( 

    array("y" => algoritmo(0,100), "label" => "Goblin" ),
    array("y" => algoritmo(0,100), "label" => "Orc" ),
    array("y" =>algoritmo(0,100), "label" =>  "Dragão" )
);


?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type='text/javascript'>
 window.onload = function() {
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Gold Reserves"
     },
     axisY: {
         title: "Gold Reserves (in tonnes)"
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0.## tonnes",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }

 </script>  
 <div id="corpo">
     <h1> TESTE </h1>
     <h2> TESTE </h2>   
<?php



print_r(arrayalgoritmo(0,10,5,3));
echo "<br>";
echo "<br>";
print_r($dataPoints);






?>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


    
</body>

</html>