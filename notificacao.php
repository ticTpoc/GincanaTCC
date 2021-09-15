<?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$assunto = $_POST['assunto'];
$rm = $_SESSION['rm'] ?? 0;

$q="
 insert into notificacoes(assunto,texto,usuarios_rm) values
('$assunto','eu sou uma notificação','$rm');
";
if($busca = $banco->query($q)){
    echo "deu certo";
}


?>