<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Campo minado</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
        <style>
            body{
                background-image: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);

            }
            .center{
				margin: auto;
				width: 45%;
				padding: 10px;
			}
            audio{
                visibility: hidden;
			}
            .container {
                width: 500px;
                align-content: center;
            }
            
            .grid {
                height: 600px;
                width: 600px;
                display: flex;
                flex-wrap: wrap;
                background-color: #dcd6bc;
                margin-left: 50px;
                margin-top: 20px;
                margin:auto;
                border: 10px solid #dcd6bc;
                margin-bottom: 10px;
            }
            #bandeiras{
                text-align: center ;
                margin-left:100px;
                

            }
            div {
                font-size: 40px;
                text-align: center;
                font-family: 'Roboto Mono', monospace;
            
            }
            .valid {
                height: 60px;
                width: 60px;
                border: 5px solid;
                border-color: #f5f3eb #bab7a9 #bab7a9 #fff9db;
                box-sizing: border-box;
            }
            
            .checked {
                height: 60px;
                width: 60px;
                border: 2px solid;
                background-color: #cecab7;
                border-color: #9c998d;
                box-sizing: border-box;
            }
            
            .bomb {
                height: 60px;
                width: 60px;
                border: 5px solid;
                border-color: #f5f3eb #bab7a9 #bab7a9 #fff9db;
                box-sizing: border-box;
            }
            
            .one {
                color: #e76346;
            }
            
            .two {
                color: #4199d3;
            }
            
            .three {
                color: #57da59;
            }
            
            .four{
                color: #bb41d3;
            }
            
            #result {
                margin-top: 5px;
                color: #e76346;
            
            }
            .button {
            background-color: purple; 
            border: none;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 66px;
            margin-left:33%;
            margin-right:33%;
            position:relative;
            width:400px;
            cursor: pointer;
            border-radius: 500%;
            }
        </style>
    </head>
    <body>
    <div class="center">
        <div class="container">
            <div class="grid">
                <script type="text/javascript">
                function getRandomInt(min, max) {
                    min = Math.ceil(min);
                    max = Math.floor(max);
                    return Math.floor(Math.random() * (max - min)) + min;
                }
                document.addEventListener('DOMContentLoaded', () => {
                    const grid = document.querySelector('.grid')
                    const flagsLeft = document.querySelector('#flags-left')
                    const result = document.querySelector('#result')
                    let width = 10
                    let bombAmount = getRandomInt(10,20)
                    let flags = 0
                    let squares = []
                    let isGameOver = false
                
                    //create Board
                    function createBoard() {
                    flagsLeft.innerHTML = bombAmount
                
                    //get shuffled game array with random bombs
                    const bombsArray = Array(bombAmount).fill('bomb')
                    const emptyArray = Array(width*width - bombAmount).fill('valid')
                    const gameArray = emptyArray.concat(bombsArray)
                    const shuffledArray = gameArray.sort(() => Math.random() -0.5)
                
                    for(let i = 0; i < width*width; i++) {
                        const square = document.createElement('div')
                        square.setAttribute('id', i)
                        square.classList.add(shuffledArray[i])
                        grid.appendChild(square)
                        squares.push(square)
                
                        //normal click
                        square.addEventListener('click', function(e) {
                        click(square)
                        })
                
                        //cntrl and left click
                        square.oncontextmenu = function(e) {
                        e.preventDefault()
                        addFlag(square)
                        }
                    }
                
                    //add numbers
                    for (let i = 0; i < squares.length; i++) {
                        let total = 0
                        const isLeftEdge = (i % width === 0)
                        const isRightEdge = (i % width === width -1)
                
                        if (squares[i].classList.contains('valid')) {
                        if (i > 0 && !isLeftEdge && squares[i -1].classList.contains('bomb')) total ++
                        if (i > 9 && !isRightEdge && squares[i +1 -width].classList.contains('bomb')) total ++
                        if (i > 10 && squares[i -width].classList.contains('bomb')) total ++
                        if (i > 11 && !isLeftEdge && squares[i -1 -width].classList.contains('bomb')) total ++
                        if (i < 98 && !isRightEdge && squares[i +1].classList.contains('bomb')) total ++
                        if (i < 90 && !isLeftEdge && squares[i -1 +width].classList.contains('bomb')) total ++
                        if (i < 88 && !isRightEdge && squares[i +1 +width].classList.contains('bomb')) total ++
                        if (i < 89 && squares[i +width].classList.contains('bomb')) total ++
                        squares[i].setAttribute('data', total)
                        }
                    }
                    }
                    createBoard()
                
                    //add Flag with right click
                    function addFlag(square) {
                    if (isGameOver) return
                    if (!square.classList.contains('checked') && (flags < bombAmount)) {
                        if (!square.classList.contains('flag')) {
                        square.classList.add('flag')
                        square.innerHTML = ' 🚩'
                        flags ++
                        flagsLeft.innerHTML = bombAmount- flags
                        checkForWin()
                        } else {
                        square.classList.remove('flag')
                        square.innerHTML = ''
                        flags --
                        flagsLeft.innerHTML = bombAmount- flags
                        }
                    }
                    }
                
                    //click on square actions
                    function click(square) {
                    let currentId = square.id
                    if (isGameOver) return
                    if (square.classList.contains('checked') || square.classList.contains('flag')) return
                    if (square.classList.contains('bomb')) {
                        gameOver(square)
                         
                    } else {
                        let total = square.getAttribute('data')
                        if (total !=0) {
                        square.classList.add('checked')
                        if (total == 1) square.classList.add('one')
                        if (total == 2) square.classList.add('two')
                        if (total == 3) square.classList.add('three')
                        if (total == 4) square.classList.add('four')
                        square.innerHTML = total
                        return
                        }
                        checkSquare(square, currentId)
                    }
                    square.classList.add('checked')
                    }
                
                
                    //check neighboring squares once square is clicked
                    function checkSquare(square, currentId) {
                    const isLeftEdge = (currentId % width === 0)
                    const isRightEdge = (currentId % width === width -1)
                
                    setTimeout(() => {
                        if (currentId > 0 && !isLeftEdge) {
                        const newId = squares[parseInt(currentId) -1].id
                        //const newId = parseInt(currentId) - 1   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                        if (currentId > 9 && !isRightEdge) {
                        const newId = squares[parseInt(currentId) +1 -width].id
                        //const newId = parseInt(currentId) +1 -width   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                        if (currentId > 10) {
                        const newId = squares[parseInt(currentId -width)].id
                        //const newId = parseInt(currentId) -width   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                        if (currentId > 11 && !isLeftEdge) {
                        const newId = squares[parseInt(currentId) -1 -width].id
                        //const newId = parseInt(currentId) -1 -width   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                        if (currentId < 98 && !isRightEdge) {
                        const newId = squares[parseInt(currentId) +1].id
                        //const newId = parseInt(currentId) +1   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                        if (currentId < 90 && !isLeftEdge) {
                        const newId = squares[parseInt(currentId) -1 +width].id
                        //const newId = parseInt(currentId) -1 +width   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                        if (currentId < 88 && !isRightEdge) {
                        const newId = squares[parseInt(currentId) +1 +width].id
                        //const newId = parseInt(currentId) +1 +width   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                        if (currentId < 89) {
                        const newId = squares[parseInt(currentId) +width].id
                        //const newId = parseInt(currentId) +width   ....refactor
                        const newSquare = document.getElementById(newId)
                        click(newSquare)
                        }
                    }, 10)
                    }
                
                    //game over
                    function gameOver(square) {
                    result.innerHTML = 'BOOM! EXPLODIU!'
                    
                    isGameOver = true
                
                    //show ALL the bombs
                    squares.forEach(square => {
                        if (square.classList.contains('bomb')) {
                        square.innerHTML = '💣'
                        square.classList.remove('bomb')
                        square.classList.add('checked')
                        }
                    })
                    }
                
                    //check for win
                    function checkForWin() {
                    ///simplified win argument
                    let matches = 0
                
                    for (let i = 0; i < squares.length; i++) {
                        if (squares[i].classList.contains('flag') && squares[i].classList.contains('bomb')) {
                        matches ++
                        }
                        if (matches === bombAmount) {
                        result.innerHTML = 'AEEEEEEEEEE! GANHOU!'

                        setTimeout(function(){window.location.href="loot.php?pontos="+matches+"&id=7"}, 2000);   
    

                        isGameOver = true
                        }

                    }
                    }
                })
            </script>
            </div>
            <div id="bandeiras">Bandeiras faltando: <span id='flags-left'></span></div>
            <div id="result"></div>
        </div>
    </div>
    <a href="campominado.php" class="button">Reiniciar</a>
    <audio controls autoplay loop>
				<source src="SoundTrack\MSC.mp3">
	</audio>
    </body>
</html>