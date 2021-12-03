<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Pong - Escolha de modos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            a{
                color: white;
            }
            a:visited{
                color: white;
            }
            #cheia{
                height: 100%;
                width:100%;
            }
            #tabela{
                
            }
            table{
                margin:auto;
            }
            td,tr{
                font-size: 40px;
                line-height: 300px;
                text-align: center;
                border: 3px solid black;
            }
            td{
                background-image: url("imagens/sprites/portafuncionario.png");
                height: 735px;
                width: 400px;
            }
            td:hover{
                background-image: url("imagens/sprites/portafuncionarioaberta.png");
                font-size: 0px;
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
        <div class="corpo">
            <div id='tabela'>
                <table>
                    <tr>
                        <td><a href='pongsolo.php'><div id='cheia'>1 Jogador</div></a></td>
                        <td><a href='pongduo.php'><div id='cheia'>2 Jogadores</div></a></td>
                    </tr>
                </table>
            </div>
            <div>
                <spam><a href='pongfastball.php' class="button">Fast Ball</a></spam>
                <spam><a href='pongfastgame.php' class="button">Fast Game</a></spam>
            </div>
        </div>
    </body>
</html>