<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style> 
</style>

</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";
require_once "includes/rm.php";
?>  
<script type='text/javascript'>
var coin = 0;
function goblin() {
    coin =parseInt( Math.random() * (10 - 0) + 0);
  console.log(coin);
  document.getElementsByTagName("h3")[0].firstChild.data = "Moedas: " + coin;
  document.getElementById("goblin").style.display = "none";
}
function orc() {
    coin2 =parseInt( Math.random() * (15 - 4) + 4);
  console.log(coin2);
  document.getElementsByTagName("h4")[0].firstChild.data = "Moedas: " + coin2;
  document.getElementById("orc").style.display = "none";
}
function dragao() {
    coin3 =parseInt( Math.random() * (30 - 10) + 10);
  console.log(coin3);
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin3;
  document.getElementById("dragao").style.display = "none";
}
function loot(){
var loot = coin + coin2 + coin3;
    window.location.href="loot.php?coin=" + loot;
    var slideIndex = 1;
showSlides(slideIndex);
}
</script>

 <div id="corpo">
   <div>
     <h1> Dungeon </h1><br><br>
     <h3>moedas</h3>
    
     <h4>moedas</h4>
     <h5>moedas</h5>
     <table class="loja">
     <tr><td><a onclick="goblin()"><img  height='200px' width='200px' src='imagens/goblin.png' id='goblin' ></a><br><br>
     <td><a onclick="orc()"><img height='200px' width='200px' src='imagens/orc.png' id='orc' ></a><br><br>
     <tr><td><a onclick="dragao()"><img height='200px' width='200px' src='imagens/dragao.png' id='dragao' ></a><br><br>
     <tr><td><button onclick="loot()" ><p>loot</p></button>
</div>
<br>
<br>
</table>
<div class='carousel'>
  <button class="carousel__button carousel__button--left is-hidden"><img src='imagens/left.png' alt=''></button>
  <div class="carousel__track-container">
    <ul class="carousel__track">
      <li class="carousel__slide current-slide">
      <a><img class ='carousel__images ' src='imagens/goblin.png'></a>
      </li>
      <li class="carousel__slide">
      <a><img class ='carousel__images '  src='imagens/orc.png'></a>
      </li>
      <li class="carousel__slide">
      <a><img class ='carousel__images '  src='imagens/dragao.png'></a>
      </li>
    </ul>
    </div>
  <button class="carousel__button carousel__button--right"><img src='imagens/right.png' alt=''></button>

<div class="carousel__nav">
<button class="carousel__indicator current-slide"></button>
<button class="carousel__indicator"></button>
<button class="carousel__indicator"></button>
</div>



</div>
      
 
<?php  include_once "footer.php"; ?>
</div>
<script type="text/javascript" src='js/carousel.js'></script>
</body>


</html>