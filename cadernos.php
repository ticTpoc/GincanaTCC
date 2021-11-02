<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Lojinha</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

#preenchimento{
    height: 100%;
    width: 100%;
}

table.cadernos{
    border-collapse: separate;
    border-spacing: 4rem 2rem;
    background-color: red;
    width: 80%;
    margin-left: 10%;
    margin-right: 10%;
}
td{
   
    background-color: yellow;
    height: 600px;
    width: 300px;
}
</style>
</head>

<body>
        
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";


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
         <div class="cadernos"> 
            <table class="cadernos">
                
<tr><td><a href="caderno.php?jogo=dungeon">
<div id="preenchimento">
</div></a>
<td><a href="caderno.php?jogo=pong">
<div id="preenchimento">
</div></a>
<td><a href="caderno.php?jogo=memoria">
<div id="preenchimento">
</div></a>  
<tr><td><a href="caderno.php?jogo=quiz">
<div id="preenchimento">
</div></a>
<td><a href="caderno.php?jogo=cassino">
<div id="preenchimento">
</div></a>
<td><a href="caderno.php?jogo=nenhum">
<div id="preenchimento">
</div></a>   
            </table>
</div>
</div>



<div class="rodape">
     <?php  include_once "footer.php"; ?>

</div>
</div>
</div>
</body>

</html>

