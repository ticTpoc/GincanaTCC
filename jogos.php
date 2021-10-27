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
  <div id="corpo">

     <div class="cabecalho"> 
     <h2><?php if(logado()){ 
         echo "olá ". $_SESSION['tipo']." " . $_SESSION['user'];
         
         } ?></h2>   
         </div> 

         <div class="conteudo">
     <?php include_once "header.php" ?>
   
     <table id="jogos">
    <?php 
    echo "<h2> carteira <h2>";
    echo "<tr><td> dinheiro: $reg->coin <br><br><br>";
    
       echo "  <tr><td><a href='farm.php?coin=$reg->coin'><img height='100px' width='100px' src='imagens/dungeon.png'></a>";
      
         echo "  <td><a href='quiz.php?coin=$reg->coin'><img height='100px' width='100px' src='imagens/quizz.png'></a>";
         
         echo "  <td><a href='cassino.php?coin=$reg->coin'><img height='100px' width='100px' src='imagens/cassino.png'></a>";
         
         echo "  <tr><td><a href='memory.php?coin=$reg->coin'><img height='100px' width='100px' src='imagens/memoria.png'></a>";
         
         echo "  <td><a href='pong.html?coin=$reg->coin'><img height='100px' width='100px' src='imagens/pong.png'></a>";
       
         echo " <td><a href='tetris.php?coin=$reg->coin'><img height='100px' width='100px' src='imagens/nunca.png'></a>";
       
        
        ?>
        </table>
        </div>
        </div>
        <div class="rodape">
     <?php  include_once "footer.php"; ?>
        </div>
       
</body>

</html>