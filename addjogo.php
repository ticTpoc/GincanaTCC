<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .conteudo{
        text-align: center;
        font-size: 20px;
    }

    </style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$currentPage= $_SERVER['SCRIPT_NAME'];

?>  
 <div class="corpo">

 <div class="cabecalho">
    <div class="esquerda">
    <h1 id="nome"> <a href = index.php>Gincana Bacana</a> </h1> 

 <h2 id="mensagem"><?php if(logado()){ echo "Ola ". $_SESSION['tipo']."  " . $_SESSION['user']; } ?></h2> 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
</div>
</div>


<div class="conteudo">
     <h1> Adicionar Jogo </h1>
     
<?php
$feito = $_GET['feito'];

if($feito == 0){
    include_once "forms/".substr($currentPage,15,-4).".php";
}else{
    $nome = $_POST['nome'];
    $livro = $_POST['livro'];
    $img = $_POST['img'];
    $tipo = $_POST['tipo'];
    
   echo "$nome: ".$nome."<br>";
   echo "$livro: ".$livro."<br>";
   echo "$img: ".$img."<br>";
   echo "$tipo: ".$tipo."<br>";


   if( empty($nome) || empty($img)){
    echo erro("preencha todos os campos");   
   }else{
     
       
        if($tipo==0){
        $q="INSERT into jogos(nome,manutencao,tipo,livro,img) values
        ('$nome',0,0,'livrocomunidade.png','$img');";
        }else{
        $q="INSERT into jogos(nome,manutencao,tipo,livro,img) values
        ('$nome',0,1,'$livro','$img');";
        }
      
        if($banco->query($q)){
            echo sucesso("Deu certinho yay");
        }else{
            echo erro("erro");
        }
       
   }




}
?>
</div>
<div class='rodape'>
     <?php  include_once "footer.php"; ?>
</div>
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">

</script>
</body>

</html>