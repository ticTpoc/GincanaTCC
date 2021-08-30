
<?php
$rm = $_POST['banido'];

require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$q="select * from usuarios where rm='$rm'";
$busca = $banco->query($q);
$reg = $busca->fetch_object();


if($reg->estado=='ativo'){

    $k="
    update usuarios
    set estado = 'banido'
    where rm='$rm'";
    $banco->query($k);
}else{

    $k="
    update usuarios
    set estado = 'ativo'
    where rm='$rm'";
    $banco->query($k);
}





?>




