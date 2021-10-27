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
?>  

    
<div class="corpo">
<div class="cabecalho"> 
     <div class="esquerda">
    <h1 id="nome"> <a href = index.php>Gincana Bacana</a> </h1> 

 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
</div>
</div>  

<div class="conteudo">
    <div >
<?php

$valor = $_POST['valor'] ?? null;
$usuario1 = $_POST['usuario1'] ??null;
$usuario2 = $_POST['usuario2'] ?? null;
$impopar= $_POST['impopar'] ?? null;
$dia = date('20y/m/d');
$decisao = $_POST['decisao'] ?? null;


if($usuario2 == $_SESSION['rm']){
    //caso o maluco decida apostar com ele mesmo
    echo erro("Como diabos você pretende apostar consigo mesmo?");
    echo aviso("Se precisar de amigos eu to aqui");
}else{



if($decisao !== 'sim'){

    $q= "select * from usuarios where '$usuario2'=rm";
    $busca=$banco->query($q);
    
    
    if(!($reg=$busca->fetch_object())){
        echo erro("usuario não existe >:(");
    }else{
       
        
            echo "<form  method='post' action='aposta.php'>";
            echo "<table>";
            echo "<tr><td> Desafiado <input type='text' name='usuario2' value='$usuario2' readonly > ";
            echo "<tr><td> Valor da Aposta <input type='number' name='valor' value='$valor'readonly > ";
            echo "<tr><td> Impopar <input type='text' name='impopar' value='$impopar'readonly>  ";
            echo "<tr><td> Insira seu rm <input type='number' name='usuario1'><br><br> ";
            echo "<tr><td> Você confirma a aposta com '$reg->usuario' ?";
            echo "<select name='decisao' id='decisao' required>";
             echo"<option value='sim' selected> sim </option>";
             echo "<option value='não'> não </option>";
            echo "</select><br><br>";
            echo "<tr><td><button type='submit'> Confirmar </button>";
            echo "</table>";
            echo "</form>";
        
       
    }
    
}else{
    if($reg->coin-$valor<0){
        echo aviso("você não tem dinheiro o suficiente");
    }else{
        if($_SESSION['rm'] !== $usuario1 ){
            echo erro("você não é quem deveria ser");
     
         }else{
             
     //adicionar a aposta no BD.
     $k="select * from usuarios where rm='$usuario1'";
     $busca=$banco->query($k);
     $reg=$busca->fetch_object();
     $novocoin=$reg->coin - $valor;
     $q="
     update usuarios
     set coin='$novocoin'
      where rm='$usuario1';
            ";
      $banco->query($q);
  
     $valor = $valor*2;
     $q=" insert into apostas(usuario1,usuario2,valor,dia,impopar) values('$usuario1','$usuario2','$valor','$dia','$impopar');";
     if($busca=$banco->query($q)){
         echo sucesso("deu tudo certo familia, bora apostar");
         $q="
      insert into notificacoes(assunto,texto,usuarios_rm) values
     ('aposta','Aposta da boa com $reg->usuario','$usuario2');
     ";
     $busca=$banco->query($q);
     
     }else{
         echo erro("erro absurdo");
     }
     
             
     
         }
    }
   
   
}
}

?>
    </div>
</div>
 
<div class="rodape">
     <?php  include_once "footer.php"; ?>
</div>


    
        </div>
</body>

</html>