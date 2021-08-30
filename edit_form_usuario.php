
<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>    
  

 <?php
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";


   $q="select usuario,rm,senha,tipo from usuarios where usuario='".$_SESSION['user']."'";
   $busca = $banco->query($q);
   $reg=$busca->fetch_object();


?>



<div class="form-titulo">
   <h1> Alteração de dados </h1>
</div>

<div id="formulario">
   <form action="edit_usuario.php" method="post">
   <table>
   <tr><td> Usuário <td> <input type="text" name="usuario" id="usuario" size="10" maxlength="10" value="<?php echo $reg->usuario;?>">
   <tr><td> rm <td> <input type="text" name="rm" id="rm" size="6" maxlength="6" value="<?php echo $reg->rm;?>" reaonly>
   <tr><td> Tipo <td> <input type="text" name="tipo" id="tipo" value="<?php echo $reg->tipo;?>" readonly>
   <tr><td> Senha antiga <td> <input type="password" name="senha0" id="senha0" size="10" maxlength="10">
   <tr><td> Nova senha <td> <input type="password" name="senha1" id="senha1" size="10" maxlength="10">
   <tr><td> Confirme sua senha <td> <input type="password" name="senha2" id="senha2" size="10" maxlength="10">
   <tr><td> <input class="form-butao" type="submit" value="Alterar">

</div>

</table>
<?php echo voltar(); ?>

</form> 

</body>

</html>