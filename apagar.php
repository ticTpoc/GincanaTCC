
<?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$rm= $_SESSION['rm'] ?? 0;


$q="DELETE FROM NOTIFICACOES where usuarios_rm='$rm'";
$busca = $banco->query($q);
?>;