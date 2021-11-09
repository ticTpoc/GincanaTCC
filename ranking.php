<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

table{
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
}
table,td{
    border-collapse: collapse;
    border: 2px solid brown;
}
td{
    height: 50px;
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
<h1>Vou meter logo um ranking aqui e vai ser doido</h1>
</div>
<table class='ranking'>
<?php 
$key = $_GET['chave'] ?? "";


echo "<tr><td><form method='get' action='ranking.php'><input type='text' id='chave' name='chave'><input type='submit' value='Pesquisar'></form>";
$q= "select usuarios.rm, usuarios.usuario as usuario, jogos.nome as jogo, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
join jogos on jogos.idj=jogos_idj order by rankings.highscore desc";

if(!empty($key)){
    $q = " select usuarios.rm, usuarios.usuario as usuario, jogos.nome as jogo, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
    join jogos on jogos.idj=jogos_idj where usuarios.usuario like '%$key%' or jogos.nome like '%$key%' or usuarios.rm like '%$key%'  ";
}else{
    $q= "select usuarios.rm, usuarios.usuario as usuario, jogos.nome as jogo, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
    join jogos on jogos.idj=jogos_idj order by rankings.highscore desc";
}


$busca = $banco->query($q);
echo "<tr><td>Usuario<td>Jogo<td>Highscore";
while($reg = $busca->fetch_object()){
echo "<tr><td>$reg->usuario<td>$reg->jogo<td>$reg->highscore";
}

?>

</table>

<div class='rodape'>
     <?php  include_once "footer.php"; ?>
</div>


    
</div>
</body>

</html>