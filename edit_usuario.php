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
 <div id="corpo-segundo">
     <h1> Pagina Inicial </h1>
     
     <?php include_once "header.php";
      $q="select usuario,rm,senha,tipo from usuarios where usuario='".$_SESSION['user']."'";
      $busca = $banco->query($q);
      $reg=$busca->fetch_object();
     ?>
    
     <?php
    
    $usuario = $_POST['usuario'] ?? null;
           $rm = $_POST['rm'] ?? null;
           $tipo = $_POST['tipo'] ?? null;
           $senha1 = $_POST['senha1'] ?? null;
           $senha2 = $_POST['senha2'] ?? null;
           $senha0 = $_POST['senha0'] ?? null;

           if( empty($usuario) || empty ($rm) || empty($tipo) || empty($senha1) || empty($senha2) || empty($senha0)){
            echo erro("preencha todos os campos");   
          }else{

         
            if(!($senha1===$senha2)){
                echo erro('senhas diferentes');
            }elseif(!(testarhash(enigma($senha0),$reg->senha))){
                  echo erro('senha anterior inválida');
            }else{
                $novasenha=gerarhash($senha1);
    
                $q="
update usuarios
set senha='$novasenha'
where rm='$rm';
                ";
                $banco->query($q);




            }

          }
        

    
?>


        </div>
     
     <?php  include_once "footer.php"; ?>

    
</body>

</html>