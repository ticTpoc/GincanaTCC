<?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";



$id = $_POST['identificador']; 
    $j= "select * from quiz where  idq = '$id' ";
     $busca = $banco->query($j);
     $reg = $busca->fetch_object();
     if($reg->aprovacao == '1'){
        $pontos = $reg->pontos;
        echo "$pontos";
    }else{
        echo "0";
    }
     $novoacertos = $reg->acertos + 1 ;
     $h="
     update quiz
     set acertos='$novoacertos'
     where idq='$id';";
                  
      $banco->query($h);



?>