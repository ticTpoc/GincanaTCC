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
<script type='text/javascript'>



var coin = 0;


function goblin() {
    coin =parseInt( Math.random() * (10 - 0) + 0);
  console.log(coin);
  document.getElementsByTagName("h3")[0].firstChild.data = "Moedas: " + coin;
  document.getElementById("goblin").style.display = "none";
  
}
<<<<<<< Updated upstream
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
 
=======



  switch(x) {
  case 'orc':
   if(chance<45){
    if(cliques==i+1){
  ganhar();
  return;
          }
    console.log(chance);
    coin =parseInt( Math.random() * (50 - 30) + 30) + coin;
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;


    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
   
   cliques++;

   
 return;
   }else{
    
    vida--;
    return vida;
   }
    break;
  case 'goblin':
    if(chance<70){
      if(cliques==i+1){
  ganhar();
  return;
          }
      
      coin =parseInt( Math.random() * (4 - 1) + 1) + coin;
  
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
      
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
  
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }
    break;
    case 'dragao':
      if(chance<30){
        if(cliques==i+1){
  ganhar();
  return;
          }
        
        coin =parseInt( Math.random() * (30 - 10) + 10) + coin;
 
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
        
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }
    break;
    case 'anao':
    if(chance<80){
      if(cliques==i+1){
  ganhar();
  return;
          }
     
      coin =parseInt( Math.random() * (5 - 0) + 0) + coin;
  
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
      
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
  
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }  
   break;
   case 'elfo':
    if(chance<60){
      if(cliques==i+1){
  ganhar();
  return;
          }
     
      coin =parseInt( Math.random() * (10 - 5) + 5) + coin;
  
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
      
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
  
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }  
   break;
   case 'marcella':
    if(chance<22){
      if(cliques==i+1){
  ganhar();
  return;
          }
     
      coin =parseInt( Math.random() * (1 - 0) + 0) + coin;
  
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
      
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
  
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }  
   break;
   case 'ogro':
    if(chance<50){
      if(cliques==i+1){
  ganhar();
  return;
          }
     
      coin =parseInt( Math.random() * (40 - 0) + 0) + coin;
  
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
      
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
  
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }  
   break;
   case 'poseidon':
    if(chance<10){
      if(cliques==i+1){
  ganhar();
  return;
          }
     
      coin =parseInt( Math.random() * (150 - 100) + 100) + coin;
  
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
      
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
  
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }  
   break;
   case 'unicornio':
    if(chance<33){
      if(cliques==i+1){
  ganhar();
  return;
          }
     
      coin =parseInt( Math.random() * (500 - 0) + 0 ) + coin;
  
  document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;
      
    moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
  
   cliques++;
 return;
   }else{
    
    vida--;
    return vida;
   }  
   break;
    default:
    alert('erro');
  
  
  
}  

console.log(algoritmo(5));
>>>>>>> Stashed changes
}
function loot(){
var loot = coin + coin2 + coin3;
    window.location.href="loot.php?coin=" + loot;
}
</script>
 <div id="corpo">
     <h1> Dungeon </h1><br><br>
     <h3>moedas</h3>
     <h4>moedas</h4>
     <h5>moedas</h5>
     <table class="loja">
     <tr><td><a onclick="goblin()"><img  height='200px' width='200px' src='imagens/goblin.png' id='goblin' ></a><br><br>
     <td><a onclick="orc()"><img height='200px' width='200px' src='imagens/orc.png' id='orc' ></a><br><br>
     <tr><td><a onclick="dragao()"><img height='200px' width='200px' src='imagens/dragao.png' id='dragao' ></a><br><br>
     <tr><td><button onclick="loot()" ><p>loot</p></button>



<<<<<<< Updated upstream
=======
<h5>
  moedas
</h5>
<div class='carousel'>
  <button class=" carousel__button--left is-hidden"><img src='imagens/left.png' alt=''></button>
  <div class="carousel__track-container">
    <ul class="carousel__track" id="parente">
    <li class="carousel__slide current-slide">
      <a><img id='goblin' class ='carousel__images' src='imagens/inimigos/goblin.png'></a>
      </li>
>>>>>>> Stashed changes
      
       


</table>


     <?php  include_once "footer.php"; ?>


</div>
<<<<<<< Updated upstream
</body>
=======
      
 
<?php  include_once "footer.php"; ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src='js/carousel.js'></script>

</body>
<script>






function strToElem(god,imagem){
    var temp = '<li class="carousel__slide"><a><img id='+god+' class="carousel__images" src='+imagem+'></a></li>';
    var a = document.createElement("p");
    a.innerHTML = temp;
    return a.childNodes[0];
  }

  function addLista(god,imagem){
    var parent = document.getElementById('parente');
  var elem = strToElem(god,'imagens/inimigos/'+imagem);
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

  
console.log("<?php mobarray(5); ?>");
function addGOD(){


  var vezes = parseInt( Math.random() * (5 - 2) + 2);
  
for (i=0; i <= vezes - 1; i++ ){
  

  var inimigo = "<?php  ?>";
 
    addLista(inimigo, inimigo +'.png');
    addButton();

    
}
console.log(i+1);
return i + 1;

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


const Dolly = null;

}
/* apagar as setas dos cantos */

const hideShowArrows = (slides, prevButton, nextButton, targetIndex) =>{
    if(targetIndex === 0){
       
        nextButton.classList.remove('is-hidden');
    
    }else if (targetIndex === slides.length-1 ){
       
        nextButton.classList.add('is-hidden');
    } else{
       
        nextButton.classList.remove('is-hidden')
    }

    nextButton.classList.remove('is-hidden')
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
>>>>>>> Stashed changes

</html>