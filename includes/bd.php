<?php

/* banco precisa disso ai
$banco = new mysqli(host,usuario,senha,banco)
*/

require_once "includes/funcao.php";

$banco = new mysqli("localhost","root","","GB");

if($banco->connect_errno){
    echo erro ("<p> Tem coisa muito errada :-( $banco->errno --> $banco->connect_error </p>");
    die();
}

/* transformar em portugues*/
$banco->query("SET NAMES 'utf8'");

$banco->query("SET character_set_cliente = utf8");

$banco->query("SET CHARACTER_SET_CONNECTION = utf8");

$banco->query("SET character_set_results = utf8");





?>