<?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

//$q= "select * from jogos where tipo=1";
//$busca =$banco->query($q);

?>
<head>
<link rel="stylesheet" href="css/forms.css">
</head>

<form action="addjogo.php?feito=1" method="post">

<label for="nome" >Nome do Jogo</label>
<input type='text' name='nome' id='nome' placeholder="Joãozinho" required><br>
<label for="livro">Livro</label>
<input type="file" name='livro' id='livro' required><br>
<label for="Icone">Icone</label>
<input type="file" name='img' id='img' required><br>
<label for="tipo">Tipo</label>
<select name='tipo' id='tipo' required>
<option value='1' selected> Oficial </option><br>
<option value='0'> Comunidade </option><br>
</select><br>

<button type="submit">Enviar</button>


  
</form>