
<html lang="pt-br">
<head>
<style>
    #corpomemoria{
        background-color:white;
        margin-left:0;
        height:100%;
    }
    .grid{
        display: flex;
        flex-wrap: wrap;
        height: 300px;
        width: 400px;
        
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
<div class="grid">

</div>
<button id="end" onclick="adeus()"> Finalizar </button>
</div>

</body>
<script type="text/javascript" defer>

document.addEventListener('DOMContentLoaded', () => {


    const cardArray=[
        {
            name: 'brasil',
            img: 'imagens/memoria/brasil.png'
        },
        {
            name: 'coisa',
            img: 'imagens/memoria/coisa.png'
        },
        {
            name: 'emoji',
            img: 'imagens/memoria/emoji.png'
        },
        {
            name: 'minion',
            img: 'imagens/memoria/minion.png'
        },
        {
            name: 'papa',
            img: 'imagens/memoria/papa.png'
        },
        {
            name: 'pilula',
            img: 'imagens/memoria/pilula.png'
        },
        // a partir daqui repetir
        {
            name: 'brasil',
            img: 'imagens/memoria/brasil.png'
        },
        {
            name: 'coisa',
            img: 'imagens/memoria/coisa.png'
        },
        {
            name: 'emoji',
            img: 'imagens/memoria/emoji.png'
        },
        {
            name: 'minion',
            img: 'imagens/memoria/minion.png'
        },
        {
            name: 'papa',
            img: 'imagens/memoria/papa.png'
        },
        {
            name: 'pilula',
            img: 'imagens/memoria/pilula.png'
        },
        {
            name: 'estrela',
            img: 'imagens/memoria/estrela.png'
        },
        {
            name: 'estrela',
            img: 'imagens/memoria/estrela.png'
        },
        {
            name: 'ferramenta',
            img: 'imagens/memoria/ferramenta.png'
        },
        {
            name: 'ferramenta',
            img: 'imagens/memoria/ferramenta.png'
        },
    ]

    


    //tabuleiro
    const grid = document.querySelector('.grid');
    const resultDisplay = document.querySelector('#result');
    var cardsChosen = [];
    var cardsChosenID = [];
    var cardsWon = [];
    const botaoEnd =  document.getElementById('end');



    console.log(grid);

     
    //criar o tabuleiro com loop

cardArray.sort(() => Math.random() - 0.5);

    function createBoard(){

        botaoEnd.classList.add('hide');  
        for (let i= 0; i< cardArray.length; i++){

            
var card= document.createElement('img');
card.setAttribute('src', 'imagens/memoria/blank.png');
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

console.log('cardschosen id' + cardsChosenID[0]);
console.log('cardschosen id' + cardsChosenID[1]);

console.log('cards chosen: ' + cardsChosen);
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


resultDisplay.textContent = cardsWon.length;

console.log('cardswon' + cardsWon);
if(cardsWon.length === cardArray.length/2){
resultDisplay.textContent = "parabéns carai";
botaoEnd.classList.remove('hide');
}
}

//virar a cartas
function flipCard(){

        var cardID= this.getAttribute('data-id')
       
        cardsChosen.push(cardArray[cardID].name);
        cardsChosenID.push(cardID);
         console.log('cardschosenid: ' + cardsChosenID)
        console.log('cardid: ' + cardID);
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

    createBoard();
    

});
 

// 


</script>
</html>