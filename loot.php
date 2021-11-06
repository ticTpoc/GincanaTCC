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
require_once "includes/rm.php";
?>  
 <div id="corpo">
     <h1> ARE DE LOOT </h1>
     <h2></h2>   
     <?php include_once "header.php" ?>
     
     <?php
$pontos = $_GET['pontos'];
$jogo = $_GET['id'];
$jogador = $_SESSION['rm'];

$a= "select rankings.idr as identificador, usuarios.rm, usuarios.usuario, jogos.nome, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
join jogos on jogos.idj=jogos_idj where usuarios.rm='$jogador' and jogos.idj='$jogo' order by rankings.highscore desc;";
$busca = $banco->query($a);
echo "pontos: $pontos<br>";
echo "jogo: $jogo<br>";
echo "jogador: $jogador<br>";
if ($reg = $busca->fetch_object()) {

  if($pontos> $reg->highscore){
    $j="update rankings
    set highscore = '$pontos'
    where usuarios_rm = '$jogador' and jogos_idj='$jogo'";
    $banco->query($j);
  }
    
}else {
echo "não tem<br>";

    $j="insert into rankings(usuarios_rm,jogos_idj, highscore) values 
    ('$jogador','$jogo','$pontos'); ";
    $banco->query($j);
}

/*
$q= "select rankings.idr as identificador, usuarios.rm, usuarios.usuario, jogos.nome, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
join jogos on jogos.idj=jogos_idj where usuarios.rm='$jogador' and jogos.idj='$jogo' order by rankings.highscore desc;";
$busca = $banco->query($q);

while($reg = $busca->fetch_object()){

    if($busca->num_rows==0 ){

    echo "wtf";
        echo "num row 0";


        $j="insert into rankings(usuarios_rm,jogos_idj, highscore) values 
        ('$jogador','$jogo','$pontos');
        ";
        $banco->query($q);

   }else if($pontos > $reg->highscore){

        echo "atualizar";

        $j="update rankings
            set highscore = '$pontos'
            where usuarios_rm = '$jogador'";
    }
 
}
*/
?>
     <?php  include_once "footer.php"; ?>

    
</body>

</html>