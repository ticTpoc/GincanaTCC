<?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$id = $_POST['identificador']; 
    $j= "select * from quiz where  idq = '$id' ";
     $busca = $banco->query($j);
     $reg = $busca->fetch_object();
   
     $novoacertos = $reg->erros + 1 ;
     $h="
     update quiz
     set erros='$novoacertos'
     where idq='$id';";
                  
      $banco->query($h);

?>;