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
 <div id="corpo">
     
     <?php
     
     
       

       if(!isset($_POST['usuario'])){
           require 'novo_form_usuario.php';

       }
       else{
           $usuario = $_POST['usuario'] ?? null;
           $rm = $_POST['rm'] ?? null;
           $sala = $_POST['sala'] ?? null;
           $senha1 = $_POST['senha1'] ?? null;
           $senha2 = $_POST['senha2'] ?? null;

           if($senha1 === $senha2){
              
               if( empty($usuario) || empty ($rm) || empty($sala) || empty($senha1) || empty($senha2) ){
                 echo erro("preencha todos os campos");   
               }else{
                 $senha= gerarhash($senha1);

                 $q="INSERT INTO USUARIOS(USUARIO,RM,SENHA,TIPO,COIN,ESTADO,SALAS_ID,NIVEL,vida) VALUES 
                 ('$usuario','$rm','$senha','jogador',0,'ativo','$sala',1,5);";
                 if($banco->query($q)){

                    echo sucesso(" Usuário $usuario cadastrado com êxito");
                 }
                 else{
                      echo erro( " Falha no cadastro");
                 }


               }
           }
           else{
               echo erro("senhas incorretas");
           }


       }

    
     


   
     ?>

</body>

</html>
<?php echo voltar(); ?>