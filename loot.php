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
require_once "includes/rm.php";
?>  
 <div id="corpo">
     <h1> ARE DE LOOT </h1>
     <h2></h2>   
     <?php include_once "header.php" ?>
     
     <?php
$coin = $_GET['coin'];
echo "você conseguiu:  ".$coin." moedas";
echo "<br>";
$novacoin = $reg->coin + $coin;
$k="
update usuarios
set coin='$novacoin'
where rm='$rm';
             ";
 $banco->query($k);
?>
     <?php  include_once "footer.php"; ?>

    
</body>

</html>