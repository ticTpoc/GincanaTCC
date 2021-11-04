<html>
    <head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="quiz" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>

#admin{
    background-color: blue;
    text-align: center;
}

:root{
--hue-neutral: 200;
--hue-wrong: 0;
--hue-correct: 140;
}

.quiz{
--hue: var(--hue-neutral);
padding: 0;
margin:0;
display: flex;
width: 100%;
height: 100vh;
justify-content: center;
align-items: center;

background-color: hsl(var(--hue), 100%, 20%);
}


.correct{
--hue: var(--hue-correct);
}

.wrong{
--hue: var(--hue-wrong);
}

.quizcontainer{
width: 800px;
max-width: 80%;     
background-color: white;
border-radius: 5px;
padding: 60px;
box-shadow: 0 10px 20px 5px;
}

.btn-grid{
display:grid;
grid-template-columns: repeat(2,auto);
gap:20px;
margin:20px 0;
}

.btn{
--hue: var(--hue-neutral);
border: 2px solid hsl(var(--hue),100%,30%);
background-color: hsl(var(--hue),100%, 60%);
border-radius: 5px;
padding: 10px 10px;
color: black;
outline: none;
}

.btn:hover{

background-color:aqua;
}
.btn.correct{
--hue: var(--hue-correct);

}
.btn.wrong{
--hue: var(--hue-wrong);
}


.start-btn, .next-btn{
font-size:1.5rem;
font-weight: bold;
padding: 10px 20px;
}

.controls{
display:flex;
justify-content: center;
align-items: center;
}

    </style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";




?>  
 <div id="corpo">
 <div class="cabecalho">
    <div class="esquerda">
    <h1 id="nome"> <a href = index.php>Gincana Bacana</a> </h1> 

 <h2 id="mensagem"><?php if(logado()){ echo "Ola ". $_SESSION['tipo']."  " . $_SESSION['user']; } ?></h2> 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
 
</div>
</div>
  
<div id="admin">
<?php
if($_SESSION['tipo']=='admin'){
    echo "<button><a href='aprovar.php'> Aprovar Perguntas </a></button>";
}

?>
</div>
  
<div class="quiz">

    <div class="quizcontainer">
<div id="question-container" class="hide">
    <div id="question">Question</div> 
    <div id="answer-buttons" class="btn-grid">
        <button class="btn">UM</button>
        <button class="btn">DOIS</button>
        <button class="btn">TRES</button>
        <button class="btn">QUATRO</button>
</div>
</div>
<div class="controls">
    <button id="start-btn" class="start-btn btn">Start</button>
    <button id="next-btn" class="next-btn btn hide">Next</button>
    </div>
</div>
</div>
<div id="results"></div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script type='text/javascript'>

function shuffle(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}
    
const startButton = document.getElementById('start-btn');
const nextButton = document.getElementById('next-btn');
const questionContainerElement = document.getElementById('question-container');
const questionElement = document.getElementById('question');

const answerButtonsElement = document.getElementById('answer-buttons')

var pontos = 0;

let shuffledQuestions, currentQuestionIndex

let shuffledAnswers

startButton.addEventListener('click', startGame);
nextButton.addEventListener('click', () =>{
    currentQuestionIndex++;
    setNextQuestion();
});


function startGame(){

    startButton.classList.add('hide');
    shuffledQuestions= questions.sort(()=>Math.random() - .5)
    currentQuestionIndex=0;
    questionContainerElement.classList.remove('hide');
    setNextQuestion();
    console.log(questions);

    
}
function setNextQuestion(){
 resetState();
 showQuestion(shuffledQuestions[currentQuestionIndex]);


}

function showQuestion(question){

    questionElement.innerText = question.question;
    var id = question.idq;
    questionElement.setAttribute('idq', id);
answers = question.answers.sort(() => Math.random() - 0.5);
       
      
        
    question.answers.forEach(answer =>{
        const button = document.createElement('button');
        
        
        button.innerText=answer.text;
        button.classList.add('btn');
        if( answer.correct){
            button.dataset.correct = answer.correct;
        }
        button.addEventListener('click', selectAnswer);
        answerButtonsElement.appendChild(button);
    })
    
}

function resetState(){
    nextButton.classList.add('hide');
    while(answerButtonsElement.firstChild){
        answerButtonsElement.removeChild
        (answerButtonsElement.firstChild)
    }
}
function selectAnswer(e){
const selectedButton = e.target;
const correct= selectedButton.dataset.correct;
var correto = correct;

var id = questionElement.getAttribute('idq');


console.log("correto "+correto);
console.log("id"+id);
if(correto == undefined){
    var identificador= new FormData();
    identificador.append('identificador', id);
    

    console.log(identificador);
   $.ajax({
           url:'errou.php',
           method: 'post',
           data: identificador,
           processData: false,
           contentType:false,
           success: function(resposta){
                 
           }
   });
       
}else{
    var identificador= new FormData();
    identificador.append('identificador', id);
    

    console.log(identificador);
   $.ajax({
           url:'acertou.php',
           method: 'post',
           data: identificador,
           processData: false,
           contentType:false,
           success: function(resposta){
                 
           }
   });
}

Array.from(answerButtonsElement.children).forEach(button =>{
    setStatusClass(button, button.dataset.correct);
})
if(shuffledQuestions.length > currentQuestionIndex + 1){
    setTimeout(function(){nextButton.classList.remove('hide')}, 1000);
}else{
    startButton.innerText = 'Recomeçar';
    startButton.classList.remove('hide');
}

}

function setStatusClass(element, correct){
    clearStatusClass(element);
    if(correct){
        element.classList.add('correct');
    }else{
        element.classList.add('wrong');
    }
}

function clearStatusClass(element){
    element.classList.remove('correct');
    element.classList.remove('wrong');
} 


const questions = [

  <?php
$q='select * from quiz';
$busca = $banco->query($q);


while($reg = $busca->fetch_object()){
    echo "
    {
        question: '$reg->question',
        idq: '$reg->idq',
        answers: [
            { text: '$reg->R1', correct:false},
            { text: '$reg->R2', correct:false},
            { text: '$reg->R3', correct:false},
            { text: '$reg->RC', correct:true}
        ]
    },";
}
  
    ?>
]
</script>
<div class="rodape">
                <?php include_once "footer.php"; ?>
			</div>

<?php  include_once "footer.php"; ?>

</body>

</html>