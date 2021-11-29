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
<form action="addjogo.php?feito=1" method="post">

<label for="nome" >Nome do Jogo</label>
<input type='text' name='nome' id='nome' placeholder="Joãozinho" required><br>
<label for="livro">Livro</label>
<input type="file" name='livro' id='livro' required><br>
<label for="Icone">Icone</label>
<input type="file" name='img' id='img' required><br>

<h4>Tipo:</h4>
<label for="comunidade">Comunidade</label>
<input type="radio" name="tipo" id="comunidade" value="0"> <br>
<label for="oficial">Oficial</label>
<input type="radio" name="tipo" id="oficial" value="1"><br>
</select><br>

<button type="submit">Enviar</button>


  
</form>
</div>