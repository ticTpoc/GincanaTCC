<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>A HISTÓRIA</title>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>


html{
    background-color: black;
}
.hide{
    display: none;
}
img{
width:100%;
margin-bottom: 0px;
}
#papo{
    position:fixed;
    color:blanchedalmond;
    font-size:30px;
    height:100px;
    width:100%;
    bottom:0px;
    background-color:black;
}
#passar{
    position: fixed;
    right:0px;
    bottom:0px;
}
#creditos{
    position: fixed;
    left:0px;
   bottom:0px;
  
}
#creditos{
    font-size: 20px;
    background-color: black;
    color:white;
   width:125px;
   height:50px;
}
#kevin{
    position: fixed;
    bottom:0px;
right:0px;
    width:800px;
    height:600px;
}
#kevin2{
    position: fixed;
    bottom:0px;
right:0px;
    width:800px;
    height:600px;
    
}
.esquerda{
    animation-name:esquerda;
    animation-duration: 6s;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
}
#inhesta{
    position: fixed;
    bottom:0px;
left:0px;
    width:800px;
    height:600px;
   
}

#uisque{
    position: fixed;
    bottom:0px;
right:300px;
    width:800px;
    height:600px;
}
@keyframes esquerda {
  from  {right:-1000px;}
  to {right:0px;}
}



#titulo{
    position: fixed;
    text-align: center;
    text-shadow: 10px 2px 10px red;
    color:black;
    left:300px;
    top:0px;
    font-size: 80px;
    pointer-events: none;
    animation-name:descer;
    animation-duration: 11s;
}

@keyframes descer {
  0%   {top:100px}
  100% {top:400px}
}

.escolha1{
    position: fixed;
    bottom:25px;
    left:400px;
    background-color:lightcoral;
    height:50px;
    width:100px;
}
.escolha2{
    position: fixed;
    bottom:25px;
    right:400px;
    background-color:lightgreen;
    height:50px;
    width:100px;
}

</style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

?>  
<img  class='hide'  id='uisque' src="imagens/historia/uisque.png">
<img class='hide' id='inhesta' src="imagens/inimigos/boss/inhesta.png">
<img class='hide' id='kevin2' src="imagens/historia/kevin2.png">
<img class='hide' id='kevin' src="imagens/historia/kevin.png">
<img id = 'fundo'src="imagens/fundos/etec.png">

<div id='titulo'><h1>INSANIDADE</h1></div>

<div id='papo'>
...
Roteiro produzido por uma inteligencia artificial<br>
Jogo feito em 6 horas de uma sexta<br>
Direitos autorais concebidos pelos integrantes

</div>
<button  onclick = "passar('bad')" class="hide escolha1" id='escolha1'></button>
<button  onclick = "passar('bom')" class="hide escolha2" id="escolha2"></button>
<button class="hide" id="passar" onclick="passar()">Próxima</button>
<div class= "hide" id="creditos"><a href="creditos.php"><button id="creditos">Créditos</button></a></div>
<script type="text/javascript">

const titulo = document.getElementById("titulo");
const papo = document.getElementById("papo");
const fundo= document.getElementById("fundo");
const escolha1 = document.getElementById("escolha1");
const escolha2 = document.getElementById("escolha2");

const falas = ["Ele era um bebedor de uísque corajoso e articulado, com braços sujos e pernas escorregadias. Seus amigos o viam como um lindo, lindo de olhos azuis. Certa vez, ele até resgatou uma pessoa surda de um prédio em chamas. Esse é o tipo de homem que ele era.",
"Kevin foi até a janela e refletiu sobre os arredores do incêndio. A chuva martelava como sapos gritando.",
"Então ele viu algo ao longe, ou melhor, alguém. Era a figura do Vinicius Inhesta. Inhesta era uma preguiçosa dando com braços gordos e pernas frágeis.",
"Kevin engoliu em seco. Ele não estava preparado para Inhesta.",
"Quando Kevin saiu e Inhesta se aproximou, ele pôde ver o brilho válido em seus olhos.",
"Inhesta olhou com toda a fúria de 5597 velhas corujas brutais. Ele disse em voz baixa: 'Eu te odeio e quero matar'.",
"Kevin olhou para trás, ainda mais nervoso e ainda apalpando a lâmina afiada. 'Inhesta, você não terá JP', respondeu ele.",
"Eles se entreolharam com sentimentos de tristeza, como dois raros ratos vermelhos caminhando em um acidente muito controlador, que tinha música clássica tocando ao fundo e dois tios otimistas cantando no ritmo.",
"A escolha é sua: ",
"Inhesta parecia calmo, suas emoções em carne viva como um chapéu horrível e faminto.",
"O Kevin podia realmente ouvir as emoções de Inhesta quebrando em 9075 pedaços. Em seguida, a doação preguiçosa se afastou rapidamente.",
"Nem mesmo um copo de uísque acalmaria os nervos da Kevin esta noite.",
"O FIM"];
var fase = 0;

setTimeout(function(){titulo.classList.add("hide")}, 10000); 
setTimeout(function(){
    papo.textContent='Kevin sempre amou a ETEC gratuita com suas árvores altas e talentosas. Era um lugar onde ele sentia raiva.'
    document.getElementById('kevin').classList.remove("hide")
    document.getElementById('passar').classList.remove("hide")
}, 10000); 



function passar(ocorrido){

    if(ocorrido == null){
        switch(fase){
        case 0: 
        document.getElementById("uisque").classList.remove("hide");
        break;
        case 1:
            fundo.setAttribute("src","imagens/historia/sapos.png")
            break;
        case 2:
        fundo.setAttribute("src","imagens/historia/inhesta.png")
        break;
        case 4:
        fundo.setAttribute("src","imagens/fundos/etec.png")
        document.getElementById('kevin').classList.add("hide")
        document.getElementById('uisque').classList.add("hide")
        document.getElementById('inhesta').classList.remove("hide");
        document.getElementById('kevin2').classList.remove("hide");
        document.getElementById('kevin2').classList.add("esquerda");
        break;
        case 5:
            document.getElementById('inhesta').setAttribute("src","imagens/historia/inhestaputo.png")
            var audio = new Audio('SoundTrack/inhestaudio1.ogg');
            audio.play();
            setTimeout(function(){
                var audio = new Audio('SoundTrack/nani.ogg');
            audio.play();
            },4000)
            
        break;
        case 6:
            document.getElementById('kevin2').setAttribute("src","imagens/historia/kevinjojo.png")
            var audio = new Audio('SoundTrack/kevinfala.ogg');
            audio.play();
        break;
        case 7:
            var audio = new Audio('SoundTrack/classica.mp3');
            audio.play();
            setTimeout(function(){audio.pause()}, 60000);
        break;
        case 8:
        /*   var matar = document.createElement('BUTTON');
           matar.innerHTML="Ficar Doidão";
           matar.classList.add('escolha1');
           var poupar = document.createElement('button');
           poupar.innerHTML="Ficar de boa";
           poupar.classList.add('escolha2');
           document.body.appendChild(matar);
           document.body.appendChild(poupar);*/
           escolha1.classList.remove("hide")
           escolha2.classList.remove("hide")
           escolha1.innerHTML="Ficar doidão";
           escolha2.innerHTML="Ficar de boa"
           document.getElementById('passar').classList.add("hide");
           papo.textContent="";
             fundo.setAttribute("src",'imagens/historia/etecevil.png');
        break;
        case 9:
            
        break;
        case 10:

        break;
        case 11:

        break;
        case 12:

        break;
       
       
        
    }
    if(fase>8){

//<a id='linkzin' class="hide" href="https://www.plot-generator.org.uk/story/">Site gerador de roteiros</a>
linkzin = document.createElement("a");
linkzin.setAttribute("href",'https://www.plot-generator.org.uk/story/')
linkzin.setAttribute("target",'blank')
linkzin.textContent="Site gerador de roteiros";
papo.textContent="";
papo.appendChild(linkzin);

        }else{
            papo.textContent=falas[fase]+fase;
    fase++;
        }
    }else {
        escolha1.classList.add("hide");
        escolha2.classList.add("hide");
switch(ocorrido){
    case 'bad':
        escolha1.classList.add("hide");
        papo.textContent="Kevin mata o pobre Inhesta com sua lâmina mortífera";
        fundo.setAttribute("src","imagens/animacao/bad.gif")
        document.getElementById("kevin").classList.add("hide");
        document.getElementById("kevin2").classList.add("hide");
            document.getElementById("inhesta").classList.add("hide");
            document.getElementById("creditos").classList.remove("hide");
        
        break;
        case 'bom':
            document.getElementById("kevin").classList.add("hide");
            document.getElementById("kevin2").classList.add("hide");
            document.getElementById("inhesta").classList.add("hide");
          fundo.setAttribute("src","imagens/historia/good.png")
            papo.textContent="Kevin e Inhesta se tornam um lindo casal feliz e passam o resto da sua vida em Ibiza";
            document.getElementById("creditos").classList.remove("hide");
            break;
            default:
                papo.textContent="  A membrana da realidade foi corrompida e não sobrou nada além de sofrimento e dor";

}

    }
    
    
   
}
</script>
</body>

</html>