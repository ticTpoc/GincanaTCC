<!DOCTYPE html>
<html lang="pt-br">
<head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>    
  
 <div id="corpo">
 <?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

?>

<h1> Adicionar pergunta ao quiz </h1>

<form action="nova_pergunta.php" method="post">
<table>
<tr><td> Pergunta <td> <input type="text" name="pergunta" id="pergunta" size="15" maxlength="30">
<tr><td> Resposta 1  <textarea  id="w3review" name="resposta1" id="resposta1" rows="4" cols="50"></textarea>
<tr><td>  Resposta 2  <textarea  id="w3review" name="resposta2" id="resposta2" rows="4" cols="50"></textarea>
<tr><td>  Resposta 3  <textarea  id="w3review" name="resposta3" id="resposta3" rows="4" cols="50"></textarea>
<tr><td>  Resposta certa <textarea  id="w3review" name="certa" id="certa" rows="4" cols="50"></textarea>

<button type="submit">Enviar</button>


</table>
<?php echo voltar(); ?>

</form> 

</body>

</html>