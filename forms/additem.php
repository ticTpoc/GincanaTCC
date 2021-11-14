<?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$q= "select * from jogos where tipo=1";
$busca =$banco->query($q);

?>
<head>
<link rel="stylesheet" href="css/forms.css">
</head>

<form action="additem.php?feito=1" method="post">

    <table>

<tr><td >Nome:</td><td id="esquerda"><input type="text" name="nome" id="nome" maxlength="30" required autocomplete="on"></td></tr>
<tr><td >Preço:</td><td id="esquerda"><input type="number" name="preco" id="preco" maxlength="4" required ></td></tr>
<tr><td>Imagem:</td><td><input type="file" name="img" id="img" required ></td></tr>
<tr><td >Função:</td><td id="esquerda"><textarea name="funcao" id="funcao" rows="4" cols="20"></textarea></td></tr>
<tr><td rowspan="2">Tipo:</td>
<td id="esquerda"><input type="radio" name="tipo" id="item" value="item">Item</td>
<tr><td id="esquerda"><input type="radio" name="tipo" id="skin" value="skin">Skin</td></tr>
</tr>
<tr><td>Valor:</td><td id="esquerda"><input type="number" name="valor" id="valor" maxlength="3"></td></tr>
<tr><td>Jogo:</td><td><select name="jogo" id="jogo"> 
<?php

while($reg = $busca->fetch_object()){
    echo "<option id='$reg->idj' value='$reg->idj'> $reg->nome</option>";
}
?>
</select></td></tr>
<tr><td colspan="2"><button type="submit">Enviar</button></td></tr>

    </table>

  
</form>