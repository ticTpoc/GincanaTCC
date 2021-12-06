<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Compra</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

img{
    width:500px;
    height:500px;
}
@font-face {
    font-family: edwardian;
    src: url("..\css\ITCEDSCR.TTF");
}
td{
    font-family: edwardian;
    font-size: 50px;
}
td{
    background-color:#d2b48c;
}
.button{
    font-size: 18px;
}
</style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$dia=date('Y/m/d');
$usuario = $_SESSION['rm'];

$h="select * from usuarios where usuarios.rm='$usuario'";
$busca2= $banco->query($h);
$reg2= $busca2->fetch_object();
$moedas = $reg2->coin;
?>  
 <div class="corpo">

 

<div class="conteudo" style="background-color:#d2b48c;">
     <h1> Comprar item </h1>
     <table>
<?php
$feito = $_GET['feito'] ?? null;

$id= $_GET['id'];
$q = "select * from itens where id='$id'";

$busca= $banco->query($q);
$reg = $busca->fetch_object();

$preco = $reg->preco;
if($feito=='feito'){

$j=" select usuarios.usuario, itens.id from compras join usuarios on usuarios_rm=usuarios.rm
join itens on itens_id=itens.id where usuarios.rm='$usuario' and itens.id='$reg->id' ";
$busca3=$banco->query($j);

if($busca3->num_rows>=1){
    echo "
    <tr><td rowspan='3'><img src='imagens/itens/$reg->img'>
    <td><p>$reg->nome</p>
    <tr><td><p>$reg->funcao</p>
    <tr><td><p>Comprado!</p>
    "; 

}else{

$novocoin= $moedas-$preco;
if($novocoin<0){
    echo aviso("você não tem moedas o suficiente");
}else{
    $m= "update usuarios 
    set coin = $novocoin
    where rm = $usuario;";
    $banco->query($m);
 

    $k= "insert into compras(dia,usuarios_rm,itens_id) values
    ('$dia','$usuario','$id');
    ";
    $banco->query($k);
    echo sucesso("Item Comprado com sucesso, cheque sua mochila<br><a href='caderno.php'><button class='button'>Loja</button></a><br><a href='mochila.php'><button class='button'>Mochila</button></a><br><a href='jogos.php'><button class='button'>Jogos</button></a>");
}  
}

}else{

    echo "<table>
    <tr><td rowspan='3'><img src='imagens/itens/$reg->img'>
    <td><p style='margin-left: 30px;'>$reg->nome</p>
    <tr><td><p style='margin-left: 30px;'>$reg->funcao</p>
    <tr><td><a href='comprar.php?id=$reg->id&feito=feito' style='font-family: bold; margin-left: 30px;'> Comprar </a>
    
    </table>";    
  
}

?>
     </table>
</div>

 </div>
</body>

</html>