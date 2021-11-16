-<html>
<head>
</head>
<body>
    <?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$q="select * from salas";
  $busca=$banco->query($q);

    ?>
<h1> Cadastrar </h1>
<h3> Novo Usuário </h3>

<form action="addusuario.php?feito=1" method="post">
<table>
 <tr><td> Usuário <td><input type="text" name="usuario" id="usuario" size="15" maxlength="10" required>
 <tr><td> RM <td><input type="text" name="rm" id="rm2" size="15" maxlength="30" required>
 <tr><td  id='sala'> Sala <td> <select name='sala' id='sala'>

<?php

while($reg=$busca->fetch_object()){
    echo "<option value='$reg->id' selected>$reg->nome</option>";
}
?>
 <tr><td> Digite sua senha <td><input type="password" name="senha1" id="senha1" size="15" maxlength="30" required>
 <tr><td> Confirme sua senha <td><input type="password" name="senha2" id="senha2" size="15" maxlength="30" required>
<tr><td><input type="submit" value=" Cadastrar">
</table>

</form>

</body>
<!--
usuario varchar(20) not null,
rm int(5) not null primary key,
senha Varchar(70) not null,
sala char(30) not null,

 -->	
</html>