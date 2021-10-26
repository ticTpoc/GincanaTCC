
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
<div class="cabecalho">
<div class="esquerda">
    <h1 id="nome"><a href = index.php>Gincana Bacana</a> </h1> 

 <h2 id="mensagem"><?php if(logado()){ echo "Ola ". $_SESSION['tipo']."  " . $_SESSION['user']; } ?></h2> 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
</div>
</div>

<div class="conteudo">


<div id="editusuario">

<form action="edit_usuario.php" method="post">
<table>
<tr><td> Usuário <td> <input type="text" name="usuario" id="usuario" size="10" maxlength="10" value="<?php echo $reg-> usuario;?>">
<tr><td> RM <td> <input type="text" name="rm" id="rm2" size="6" maxlength="6" value="<?php echo $reg-> rm;?>" readonly>
<tr><td> Tipo <td> <input type="text" name="tipo" id="tipo" size="15" maxlength="15" value="<?php echo $_SESSION['tipo']; ?>" readonly>
<tr><td> Senha antiga <td> <input type="password" name="senha0" id="senha0" size="10" maxlength="10">
<tr><td> Nova senha <td> <input type="password" name="senha1" id="senha1" size="10" maxlength="10">
<tr><td> Confirme sua senha <td> <input type="password" name="senha2" id="senha2" size="10" maxlength="10">
<tr><td> <input id="alterar" type="submit" value="Alterar">


</table>
</form> 
</div>
</div>
<div class="rodape">
<?php  include_once "footer.php"; ?>
</div>

</div>



</body>

</html>