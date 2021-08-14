<?php

$mob = $_POST['mob'];

require_once "includes/bd.php";




$q="select * from inimigos where mob='$mob'";
$busca = $banco->query($q);
$reg = $busca->fetch_object();

$mincoin = $reg->mincoin;
$maxcoin = $reg->maxcoin;
$dano = $reg->dano;
$chance = $reg->chance;

echo "$mincoin,$maxcoin,$dano,$chance";


?>