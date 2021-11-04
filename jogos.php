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
     <div class="esquerda">
    <h1 id="nome"> <a href = index.php>Gincana Bacana</a> </h1> 

 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
</div>
</div>  
         

         <div class="conteudo">
    
   
     <table id="jogos">
    <?php 
    echo "<h2> carteira <h2>";
    echo "dinheiro: $reg->coin <br><br><br>";
    
    $q="select * from jogos where manutencao=0;";
    $busca = $banco->query($q);
       while ($reg = $busca->fetch_object()){

         echo "  <td><a href='$reg->nome.php?id=$reg->idj'><img height='100px' width='100px' src='imagens/jogos/$reg->nome.png'></a>";

       }
       echo "  <td><a href='jogos.php'><img height='100px' width='100px' src='imagens/jogos/nunca.png'></a>";

       echo"<tr><td rowspan='2'>Manutenção";
       $q="select * from jogos where manutencao=1;";
       $busca = $banco->query($q);
          while ($reg = $busca->fetch_object()){
   
            echo "  <td><a href='$reg->nome.php'><img style='pointer-events:none;' height='100px' width='100px' src='imagens/jogos/$reg->nome.png'></a>";
   
          }
       
       
            
   

        
        ?>
        </table>
       
        </div>
        </div>
        <div class="rodape">
     <?php  include_once "footer.php"; ?>
        </div>
       
</body>

</html>