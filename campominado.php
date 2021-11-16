<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Campo minado</title>
        <link rel="stylesheet" href="cabum.css"></link>
        <script src="boom.js" charset="utf-8"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
        <style>
            .center{
				margin: auto;
				width: 45%;
				padding: 10px;
			}
            audio{
                visibility: hidden;
			}
        </style>
    </head>
    <body>
    <div class="center">
        <div class="container">
            <div class="grid"></div>
            <div>Bandeiras faltando: <span id='flags-left'></span></div>
            <div id="result"></div>
        </div>
    </div>
    <audio controls autoplay loop>
				<source src="SoundTrack\MSC.mp3">
	</audio>
    </body>
</html>