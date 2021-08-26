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
           $nome = $_POST['nome'] ?? null;
           $preco = $_POST['preco'] ?? null;
           $img = $_POST['img'] ?? null;
           $jogo = $_POST['jogo'] ?? null;
           $valor = $_POST['valor'] ?? null;
           $funcao = $_POST['funcao'] ?? null;
           $modelo = $_POST['modelo'] ?? null;

               if( empty($nome) || empty ($preco) || empty($img) || empty($modelo) || empty($valor) || empty($jogo)){
                 echo erro("preencha todos os campos");   

               }elseif($preco>9999){
echo erro("valor de preço alto demais");

               }else{
                   
                 $q="INSERT INTO SKINS(NOME,PRECO,IMG,VALOR,FUNCAO,JOGO,QTD,MODELO) VALUES 
                 ('$nome','$preco','$img','$valor','$funcao','$jogo',0,'$modelo');";
                 if($banco->query($q)){

                    echo sucesso(" Skin $nome cadastrado com êxito");
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