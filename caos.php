<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CAOS
        </title>
        <meta charset="UTF-8"> 
		<link rel="stylesheet" href="css/estilo.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
			.center{
				margin: auto;
				width: 60%;
				padding: 10px;
				/*border: 3px solid blue;*/
			}
			#canvas{
				border: 2px solid black;
			}
			audio{
				visibility: hidden;
			}
			audio:hover{
				visibility: visible;
			}
		</style>
    </head>
    <body>
	<?php 
        require_once "includes/bd.php";
        require_once "includes/funcao.php";
        require_once "includes/login.php";
    ?>  
		<div class="corpo">
			
		
		<div class="center">
			<canvas  id="canvas" width="800" height="500"></canvas>
			</div>
		
			
		</div>

			<script type = "text/javascript">
				let ctx, p1_y, p2_y, p1_points, p2_points
				let ball_y_orientation, ball_x_orientation, ball_x, ball_y, ball_speed = 0, ball_tspeed = 5
                let ball2_y_orientation, ball2_x_orientation, ball2_x, ball2_y
				let p1_key, p2_key
				const h=500, w=800, p_w=20, p_h=200, p1_x = 10, p2_x = w - p_w - 10
				function setup(){
					const canvas = document.getElementById("canvas")
					ctx = canvas.getContext("2d")
					
					// inicializa as posições y do p1 e do p2 para metade da tela
					p1_y = p2_y = (h / 2) - (p_h/2)
					
					// inicializa os pontos dos jogadores como 0
					p1_points = 0
					p2_points = 0

					//define um intervalo de 60 fps para o loop
					setInterval(loop,1000/60)

					initBall()
				}

				function loop(){
					//Verifica se a bola está colidindo com o barra do player 1
					if(ball_x >= p1_x && ball_x <= p1_x + 10 && ball_y >= p1_y && ball_y <= p1_y + p_h){
						ball_x_orientation = 1
					}
					//Verifica se a bola está colidindo com o barra do player 2
					else if(ball_x >= p2_x && ball_x <= p2_x + 10 && ball_y >= p2_y && ball_y <= p2_y + p_h){
						ball_x_orientation = -1
					}
                    if(ball2_x >= p1_x && ball2_x <= p1_x + 10 && ball2_y >= p1_y && ball2_y <= p1_y + p_h){
						ball2_x_orientation = 1
					}
					//Verifica se a bola está colidindo com o barra do player 2
					else if(ball2_x >= p2_x && ball2_x <= p2_x + 10 && ball2_y >= p2_y && ball2_y <= p2_y + p_h){
						ball2_x_orientation = -1
					}

					// verifica se a bola passou bateu no chão ou no teto
					if(ball_y + 10 >= h || ball_y <= 0) ball_y_orientation *= -1
                    if(ball2_y + 10 >= h || ball2_y <= 0) ball2_y_orientation *= -1


					//move a bola no eixo X e Y
					ball_x += ball_tspeed * ball_x_orientation
					ball_y += ball_tspeed * ball_y_orientation
                    ball2_x += (ball_tspeed +1) * ball2_x_orientation
					ball2_y += (ball_tspeed +1) * ball2_y_orientation

					if(ball_x+10 > w) {
						p1_points++
						ball_speed = Math.floor(Math.random() * 5 + 1) - Math.floor(Math.random() * 7)
						initBall()
					}
					else if(ball_x < 0){
						p2_points ++
						ball_speed = Math.floor(Math.random() * 5 + 1) - Math.floor(Math.random() * 7)
						initBall()
					}
                    if(ball2_x+10 > w) {
						p1_points ++
                        ball_speed = Math.floor(Math.random() * 5 + 1) - Math.floor(Math.random() * 7)
									initBall()
					}
					else if(ball2_x < 0){
						p2_points ++
                        ball_speed = Math.floor(Math.random() * 5 + 1) - Math.floor(Math.random() * 7)
									initBall()
					}

					if(p1_key == 87 && p1_y > 0){
						p1_y -= 10 + ball_speed
					}else if(p1_key == 83 && p1_y + p_h < h){
						p1_y += 10 + ball_speed
					}

					if(p2_key == 38 && p2_y > 0){
						p2_y -= 10 + ball_speed
					}else if(p2_key == 40 && p2_y + p_h < h){
						p2_y += 10 + ball_speed
					}
					draw()
				}

				function initBall(){
					console.log(`${p1_points} VS ${p2_points}`)
					ball_y_orientation = Math.pow(2, Math.floor( Math.random() * 2 )+1) - 3 
					ball_x_orientation = Math.pow(2, Math.floor( Math.random() * 2 )+1) - 3 
					ball_x = w / 2 -10
					ball_y = h / 2 -10
                    ball2_y_orientation = Math.pow(2, Math.floor( Math.random() * 2 )+1) - 3
					ball2_x_orientation = ball_x_orientation * - 1
					ball2_x = w / 2 +10
					ball2_y = h / 2 +20
					ball_tspeed = ball_tspeed + ball_speed
					
				}

				function draw(){
					// fundo
					drawRect(0,0,w,h,"#000")
					// player 1
					drawRect(p1_x, p1_y, p_w, p_h)
					// player 2
					drawRect(p2_x, p2_y, p_w, p_h)
					// barra lateral
					drawRect(w/2 -5,0,5,h)
					// bola
					drawRect(ball_x, ball_y, 20, 20, '#FF0000')
                    drawRect(ball2_x, ball2_y, 20, 20)
					writePoints()
				}

				function drawRect(x,y,w,h,color="#fff"){
					ctx.fillStyle = color
					ctx.fillRect(x,y,w,h)
					ctx.fillStyle = "#000"
				}

				function writePoints(){
					ctx.font = "50px monospace";
					ctx.fillStyle = "#fff";
					// w/4 = 1/4 da tela = metade da tela do player 1
					ctx.fillText(p1_points, w/4, 50);
					// 3*(w/4) = 3/4 da tela = metade da tela do player 2
					ctx.fillText(p2_points, 3*(w/4), 50);
				}

				document.addEventListener("keydown",function(ev){
					// keyCode 87 = w, keycode 83 = s
					if(ev.keyCode == 87 || ev.keyCode == 83){
						p1_key = ev.keyCode
					}
					// keycode 38 = arrowUp, keycode 40 = arrowDown
					if(ev.keyCode== 38 || ev.keyCode==40){
						p2_key = ev.keyCode
					}
				})

				setup()
			</script>
			<audio controls autoplay loop>
				<source src="SoundTrack\pong-caos-song.mp3">
			</audio>
		
    </body>
</html>
