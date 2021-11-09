<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

.conteudo{
  background-color: #EAD4AA;
}
#corredor{

margin-left: 5rem;

}

</style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";


$corredor = $_GET['corredor']  ?? 1;

$proximoCorredor = $corredor + 1;
$corredorAnterior = $corredor - 1;
?>  
  <div id="corpo">

      <!-- div class="cabecalho"> 
     <div class="esquerda">
    <h1 id="nome"> <a href = index.php>Gincana Bacana</a> </h1> 

 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
</div>
</div -->  
         

         <div class="conteudo">
         <img src="imagens/fundos/corredor.png" id="corredor" usemap="#image-map">

<map name="image-map">
  <?php 
  $max = $corredor * 6;
  $min  = $max - 5;

  $q="select * from jogos where idj between '$min' and '$max' ";
  $busca= $banco->query($q);


   for($i= 0; $reg = $busca->fetch_object(); $i++){
    switch($i){
case 0:
  
  echo "<area id='p1'  onmouseover='abrir(1)' onmouseout='fechar()' target='' alt='porta1' title='$reg->nome'
   href='$reg->nome.php?id=$reg->idj' coords='78,257,283,310,283,650,80,748' shape='poly'>";
break;
case 1:
  echo " <area id='p2' onmouseover='abrir(2)' onmouseout='fechar()' target='' alt='porta2' title='$reg->nome'
   href='$reg->nome.php?id=$reg->idj' coords='339,304,494,356,497,561,340,622' shape='poly'>";
break;
case 2:
  echo " <area id='p3' onmouseover='abrir(3)' onmouseout='fechar()'target='' alt='porta3' title='$reg->nome'
   href='$reg->nome.php?id=$reg->idj' coords='528,356,638,387,642,496,528,543' shape='poly'>"; 
break;
case 3:
  echo " <area id='p4' onmouseover='abrir(4)' onmouseout='fechar()' target='' alt='porta4' title='$reg->nome'
   href='$reg->nome.php?id=$reg->idj' coords='959,373,1055,358,1055,527,963,500' shape='poly'>"; 
break;
case 4:
  echo " <area id='p5' onmouseover='abrir(5)' onmouseout='fechar()' target='' alt='porta5' title='$reg->nome'
   href='$reg->nome.php?id=$reg->idj' coords='1109,338,1106,561,1243,628,1246,308' shape='poly'>"; 
break;
case 5:
  echo " <area id='p6' onmouseover='abrir(6)' onmouseout='fechar()' target='' alt='porta6' title='$reg->nome'
   href='$reg->nome.php?id=$reg->idj' coords='1296,306,1516,275,1520,740,1297,642' shape='poly'>"; 
break;
    }

   }


   echo "<area target='' alt='proxcorredor' title='próximo corredor'
    href='jogos.php?corredor=$proximoCorredor' coords='720,307,880,503' shape='rect'>";
if($corredorAnterior<1){
  echo "<area target='' alt='voltar' title='voltar' href='index.php?papo=1&ideia=1' coords='432,651,1221,798' shape='rect'>";

}else{
  echo "<area target='' alt='voltar' title='voltar' href='jogos.php?corredor=$corredorAnterior' coords='432,651,1221,798' shape='rect'>";

}
       ?>


    </map>
   
     
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