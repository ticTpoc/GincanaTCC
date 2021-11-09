<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
.fundos{
    height:100%;
    width:100%;
    max-width:100%;
}
#guardinha{
    height:130px;
    width: 130px;
    position: absolute;
    left: 36%;
    top: 59%;
}
.papo{
    bottom: 98px;
    position: fixed;
    height: 100px;
    background-color: black;
    color:white;
    width: 100%;
    text-align: center;
    font-size: 30px;
}

</style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";


$papo = $_GET['papo'] ?? null;
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
<?php 

if(!logado()){
echo "<img src='imagens/fundos/entradaguardinhamaior.png' class='fundos' id='entrada' usemap='#image-map'>";
echo "<map name='image-map'>";
echo "<area target='' alt='guardinha' title='guardinha' href='index.php?papo=1' coords='574,338,791,559'
 shape='rect'>";

}else{
    echo "<img src='imagens/fundos/entradaguardinha.png' class='fundos' id='entrada' usemap='#image-map'>";
echo "<map name='image-map'>";
echo "<area target='' alt='guardinha' title='guardinha' href='index.php?papo=1' coords='574,338,791,559'
 shape='rect'>";
 echo "<area target='' alt='portão' title='portão' href='jogos.php' coords='966,269,1351,734' shape='rect'>";

}
?>
<?php
if($papo == 1){
    echo "<div class='papo'>";
if(logado()){
    echo "<span>";
    echo "Olá ". $_SESSION['tipo']."  " . $_SESSION['user'];
    echo "</span>";
}else{
    
    echo "<span>guardinhaMaroto: <a id='branco' href='login_usuario.php'>Login</a> 
    ou <a id='branco' href='novo_usuario.php'>Cadastro</a> ?</span>";
   
}
echo "</div>";
}

?>
<div class='rodape'>
     <?php  include_once "footer.php"; ?>
</div>


    
</div>
</body>

</html>