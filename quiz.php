<html>
    <head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="quiz" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";
?>  
 <div id="corpo">
     <h1> JOGUINHO QUIZ</h1>
     
     <?php include_once "header.php" ?>
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

     <script type='text/javascript'>
    
const startButton = document.getElementById('start-btn');
const nextButton = document.getElementById('next-btn');
const questionContainerElement = document.getElementById('question-container');
const questionElement = document.getElementById('question');

const answerButtonsElement = document.getElementById('answer-buttons')

let shuffledQuestions, currentQuestionIndex
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
}
function setNextQuestion(){
 resetState();
 showQuestion(shuffledQuestions[currentQuestionIndex]);
}

function showQuestion(question){

    questionElement.innerText = question.question;
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


Array.from(answerButtonsElement.children).forEach(button =>{
    setStatusClass(button, button.dataset.correct);
})
if(shuffledQuestions.length > currentQuestionIndex + 1){
    nextButton.classList.remove('hide');
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
    {
        question: 'quanto é 2+2',
        answers: [
            { text: '22', correct:false},
            { text: '2', correct:false},
            { text: '4', correct:true},
            { text: '8', correct:false}
        ]
    },
    {
        question: 'William?',
        answers: [
            { text: 'Sim?', correct:true},
            { text: 'Não?', correct:false},
            { text: 'Talvez', correct:false},
            { text: 'Nenhum', correct:false}
        ]
    },
    {
        question: 'Banana é: ',
        answers: [
            { text: 'amarela', correct:false},
            { text: 'potássio', correct:true},
            { text: 'gostosa', correct:false},
            { text: 'milkshake', correct:false}
        ]
    }
]
</script>


<?php  include_once "footer.php"; ?>

</body>

</html>