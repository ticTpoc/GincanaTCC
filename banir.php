

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
    
     

<?php

$q='select * from usuarios';
$busca = $banco->query($q);
$rm = $_GET['rm'] ?? 0;
$reg = $busca->fetch_object();


    $k="
    update usuarios
    set estado='banido'
    where rm='$rm'";
    $banco->query($k);



 echo voltar();
?>
     <?php  include_once "footer.php"; ?>

    
</body>

</html>




