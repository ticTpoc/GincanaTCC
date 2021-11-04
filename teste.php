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
<div>
<h1> Teste de Pontuação </h1>
<h2> Para o quiz</h2>
<form method="post" action="">
<label for="acertos">Acertos</label>
<input type="number" id="acertos" name="erros"/><br>

<label for="erros">Erros</label>
<input type="number" id="erros" name="erros"/>
<button type='button' onclick="Rodar()">submit</button> 
</form>
<p id='pontos'></p>
</div>    
</div>
<div class='rodape'>
     <?php  include_once "footer.php"; ?>
</div>
</div>

<script type="text/javascript">
   const mostrarPontos =  document.getElementById('pontos');
function Rodar(){
 

var pontos = 10;

var acertos = document.getElementById("acertos").value;
var erros = document.getElementById("erros").value;
var diferenca = erros - acertos; 

if(diferenca>=0){
    
     pontos = pontos + diferenca;
   
}

mostrarPontos.innerHTML= "pontos: "+pontos;
}

</script>
</body>

</html>