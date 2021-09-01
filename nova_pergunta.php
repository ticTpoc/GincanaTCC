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
     if(!admin()){
         echo erro(" sem permissão!");
         echo erro(" para de zoar o esquema >:-(");
     }else{
           $question= $_POST['pergunta'] ?? null;
           $r1 = $_POST['resposta1'] ?? null;
           $r2 = $_POST['resposta2'] ?? null;
           $r3 = $_POST['resposta3'] ?? null;
           $rc = $_POST['certa'] ?? null;


               if( empty($question) || empty ($r1) || empty($r2) || empty($r3) || empty($rc)){
                 echo erro("preencha todos os campos");   

               }else{
                   
                 $q="INSERT INTO QUIZ(QUESTION, R1, R2, R3, RC, RN) VALUES 
                 ('$question','$r1','$r2','$r3','$rc','Nenhuma das Anteriores');";

                 if($banco->query($q)){

                    echo sucesso(" Perguntas cadastrado com êxito");
                 }
                 else{
                      echo erro( " Falha no cadastro");
                 }


               }
           }
   
     ?>

</body>

</html>
<?php echo voltar(); ?>