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
 <div id="corpo">
     <h1> <?echo $_SESSION['user']; ?>  VOCÊ MORREU </h1>
     <h2> desista de seus sonhos </h2> 
         
         
     <?php include_once "header.php" ?>
     
     <img src='imagens/morto.jpg' height='500px' width='500px'>
     <?php  include_once "footer.php"; ?>

    
</body>

</html>