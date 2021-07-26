
<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="estilos/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>    
  
 <div id="corpo">
 <?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";


   $q="select usuario,rm,senha,tipo from usuarios where usuario='".$_SESSION['user']."'";
   $busca = $banco->query($q);
   $reg=$busca->fetch_object();


?>




<h1> Alteração de dados </h1>


<form action="EditUsuario.php" method="post">
<table>
<tr><td> Usuário <td> <input type="text" name="usuario" id="usuario" size="10" maxlength="10" value="<?php echo $reg->usuario;?>">
<tr><td> Nome <td> <input type="text" name="nome" id="nome" size="30" maxlength="30" value="<?php echo $reg->nome;?>">
<tr><td> Tipo <td> <input type="text" name="tipo" id="tipo" value="<?php echo $reg->tipo;?>" readonly>
<tr><td> Senha <td> <input type="password" name="senha" id="senha" size="10" maxlength="10">
<tr><td> Confirme sua senha <td> <input type="password" name="senha2" id="senha2" size="10" maxlength="10">
<tr><td> <input type="submit" value="Alterar">



</table>
<?php echo voltar(); ?>

</form> 

</body>

</html>