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
?>  


 
    
     <h1 id="texto"style="text-align:left"> Gincana Bacana </h1> 
 <h2><?php if(logado()){ 
         echo "olá ". $_SESSION['tipo']."  " . $_SESSION['user'];
         
         } ?></h2>   
 

<div>
    <?php include_once "header.php" ?>

</div>
<div class="corpo">
 
<div id="rodape">
     <?php  include_once "footer.php"; ?>
</div>
    
        </div>
</body>

</html>