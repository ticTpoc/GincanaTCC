<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Joguinhos</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>

/* alterar basicamente tudo */
body{
    
    background-color: rgb(26, 26, 26);
    color:rgb(103, 170, 86);
}
/* mudar os links */
a{
    text-decoration: none;
    color:rgb(103, 170, 86);
    background-color: white;
}
/* mudar botões */
button{
    background-color: rgb(189, 189, 189);
    border-left:none;
    border-top: none;
    border-right:none;
    border-bottom: solid 3px rgb(180, 180, 180);
    font-size: large;
}
/* mudar o efeito dos botões */
button:hover{
    border-bottom: none;
    margin-top:3px;
}

.center {
    margin: auto;
    width: 50%;
    text-align: center;
    padding: 10px;
    }

.dungeon{
    border: 6px solid rgb(248, 248, 248);
 
}

.hide{
    display: none;
}

div#vida{
    float:left;
    width: 50%;
}

div#etapa{
    float:right;
    width: 50%;
}

td, tr{
    padding: 10px;
   border: 2px solid rgb(168, 25, 25);  
}

img.tabela{
    height:100px;
    width: 100px;
}

img.highlight{
    border: 4px solid yellow;
}

img.absoluta{
    position: absolute;
    top:0px;
    left:0px;
}

img.relativa{
    position: relative;
    top:0px;
    left:0px;
}

.ataques{
    position:relative;
    top:0px;
    left:0px;
}
        </style>
</head>
<body>
 


 <div class="dungeon center"> 

    <div id="inventario" class="inventario center">
        <div>
            <table class="tabela center" >
    <div >
        <tr class="espadas"><td><img id="espadabosta" class = " espada tabela" onclick="selecionarEspada('espadabosta')"  valor="1" src="imagens/itens/espadabosta.png"></td>
            <td ><img  id="espadaferro"  class = "espada tabela" onclick="selecionarEspada('espadaferro')" valor="4"   src="imagens/itens/espadaferro.png"></td>
            <td  ><img id="espadaouro" class = "espada tabela" onclick="selecionarEspada('espadaouro')" valor="8"  src="imagens/itens/espadaouro.png"></td></tr>
        </div>           
                
        <tr><td><img id="escudobosta" class = "tabela escudo" onclick="selecionarEscudo('escudobosta')" valor="10"   src="imagens/itens/escudobosta.png"></td>
            <td><img  id="escudoheroi" class = "tabela escudo" onclick="selecionarEscudo('escudoheroi')" valor="20" src="imagens/itens/escudoheroi.png"></td>
            <td><img  id="escudolendario" class = "tabela escudo" onclick="selecionarEscudo('escudolendario')" valor="30"  src="imagens/itens/escudolendario.png"></td></tr>
                
            </table>
        </div>
    </div>
        

     <div id="jogo" class="jogo hide">
        <div id="legenda" class="center">
            <div id="vida"> <p id="vida"> Vida</p></div>
          <div id="etapa"> <p id = "etapa">Etapa</p></div>
          <div id="nivel"> <p id = "nivel">nivel</p></div>
          
        </div>
       <div id="inimigo" class="center ataques">
          
           <p id="textoInimigo" class="hide"></p>
           <div id='ataques'>
            </div>
    </div>
    
       <div id="iniciar" class="center">
           <button id="botaoIniciar"> Iniciar </button>
          
       </div>  
       <div  id="legenda" class="center"> 
           <p id="nomeInimigo">Nome</p>
        <p id="infoInimigo"> Informações foda </p>
       </div>
       <div id="acoes" class="center"> 
       <button id="atacar">Atacar</button>
       <button id="fugir">Fugir</button>
       <button id="defender">Defender</button><button id='textoDefender' class="hide"></button>
       </div>
     </div>
     

 
       
    </div>
<script type="text/javascript">

// funções
function add_img() { 
	var img = document.createElement('img'); 
    img.src = 'imagens/animacao/ataque.gif'; 
    img.id='ataque';
    img.classList.add('absoluta');
    console.log("ataque feito");
	document.getElementById('inimigo').appendChild(img);
}

function remove_img(){

    console.log("ataque removido");
    var img = document.getElementById("ataque");
  
  img.parentNode.removeChild(img);
}

function randomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
  }

  
function criarInimigo(mob, boss){
   
    var inimigo = document.createElement("img");
inimigo.setAttribute('src', "imagens/inimigos/"+mob);
inimigo.setAttribute('height', '300px');
inimigo.setAttribute('alt',mob);
inimigo.setAttribute('id', 'atual');
if(boss==1){
inimigo.setAttribute('tipo','boss');
}
inimigo.setAttribute('class', 'relativa');
inimigo.setAttribute('width', '300px');
const divInimigo= document.getElementById('inimigo');
divInimigo.appendChild(inimigo);

}

function criarRodada(nivel){
    for(var i=0; i<nivel; i++){
var selecao = randomInt(0, inimigos.mobs.length);
rodada.push(inimigos.mobs[selecao]);
}
}

function iniciarJogo(){

if(document.getElementById("ataque")!=null){
    remove_img();
}

    vida = vidamaxima;
    textoInimigo.classList.add('hide');
    infoVida.innerHTML = "vida:"+vida;
    divAtacar.classList.remove('hide');
divFugir.classList.remove('hide');
divDefender.classList.remove('hide');
   iniciar.classList.add('hide');
   criarRodada(nivel);
 
   var boss = randomInt(0,11);
  
   criarInimigo(rodada[etapa],boss);
   
   var inimigoAtual = document.getElementById('atual');
   var mobAtual = inimigoAtual.getAttribute('alt');
   infoInimigo.innerHTML = "vida:"+pegarVida(mobAtual);
   nomeInimigo.innerHTML = "nome:"+mobAtual.replace('.png','');
   infoEtapa.innerHTML = "etapa:"+etapa;
   infoNivel.innerHTML = "nivel:"+nivel;
 


    

}

function reiniciarJogo(){

    const inimigoAtual = document.getElementById('atual');
    ataques= 0;
    etapa = 0;
    vidaAtualInimigo = null;
    rodada = [];
    divInimigo.removeChild(inimigoAtual);
    iniciar.classList.remove('hide');
    divAtacar.classList.add('hide');
    divFugir.classList.add('hide');
    iniciar.textContent= "reiniciar";

}
function selecionar(){


}

function selecionarEspada(valor){

const espadas = document.querySelectorAll(".espada");
for (var i = 0; i < espadas.length; i++) {
    espadas[i].classList.remove('highlight');
    
}
var espadaAtual = document.getElementById(valor);
ataque = espadaAtual.getAttribute('valor');
    espadaAtual.classList.add('highlight');

    console.log(ataque);

    if((escudo!=0)&&(ataque!=0)){
        document.getElementById('jogo').classList.remove('hide');
        document.getElementById('inventario').classList.add('hide');

}

}

function selecionarEscudo(valor){

const escudos = document.querySelectorAll(".escudo");
for (var i = 0; i < escudos.length; i++) {
escudos[i].classList.remove('highlight');
}
var escudoAtual = document.getElementById(valor);

escudo = escudoAtual.getAttribute('valor');
escudoAtual.classList.add('highlight');

if((escudo!=0)&&(ataque!=0)){
   document.getElementById('jogo').classList.remove('hide');
   document.getElementById('inventario').classList.add('hide');
}


}

function pegarNome(mob){
    for(var i=0; i<inimigos.mobs.length; i++){
 
    if(inimigos.mobs[i]==mob){
        vidaInimigo = inimigos.vidas[i];
       
        return vidaInimigo;
    }
    }
}

function pegarVida(mob){
    for(var i=0; i<inimigos.mobs.length; i++){
 
    if(inimigos.mobs[i]==mob){
        vidaInimigo = inimigos.vidas[i];
       
        return vidaInimigo;
    }
    }
}

function pegarDanoMinimo(mob){
    for(var i=0; i<inimigos.mobs.length; i++){
 
    if(inimigos.mobs[i]==mob){
        dano = inimigos.danomin[i];
       
        return dano;
    }
    }
}
function pegarDanoMaximo(mob){
    for(var i=0; i<inimigos.mobs.length; i++){
 
    if(inimigos.mobs[i]==mob){
        dano = inimigos.danomax[i];
       
        return dano;
    }
    }
}

function ganhar(){

    
    nivel++;
    reiniciarJogo();

}

function morrer(mob){
    const textoInimigo = document.getElementById('textoInimigo');
    textoInimigo.classList.remove('hide');
    textoInimigo.innerHTML= "você morreu para "+mob.replace('.png','');
    reiniciarJogo();
}

function matar(){

    
   ataques = 0;
    etapa++;
    infoEtapa.innerHTML = "etapa:"+etapa;
   
  

    var inimigoAtual = document.getElementById('atual');
    divInimigo.removeChild(inimigoAtual);
    var boss = randomInt(0,11);
    criarInimigo(rodada[etapa],boss);
   
    var inimigoAtual = document.getElementById('atual');
    multiplicador = 1;
    if(inimigoAtual.getAttribute('tipo')=="boss"){
        
        alert("boss");
        multiplicador = randomInt(nivel,nivel*nivel);
    }
    var mobAtual = inimigoAtual.getAttribute('alt');
 
   
    
    
    var vidaInimigo = pegarVida(mobAtual)+multiplicador;
    infoInimigo.innerHTML = "vida:"+vidaInimigo;
    nomeInimigo.innerHTML = "nome:"+mobAtual.replace('.png','');

    if(etapa==rodada.length){
    ganhar();
    }

}

function atacar(){

    add_img();
   
  
    console.log(rodada.length);


    var inimigoAtual = document.getElementById('atual');





    console.log("multiplicador:"+multiplicador)
    var mobAtual = inimigoAtual.getAttribute('alt');
    var vidaInimigo = pegarVida(mobAtual);
    var danoDado = 0;

    ataques++;

    danoDado= ataque * ataques;

    var vidaAtualInimigo = vidaInimigo + multiplicador - danoDado;
   
    infoInimigo.innerHTML = "vida:"+vidaAtualInimigo;

    setTimeout(function(){ remove_img()}, 1000);
    if(vidaAtualInimigo<=0){

        
        matar();
        
    }

    danoInimigo= randomInt(pegarDanoMinimo(mobAtual),pegarDanoMaximo(mobAtual)) * multiplicador;
  

    if((defesa>0)&&(defesa!=null)){
        defesa = defesa - danoInimigo;
        textoDefender.innerHTML = defesa;


    }else{
        textoDefender.classList.add('hide');

        vida = vida - danoInimigo ;
    }
    

    if(vida<=0){

       morrer(mobAtual);
    }
    infoVida.innerHTML = "vida:"+vida;
    
}
function defender(){

    defesa = escudo;
    divDefender.classList.add('hide');
    textoDefender.classList.remove('hide');
    textoDefender.innerHTML= defesa;
    textoDefender.style.pointerEvents = "none";
    
    

}

function fugir(){

var inimigoAtual = document.getElementById('atual');
var mobAtual = inimigoAtual.getAttribute('alt');
var vidaInimigo = pegarVida(mobAtual);

var fuga = randomInt(1,3);
if(fuga==2){
    matar();
}else{
    morrer(mobAtual);
}

if(vida<=0){

   morrer(mobAtual);
}


}
// variaveis e constantes


const textoDefender = document.getElementById('textoDefender');
const infoInimigo = document.getElementById('infoInimigo');
const textoInimigo = document.getElementById('textoInimigo');
const iniciar= document.getElementById('botaoIniciar');
const divLegenda = document.getElementById('legenda');
const divAtacar = document.getElementById('atacar');
const divFugir = document.getElementById('fugir');
const divDefender = document.getElementById('defender');
const divAcoes = document.getElementById('acoes');
const divInimigo = document.getElementById('inimigo');
const nomeInimigo = document.getElementById('nomeInimigo');
const infoVida= document.getElementById('vida');
const infoEtapa= document.getElementById('etapa');
const infoNivel = document.getElementById('nivel');




const inimigos= { mobs:["goblin.png","orc.png","dragao.png","kevin.png","ogro.png","elfo.png","unicornio.png"],
 danomin:[0,2,3,1,1,0,10],
 danomax:[3,5,6,21,5,2,50],
 vidas:[2,3,5,7,4,1,13]}

const vidamaxima = 1000;

var vida = 100;

var defesa = null;

var escudo = 0;

var nivel = 1;

var danoInimigo = null;

var etapa = 0;

var selecao = randomInt(0, inimigos.mobs.length);

var  ataques = 0;

var ataque = 1;

var rodada = [];

var multiplicador = 1;

  
// jogo 
divAtacar.classList.add('hide');
divFugir.classList.add('hide');
divDefender.classList.add('hide');

//botôes


iniciar.addEventListener('click', iniciarJogo);
divAtacar.addEventListener('click', atacar);
divFugir.addEventListener('click', fugir);
divDefender.addEventListener('click', defender);


// extras para casos de emergencia


/*
const espadabosta = document.getElementById('espadabosta');
const espadaferro = document.getElementById('espadaferro');
const espadaouro = document.getElementById('espadaouro');
const escudobosta = document.getElementById('escudobosta');
const escudoheroi = document.getElementById('escudoheroi');
const escudolendario = document.getElementById('escudolendario');*/

</script>

</body>
</html>