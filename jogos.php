<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>


p1:hover{


}

</style>
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
         <img src="imagens/fundos/corredor.png" class="fundos" id="corredor" usemap="#image-map">

<map name="image-map">
  <?php 
  
  $q="select * from jogos limit 6";
  $busca= $banco->query($q);

  ?>
   <?php  
      echo "<area id='p1'  onmouseover='abrir(1)' onmouseout='fechar()' target='$reg->nome.php?id=$reg->idj' alt='porta1' title='porta1' href='' coords='78,257,283,310,283,650,80,748' shape='poly'>";

      echo " <area id='p2' onmouseover='abrir(2)' onmouseout='fechar()' target='' alt='porta2' title='porta2' href='' coords='339,304,494,356,497,561,340,622' shape='poly'>";

      echo " <area id='p3' onmouseover='abrir(3)' onmouseout='fechar()' target='' alt='porta3' title='porta3' href='' coords='528,356,638,387,642,496,528,543' shape='poly'>"; 

      echo " <area id='p4' onmouseover='abrir(4)' onmouseout='fechar()' target='' alt='porta4' title='porta4' href='' coords='959,373,1055,358,1055,527,963,500' shape='poly'>"; 

      echo " <area id='p5' onmouseover='abrir(5)' onmouseout='fechar()' target='' alt='porta5' title='porta5' href='' coords='1109,338,1106,561,1243,628,1246,308' shape='poly'>"; 

      echo " <area id='p6' onmouseover='abrir(6)' onmouseout='fechar()' target='' alt='porta6' title='porta6' href='' coords='1298,315,1514,276,1522,738,1295,645' shape='poly'>";
    ?>
    </map>
   
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

        <script type="text/javascript" defer>

const imagem = document.getElementById('corredor');

function abrir(index){

  switch(index){
    case 1: 
      imagem.setAttribute('src','imagens/fundos/corredor1.png')
      break;
      case 2: 
      imagem.setAttribute('src','imagens/fundos/corredor2.png')
      break;
      case 3: 
      imagem.setAttribute('src','imagens/fundos/corredor3.png')
      break;
      case 4: 
      imagem.setAttribute('src','imagens/fundos/corredor4.png')
      break;
      case 5: 
      imagem.setAttribute('src','imagens/fundos/corredor5.png')
      break;
      case 6: 
      imagem.setAttribute('src','imagens/fundos/corredor6.png')
      break;

  }
}
function fechar(index){
  imagem.setAttribute('src','imagens/fundos/corredor.png')

}
          </script>
       
</body>

</html>