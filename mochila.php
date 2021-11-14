<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

#livro{
    position: fixed;
    right:0;
    bottom:0;
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
     <h1> Mochila </h1>
     
<a href='cadernos.php'><img id='livro' src='imagens/sprites/livroloja.png'></a>
</div>
 </div>

 <script src="js/funcao.js"></script>
 <script type="text/javascript">


</script>
</body>

</html>