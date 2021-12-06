<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Ranking do melhores</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

table{
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
    background-image: url("imagens/fundos/papel.jpg");
}
table,td{
  text-align: center;
}
.pesquisa{
    text-align: left;
}
input{
    border: none;
}
td{
    height: 50px;
}
#porta{
    position: fixed;
    left:0;
    bottom:0;
    width:100px;
    height:150px;
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


<div class="conteudo">
<h1>Lista dos Incríveis</h1>
</div>
<table class='ranking'>
<?php 
$key = $_GET['chave'] ?? "";


echo "<tr><td class='pesquisa' ><form method='get' action='ranking.php'><input type='text' id='chave' name='chave'><input type='submit' value='Pesquisar'></form>";
$q= "select usuarios.rm, usuarios.usuario as usuario,salas.apelido, jogos.nome as jogo, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
join jogos on jogos.idj=jogos_idj join salas on usuarios.salas_id=salas.id order by rankings.highscore desc";

if(!empty($key)){
    $q = " select usuarios.rm, usuarios.usuario as usuario, salas.apelido, jogos.nome as jogo, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
    join jogos on jogos.idj=jogos_idj  join salas on usuarios.salas_id=salas.id where usuarios.usuario like '%$key%' or jogos.nome like '%$key%' or usuarios.rm like '%$key%'  or salas.apelido like '%$key%'  ";
}else{
    $q= "select usuarios.rm, usuarios.usuario as usuario,salas.apelido, jogos.nome as jogo, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
    join jogos on jogos.idj=jogos_idj join salas on usuarios.salas_id=salas.id order by rankings.highscore desc";
}


$busca = $banco->query($q);
echo "<tr><td>Usuario<td>Jogo<td>Sala<td>Highscore";
while($reg = $busca->fetch_object()){
echo "<tr><td>$reg->usuario<td>$reg->jogo<td>$reg->apelido<td>$reg->highscore";

}

?>

</table>



<a href='jogos.php'><img id='porta' src='imagens/sprites/portafuncionarioaberta.png'>
</div>
</body>

</html>