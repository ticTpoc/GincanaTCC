/*

function intrandom(min,max){
    min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

function randomZero_One(){
    return Math.round(Math.random());
}

function randn_bm() {
    var u = 0, v = 0;
    while(u === 0) u = Math.random(); //Converting [0,1) to (0,1)
    while(v === 0) v = Math.random();
    return Math.sqrt( -2.0 * Math.log( u ) ) * Math.cos( 2.0 * Math.PI * v );
}

function algoritmo(min,max){

    var selecao = null;

   selecao = intrandom(min,max)+intrandom(min,max);


   return selecao;

    

}
*/
/*
if que faz a pessoa ganhar

if(cliques==i+1){
        ganhar();
        return;
                }

comandos que mexem o slide
 moveToSlide(track, currentSlide, nextSlide);
         updateDots(currentDot, nextDot);


código que calcula e adiciona as coins
 coin =parseInt( Math.random() * (15 - 4) + 4) + coin;
        document.getElementsByTagName("h5")[0].firstChild.data = "Moedas: " + coin;

conta os cliques 
cliques++;

tira a vida se falhar
vida--;
          return vida;

variaveis: mob, maxcoin, mincoin, chance de falhar; 

id varchar(10) not null primary key,
mincoin int not null,
maxcoin int not null,
chance int not null,
dano int not null


*/
/*

CÓDIGO PRA PASSAR AS VARIAVEL DE JAVASCRIPT PRA PHP E FAZER A
FESTA

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script type="text/javascript">

var dados = new FormData();
dados.append('nome', 'William');
dados.append('idade',17)

      $.ajax({
       url: 'response.php',
       method: 'post',
       data: dados, 
       processData: false,
       contentType: false,
       success: function(resposta){
         console.log(resposta);
       }
      })

     </script>


*/