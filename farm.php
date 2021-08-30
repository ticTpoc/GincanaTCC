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
<?php 
$rm = $_SESSION['rm'] ?? 0;
$q="select * from usuarios where $rm=rm";
$busca = $banco->query($q); 

?>
<?php
     
     $coin = $_GET['coin'] ?? 0;
     
     $q= "select rm,usuario,coin,highscore from usuarios where $rm=rm ";
     $busca=$banco->query($q);
     
          $newcoin = $coin +1;
          $coin = $newcoin;
          $k="
          update usuarios
          set coin='$newcoin'
          where rm='$rm'";
          $banco->query($k);
     
     
     ?>
 <div id="Dungeon">
     <h1> Dungeon </h1>
     <?php include_once "header.php" ?>
     <table class="loja">

<?php

if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        $reg = $busca->fetch_object();
    echo "<tr><td><a href='farm.php?coin=$reg$coin'><img class='goblin' src='imagens/goblin.png'  height='100px' width='100px' ></a>";
    echo "<tr><td>$reg->$coin";
/*echo"<td><p><a href='usuarios.php?rm=$reg->rm'><i class='material-icons'>delete_outline</i></a></p>";*/
            
        
    }
    
}
echo "<td>"

?>
</table>


     <?php  include_once "footer.php"; ?>

<?php echo voltar(); ?>
</div>
</body>

</html>