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
 <div id="login_usuario">
 <?php
 
 $u = $_POST['rm'] ?? null;
$s= $_POST['senha'] ?? null;

if(is_null($u) or is_null($s)){

    require 'user_login_form.php';
}else{

    $q = "select usuario,rm,tipo,estado,senha from usuarios where rm='$u' limit 1";

    $busca = $banco->query($q);

    if(!$busca){
        echo erro('me odeio');
    }
    else{
if($busca->num_rows>0){
    $reg = $busca->fetch_object();
    if($reg->estado=='banido'){
        echo "<img src='imagens/ednaldo.jpg' height='500' width='500'><br>";
    }else{
        if(testarhash(enigma($s),$reg->senha)){
            echo sucesso('parabéns :D');
            $_SESSION['user']= $reg->usuario;
            $_SESSION['tipo']= $reg->tipo;
            $_SESSION['rm']= $reg->rm;
    
        }else{
    echo erro('senha inválida >:(');
        }
    }
   
   
}else{
    echo erro('usuário não existe >:( ');
}
    }
}
 

 ?>

 <?php echo voltar(); ?>
</div>


</body>

</html>