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


 <div id="corpo">
   <script type="text/javascript">
var coin = 0;
/*
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
*/


 
var vida = 0;

function atacar(){
  const currentSlide= track.querySelector('.current-slide');
   const nextSlide= currentSlide.nextElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide');
  const nextDot= currentDot.nextElementSibling;
  const nextIndex = slides.findIndex(slide=>slide === nextSlide);

  var z = slides.findIndex(slide=>slide === currentSlide);
  var x = document.getElementsByClassName("carousel__images")[z].id;

console.log(x);
console.log(z);

  hideShowArrows(slides, prevButton, nextButton, nextIndex);

  var chance = parseInt( Math.random() * (100 - 0) + 0);

  switch(x) {
  case 'orc':
   if(chance<50){
     console.log(chance);
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
   }else{
    window.location.href="morto.php?chance="+chance;
   }


    break;
  case 'goblin':
    if(chance<90){
      console.log(chance);
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
   }else{
    window.location.href="morto.php?chance="+chance;
   }
    break;
    case 'dragao':
      if(chance<20){
        console.log(chance);
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
   }else{
    window.location.href="morto.php?chance="+chance;
   }
    break;  
    default:
    alert('erro');
  
  
}
   
   
}
   </script>
   <!--
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
-->
<br>
<br>
</table>
<div class='carousel'>
  <button class="carousel__button carousel__button--left is-hidden"><img src='imagens/left.png' alt=''></button>
  <div class="carousel__track-container">
    <ul class="carousel__track" id="parente">
    <li class="carousel__slide current-slide">
      <a><img id='goblin' class ='carousel__images' src='imagens/goblin.png'></a>
      </li>
      

     
     
    </ul>
    </div>
  <button class="carousel__button carousel__button--right"><img src='imagens/right.png' alt=''></button>
<div class='actions__nav'>
  <button class='actions__button' onclick="atacar()"><a >ATACAR</a></button>
  <button class='actions__button'><a href='index.php'><img src='imagens/fuga.png'></a></button>
</div>
<div class="carousel__nav" id='parente2'>
<button class="carousel__indicator current-slide"></button>


</div>



</div>
      
 
<?php  include_once "footer.php"; ?>
</div>
<script type="text/javascript" src='js/carousel.js'></script>
<script type='text/javascript' >

function strToElem(god,imagem){
    var temp = '<li class="carousel__slide"><a><img id='+god+' class="carousel__images" src='+imagem+'></a></li>';
    var a = document.createElement("p");
    a.innerHTML = temp;
    return a.childNodes[0];
  }

  function addLista(god,imagem){
    var parent = document.getElementById('parente');
  var elem = strToElem(god,'imagens/'+imagem);
  parent.appendChild(elem);
  }
  
  function strToElem2(){
    var temp2 = '<button class="carousel__indicator"></button>';
    var a2 = document.createElement("p");
    a2.innerHTML = temp2;
    return a2.childNodes[0];
  }
  function addButton(imagem){
    var parent2 = document.getElementById('parente2');
  var elem2 = strToElem2();
  parent2.appendChild(elem2);
  }


function addGOD(){


  var vezes = parseInt( Math.random() * (5 - 2) + 2)
for (i=0; i <= vezes - 1; i++ ){
  

  var selecao = parseInt( Math.random() * (100 - 0) + 0);

  if(selecao>=0 && selecao<=33){
    addLista('goblin','goblin.png');

  addButton();
  }else if(selecao>=34 && selecao<=66){

    addLista('orc','orc.png');
  addButton();
  }else{
    
    addLista('dragao','dragao.png');
  addButton();
  }

}

}
addGOD();


  


const track = document.querySelector('.carousel__track');
const slides = Array.from(track.children);
const nextButton= document.querySelector('.carousel__button--right');
const prevButton= document.querySelector('.carousel__button--left');
const dotsNav = document.querySelector('.carousel__nav');
const dots = Array.from(dotsNav.children);
const slideSize = slides[0].getBoundingClientRect();
const slideWidth = slideSize.width;

const setSlidePosition = (slide, index) =>{
    slide.style.left = slideWidth * index + 'px';
}
/* as bolinhas mostrarem a posição */
const updateDots = (currentDot, targetDot) =>{
    currentDot.classList.remove('current-slide');
targetDot.classList.add('current-slide');



}
/* apagar as setas dos cantos */

const hideShowArrows = (slides, prevButton, nextButton, targetIndex) =>{
    if(targetIndex === 0){
        prevButton.classList.add('is-hidden');
        nextButton.classList.remove('is-hidden');
    
    }else if (targetIndex === slides.length-1 ){
        prevButton.classList.remove('id-hidden');
        nextButton.classList.add('is-hidden');
    } else{
        prevButton.classList.remove('is-hidden');
        nextButton.classList.remove('is-hidden')
    }

   
}
/* posição dos slides */
slides.forEach(setSlidePosition);
/* mover os slides*/
const moveToSlide = (track, currentSlide, targetSlide) =>{
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
    
   
}



/* mexer pra frente */
nextButton.addEventListener('click', e =>{
   const currentSlide= track.querySelector('.current-slide');
   const nextSlide= currentSlide.nextElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide');
  const nextDot= currentDot.nextElementSibling;
  const nextIndex = slides.findIndex(slide=>slide === nextSlide);

  moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
   hideShowArrows(slides, prevButton, nextButton, nextIndex);

   

})
/* mexer pra trás */
prevButton.addEventListener('click', e =>{
    const currentSlide= track.querySelector('.current-slide');
   const prevSlide= currentSlide.previousElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const prevDot= currentDot.previousElementSibling;
   const prevIndex = slides.findIndex(slide=>slide === prevSlide);

   moveToSlide(track, currentSlide, prevSlide);
   updateDots(currentDot, prevDot);
   hideShowArrows(slides, prevButton, nextButton, prevIndex);
})



</script>
</body>

<!--


      <li class="carousel__slide">
      <a><img class ='carousel__images '  src='imagens/orc.png'></a>
      </li>
      <li class="carousel__slide">
      <a><img class ='carousel__images '  src='imagens/dragao.png'></a>
      </li>
      <li class="carousel__slide">
      <a><img class ='carousel__images '  src='imagens/dragao.png'></a>
      </li>


      <button class="carousel__indicator"></button>
<button class="carousel__indicator"></button>
<button class="carousel__indicator"></button>
<button class="carousel__indicator"></button>
 -->
</html>