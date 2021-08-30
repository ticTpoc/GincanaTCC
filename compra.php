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
 <div id="compra">
     <h1> Compra </h1>
     <h2></h2>   
     <?php include_once "header.php" ?>
     <?php
     $rm = $_SESSION['rm'] ?? 0;
$q="select * from usuarios where $rm=rm";
$busca = $banco->query($q); 
?>
  <?php
  $q="select rm,usuario,senha,coin from usuarios where $rm=rm";
  $busca=$banco->query($q);
  $id = $_GET['id'] ?? 0;
  $k="select id,nome,img,preco from skins where $id=id";
  $busca2=$banco->query($k);
  ?> 
  </div>

  <div>
<table class='compra'>
<?php

if((!$busca)||(!$busca2)){
    echo erro('a busca não deu certo :(');
}else{
    if(($busca->num_rows==0)||($busca2->num_rows==0)){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        $reg = $busca->fetch_object();
        $reg2 = $busca2->fetch_object();
           $t=thumb($reg2->img);
            echo  "<tr class ='compra'><td class ='compra' rowspan= '2'><img src='$t'  height='400' width='400'></p>";
             echo "<td class='compra'><p> Skin: $reg2->nome </p>";
             echo "<tr><td class='compra'><p> Usuario:$reg->usuario </p>";
             echo "<tr><td class='compra'><p> preço: $reg2->preco coins </p>";
             echo "<td class='compra'><p> moedas: $reg->coin coins</p>";
             echo "<br>";
             echo "<td colspan='2'> <a href='pedido.php?id=$id'>CONFIRMAR COMPRA</a>";
             
            
           
            
            
        
    }
    
}
?>
</table>
</div>

     <?php  include_once "footer.php"; ?>

    
</body>

</html>