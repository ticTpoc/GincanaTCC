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

$reg = $busca->fetch_object();


?>  


 <div id="corpo">


 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/funcao.js">
</script>
   <script type="text/javascript">

var vida = "<?php echo $reg->vida?>";
var nivel = 1;
var coin = 0;
var cliques = 1;



function algoritmo(){

/* quantidade de mobs, deve corresponder ao array mobs */
var qtdmobs = 9;

/* todos os mobs possiveis */
var mobs= ['unicornio','dragao','ogro','anao','goblin','elfo','orc','poseidon','marcella'];




/* algoritmo que seleciona numeros aleatórios */
var selecao = Math.round((parseInt((Math.random()*10))+parseInt((Math.random()*10)))/2);


/* caso a seleção seja igual a quantidade de mobs, pois o array conta a partir do 0 */
if(selecao===qtdmobs){
    selecao=qtdmobs-1;
}
/* adiciona a seleção na viariavel mob, a partir de mobs */
var mob = mobs[selecao];

/* caso de erro */
if(mob === null){
    alert("erro no mob");
}
/*só pra mostrar + extras */
return mob;
}


     function mobatacar(inimigo){

        var mob = new FormData();
        mob.append('mob', inimigo);

        $.ajax({
            url:'script.php',
            method: 'post',
            data: mob,
            processData: false,
            contentType:false,
            success: function(resposta){

                     var tmp = resposta.split(",");
                     var mincoin = tmp[0];
                     var maxcoin = tmp[1];
                     var dano = tmp[2];
                     var chance = tmp[3];
                     var dado = parseInt( Math.random() * (100 - 0) + 0);
                  
  const currentSlide= track.querySelector('.current-slide');
   const nextSlide= currentSlide.nextElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide');
  const nextDot= currentDot.nextElementSibling;
  const nextIndex = slides.findIndex(slide=>slide === nextSlide);

                     if(dado>chance){

                        if(cliques==i+1){
                         ganhar();
                         return;
                                   }
                        
                     coin = getRandomInt(mincoin,maxcoin) + coin;
                    document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;

                     moveToSlide(track, currentSlide, nextSlide);
                      updateDots(currentDot, nextDot);
                      
                    cliques++;
                     }else{
                        vida = vida - getRandomInt(1,dano);
                        return vida;
                     }      
                     
                 }
        })

       
     }



function fugir(){

const currentSlide= track.querySelector('.current-slide');
 const nextSlide= currentSlide.nextElementSibling;
const currentDot = dotsNav.querySelector('.current-slide');
const nextDot= currentDot.nextElementSibling;
const nextIndex = slides.findIndex(slide=>slide === nextSlide);
var z = slides.findIndex(slide=>slide === currentSlide);
var x = document.getElementsByClassName("carousel__images")[z].id;
document.getElementById("vida").innerHTML = "vida: "+ vida;

console.log(vida);
if(vida <= 0 ){
  morreu("você morreu, se mata");
}
if(cliques==i+1){
  ganhar();
  return;
          }


hideShowArrows(slides, prevButton, nextButton, nextIndex);

var chance = parseInt( Math.random() * (100 - 0) + 0);

if(chance>50){
 
moveToSlide(track, currentSlide, nextSlide);
 updateDots(currentDot, nextDot);
 cliques++;
 return;
}else{
   
  morreu("você morreu, se mata");
}

}


function atacar(){
  const currentSlide= track.querySelector('.current-slide');
   const nextSlide= currentSlide.nextElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide');
  const nextDot= currentDot.nextElementSibling;
  const nextIndex = slides.findIndex(slide=>slide === nextSlide);
  var z = slides.findIndex(slide=>slide === currentSlide);
  var x = document.getElementsByClassName("carousel__images")[z].id;
  

  document.getElementById("vida").innerHTML = "vida: "+ vida;
  hideShowArrows(slides, prevButton, nextButton, nextIndex);

 
  if(vida <= 0 ){
  morreu("você morreu, se mata");
}


mobatacar(x);


}

function loot(){
  window.location.href="loot.php?coin="+coin;
}


function morreu(mensagem){
  window.location.href="morto.php?mensagem="+mensagem;
}
function ganhar(){
 

  const listItem = document.querySelector("button#atacar");
  const newItem = document.createElement('button');
newItem.innerHTML = '<button class="actions__button" id="atacar" onclick="loot()"><a >LOOT</a></button>';
listItem.parentNode.replaceChild(newItem, listItem);
}


   </script>
  
<br>
<br>
<div id="vida">
 <p id="vida"></p>
</div>

<h5>
  moedas
</h5>
<h6>
  nivel
  <h6>
<div class='carousel'>
  <button class=" carousel__button--left is-hidden"><img src='imagens/left.png' alt=''></button>
  <div class="carousel__track-container">
    <ul class="carousel__track" id="parente">
    <li class="carousel__slide current-slide">
      <a><img id='goblin' class ='carousel__images' src='imagens/inimigos/goblin.png'></a>
      </li>
      

     
     
    </ul>
    </div>
  <button class=" carousel__button--right"><img src='imagens/right.png' alt=''></button>
<div class='actions__nav'>
  <button class='actions__button' id="atacar" onclick="atacar()"><a >ATACAR</a></button>
  <button class='actions__button' onclick="fugir()"><a><img src='imagens/fuga.png'></a></button>
</div>
<div class="carousel__nav" id='parente2'>
<button class="carousel__indicator current-slide"></button>


</div>



</div>
      

<?php  include_once "footer.php"; ?>
</div>
<script type="text/javascript" src='js/carousel.js'></script>

</body>
<script>



function algoritmo(){

/* quantidade de mobs, deve corresponder ao array mobs */


/* todos os mobs possiveis */
var mobs= ['unicornio','dragao','ogro','anao','goblin','elfo','orc','poseidon','marcella'];

var qtdmobs = mobs.length;


/* algoritmo que seleciona numeros aleatórios */
var selecao = Math.round((parseInt((Math.random()*10))+parseInt((Math.random()*10)))/2);


/* caso a seleção seja igual a quantidade de mobs, pois o array conta a partir do 0 */
if(selecao===qtdmobs){
    selecao=qtdmobs-1;
}
/* adiciona a seleção na viariavel mob, a partir de mobs */
var mob = mobs[selecao];

/* caso de erro */
if(mob === null){
    alert("erro no mob");
}
/*só pra mostrar + extras */
return mob;
}




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

  function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

function addGOD(){


  const nivel = <?php echo $reg->nivel ?>;
  document.getElementsByTagName("h6")[0].firstChild.data = "nivel: " + nivel;
   var max =  Math.round(nivel+(nivel/4)); 
   var min =  nivel;

   console.log("maximo:"+max);
   console.log("minimo:"+min);
  
  var vezes = getRandomInt(min,max);
  console.log(vezes);

for (i=0; i <= vezes - 1; i++ ){
  
var mob = algoritmo();
  addLista(mob,mob+'.png');
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

</html>