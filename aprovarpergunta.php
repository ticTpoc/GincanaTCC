<?php

require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$q="UPDATE quiz  SET  aprovacao = IF(jogadas>=10, 1, aprovacao);";
$busca = $banco->query($q);


?>