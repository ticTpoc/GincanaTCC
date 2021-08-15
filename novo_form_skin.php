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

<h1> Cadastrar skin </h1>


<form action="nova_skin.php" method="post">
<table>
<tr><td> Nome <td> <input type="text" name="nome" id="nome" size="15" maxlength="30">
<tr><td> Jogo <td> <input type="text" name="jogo" id="jogo" size="20" maxlength="20">
<tr><td> Preço <td> <input type="number" name="preco" id="preco" size="4" maxlength="4">
<tr><td style="text-align:right; " id='filmeform'>  <label for="img" id="img" onclick="handleFiles()">Aparência:</label> <td>
 <input type="file" id="img" name="img" accept="image/*">
 <tr><td> Valor <td> <input type="number" name="valor" id="valor" size="3" maxlength="3">
<tr><td> <input type="submit" value="Cadastrar">






</table>
<?php echo voltar(); ?>

</form> 

</body>

</html>