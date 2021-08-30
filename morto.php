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
<?php

$mensagem= $_GET['mensagem'];

?>
 <div id="corpo">
     <h1> <?php echo $_SESSION['user']; ?>  VOCÊ MORREU </h1>
      <?php echo "<h2> $mensagem </h2>";?>
         
         
     <?php include_once "header.php" ?>
     
     <img src='imagens/morto.png' height='500px' width='500px'>
     <?php  include_once "footer.php"; ?>

    
</body>

</html>