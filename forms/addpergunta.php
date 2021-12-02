<?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

//$q= "select * from jogos where tipo=1";
//$busca =$banco->query($q);

?>
<head>
<link rel="stylesheet" href="forms.css">
</head>
<div class="folha">
<form action="addpergunta.php?feito=1" method="post">
<label for="pergunta">Pergunta</label> 
<input type="text" name='pergunta' id='pergunta'>   Correta<br><br>
<label for="r1">Resposta 1</label>
<input type="text" name='r1' id='r1'><input type='radio' name='rc' value='r1'><br><br>
<label for="r2">Resposta 2</label>
<input type="text" name='r2' id='r2'><input type='radio' name='rc' value='r2'><br><br>
<label for="r3">Resposta 3</label>
<input type="text" name='r3' id='r3'><input type='radio' name='rc' value='r3'><br><br>
<label for="r4">Resposta 4</label>
<input type="text" name='r4' id='r4'><input type='radio' name='rc' value='r4'><br><br>


<button type="submit">Enviar</button>


  
</form>
</div>