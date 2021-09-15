<?php

$ida= $_POST['valor'];


require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";




  $q="
  update apostas
  set confirmacao=true
  where ida='$ida';
               ";
   $banco->query($q);

   echo  "isso aqui $ida";

?>