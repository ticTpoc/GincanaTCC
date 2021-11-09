
<html lang="pt-br">
<head>
<style>
    html{
        cursor:crosshair;
    }
    #corpomemoria{
        background-color:white;
        margin-left:0;
        height:90%;
       
    }
    .grid{
        display: flex;
        margin: auto;
        flex-wrap: wrap;
        height: 300px;
        width: 400px;
        
    }
    .botoes{
        position: fixed;
        height: 10%;
        width: 100%;
        background-color:white;
    }
    #end{
        width: 50%;
        text-align: center;
        line-height: 100px;
        font-size: 7rem;
        background-color: red;
        position: relative;
        float: left;
    }
    #next{
        text-align: center;
        line-height: 100px;
        font-size: 7rem;
        background-color: blue;
        position: relative;
        float: left;
        width: 50%;
    }
    </style>
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

$id= $_GET['id'];

?>  
<div id="corpomemoria"> 
    <h3>Score:<span id='result'></span></h3>
    <h3>Nivel:<span id='nivel'></span></h3>
<div class="grid">

</div>
</div>
<div class="botoes">
<div id="end" onclick="adeus()"> Finalizar </div>
<div id="next" onclick="passarFase()" class="hide"> Próxima fase </div>
</div>
</body>
<script type="text/javascript" defer>

function randomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
  }


  
    //tabuleiro
    const grid = document.querySelector('.grid');
    const resultDisplay = document.querySelector('#result');
    const nivelDisplay = document.querySelector('#nivel');
    var cardsChosen = [];
    var cardsChosenID = [];
    var cardsWon = [];
    const botaoEnd =  document.getElementById('end');
    var nivel = 1;
    console.log(nivel);
    const cartas = ['brasil',
    'coisa','emoji','estrela','ferramenta','minion','papa','pilula',
    'guardinha','mochilapong','seta','filosofo','campea','flipflop',
    'titi','kevin'];
    var cardArray =[];

function criarCartas(){


    for(var i = 0; i < nivel+4; i++){

var selecao = randomInt(0,cartas.length);
var carta = cartas[selecao];

    cardArray.push(
        {
    name: carta,
    img: 'imagens/memoria/'+carta+'.png'
    },
    {
    name: carta,
    img: 'imagens/memoria/'+carta+'.png'
    },
    )
}
}
    
     

     
    //criar o tabuleiro com loop



function createBoard(){

    criarCartas();

    cardArray.sort(() => Math.random() - 0.5);
        //botaoEnd.classList.add('hide');  
        for (let i= 0; i< cardArray.length; i++){

            
var card= document.createElement('img');
card.setAttribute('src', 'imagens/memoria/blank.png');
card.setAttribute('height', '100px');
card.setAttribute('width', '100px');
card.setAttribute('data-id', i);
card.addEventListener('click',flipCard);
grid.appendChild(card);

}

    }

    //checar iguais
function checkForMatch(){

    var cards = document.querySelectorAll('img');
const optionOneID = cardsChosenID[0];
const optionTwoID = cardsChosenID[1];



if(cardsChosenID[0] === cardsChosenID[1]){

    
    cards[optionOneID].setAttribute('src','imagens/memoria/blank.png'); 
    cardsChosenID= [];
    
}else{
    if(cardsChosen[0] === cardsChosen[1]){
    
    cards[optionOneID].setAttribute('src', 'imagens/memoria/white.png');
    cards[optionTwoID].setAttribute('src', 'imagens/memoria/white.png');

    cards[optionOneID].style.pointerEvents = 'none';
    cards[optionTwoID].style.pointerEvents = 'none';


    cardsWon.push(cardsChosen);

}else{
    cards[optionOneID].setAttribute('src','imagens/memoria/blank.png');  
    cards[optionTwoID].setAttribute('src','imagens/memoria/blank.png');
   
}
}

cardsChosen= [];
cardsChosenID= [];

// mostrar pontuação
resultDisplay.textContent = cardsWon.length*2;


// ao ganhar
// ta com um bug aqui que ele mostra o botão de próxima fase toda hora
console.log("cartas ganhas"+cardsWon.length);
console.log("cartas numero"+cardArray.length);
console.log("nivel"+nivel);
if(cardsWon.length*2 == cardArray.length){

document.getElementById('next').classList.remove('hide');
}
}

nivelDisplay.textContent= nivel;
//virar a cartas
function flipCard(){

    

        var cardID= this.getAttribute('data-id')
       
        cardsChosen.push(cardArray[cardID].name);
        cardsChosenID.push(cardID);
    
        this.setAttribute('src', cardArray[cardID].img);


        if( cardsChosen.length===2){

            setTimeout(checkForMatch, 500);
        }
    }
window.adeus = function() {
coin = cardsWon.length * 2;

var jogoid = <?php echo "$id;" ?>

window.location.href="loot.php?pontos="+coin+"&id="+jogoid;
}
window.passarFase = function() {
   
    cardsWon = [];
    document.getElementById('next').classList.add('hide');
cardArray =[]
    nivel++;
    nivelDisplay.textContent= nivel;
    console.log(nivel);
    grid.innerHTML = '';
  createBoard();
  

}


   
    createBoard();
    


 


</script>
</html>