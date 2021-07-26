<!DOCTYPE html>
<html lang="pt-br">
<head>


<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="estilos/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";
?>  
 <div id="corpo">
     <?php
      logout();
      echo sucesso("usuário desconectado :D");
    echo voltar();
?>

</body>

</html>