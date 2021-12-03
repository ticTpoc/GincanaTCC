<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
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
#kevin{
    position: fixed;
    bottom:0px;
right:0px;
    width:800px;
    height:600px;
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
#titulo{
    position: fixed;
    text-align: center;
    text-shadow: 10px 2px 10px red;
    color:bisque;
    left:300px;
    top:0px;
    font-size: 80px;
    pointer-events: none;
    animation-name:descer;
    animation-duration: 7s;
}

@keyframes descer {
  0%   {top:100px}
  100% {top:400px}
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
<img class='hide' id='kevin' src="imagens/historia/kevin.png">
<img id = 'fundo'src="imagens/fundos/etec.png">

<div id='titulo'><h1>INSANIDADE</h1></div>

<div id='papo'>
...
Roteiro produzido por uma inteligencia artificial

</div>
<button class="hide" id="passar" onclick="passar()">Próxima</button>
<script type="text/javascript">

const titulo = document.getElementById("titulo");
const papo = document.getElementById("papo");
const fundo= document.getElementById("fundo");

const falas = ["Ele era um bebedor de uísque corajoso e articulado, com braços sujos e pernas escorregadias. Seus amigos o viam como um lindo, lindo de olhos azuis. Certa vez, ele até resgatou uma pessoa surda de um prédio em chamas. Esse é o tipo de homem que ele era.",
"Kevin foi até a janela e refletiu sobre os arredores do incêndio. A chuva martelava como sapos gritando.",
"Então ele viu algo ao longe, ou melhor, alguém. Era a figura do Vinicius Inhesta. Inhesta era uma preguiçosa dando com braços gordos e pernas frágeis.",
"Kevin engoliu em seco. Ele não estava preparado para Inhesta.",
"Quando Kevin saiu e Inhesta se aproximou, ele pôde ver o brilho válido em seus olhos.",
"Inhesta olhou com toda a fúria de 5597 velhas corujas brutais. Ele disse em voz baixa: 'Eu te odeio e quero matar'.",
"Kevin olhou para trás, ainda mais nervoso e ainda apalpando a lâmina afiada. 'Inhesta, você não terá JP', respondeu ele.",
"Eles se entreolharam com sentimentos de tristeza, como dois raros ratos vermelhos caminhando em um acidente muito controlador, que tinha música clássica tocando ao fundo e dois tios otimistas cantando no ritmo.",
"Kevin estudou os braços gordos e as pernas frágeis de Inhesta. Eventualmente, ele respirou fundo. 'Sinto muito', começou o Kevin em tom de desculpas, 'mas não sinto o mesmo, e nunca sentirei. Eu simplesmente não odeio você  Inhesta.'",
"Inhesta parecia calmo, suas emoções em carne viva como um chapéu horrível e faminto.",
"O Kevin podia realmente ouvir as emoções de Inhesta quebrando em 9075 pedaços. Em seguida, a doação preguiçosa se afastou rapidamente.",
"Nem mesmo um copo de uísque acalmaria os nervos da Kevin esta noite.",
"O FIM"];
var fase = 0;

setTimeout(function(){titulo.classList.add("hide")}, 2000); 
setTimeout(function(){
    papo.textContent='Kevin sempre amou a ETEC gratuita com suas árvores altas e talentosas. Era um lugar onde ele sentia raiva.'
    document.getElementById('kevin').classList.remove("hide")
    document.getElementById('passar').classList.remove("hide")
}, 2000); 



function passar(){
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
        document.getElementById('kevin').setAttribute("src","imagens/historia/kevin2.png")
        document.getElementById('uisque').classList.add("hide")
        document.getElementById('inhesta').classList.remove("hide");
        break;
        case 5:
            document.getElementById('inhesta').setAttribute("src","imagens/historia/inhestaputo.png")
        break;
        case 6:
            document.getElementById('kevin').setAttribute("src","imagens/historia/kevinputo.png")
        break;
        case 7:

        break;
        case 8:

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
    if(fase>12){

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
   
}
</script>
</body>

</html>