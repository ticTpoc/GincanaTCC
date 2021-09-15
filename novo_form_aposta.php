<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";



?>  
<body>    
<div class="corpo">
<div id='cassino'>

<form method="post" action="aposta.php">
<table>


<tr><td>Valor que você quer apostar <input type="number" name="valor" id="valor" size="3" maxlength="3" required>

<tr><td> Impar ou Par? <select name='impopar' id='impopar' required>
 <option value='impar' selected> impar </option>
 <option value='par'> par </option>
  
 
 <tr><td> Usuário desafiado <input type="number" name="usuario2" id="usuario2" size="6" maxlength="6" placeholder="RM" required>

 
 <tr><td> Bora <input type="submit" value="bora">

</table>
</form>

</div>  
</div>
</body>

</html>