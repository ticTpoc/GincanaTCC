<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

button#aprovar{
    padding: 10px;
}
#desaprovado{
    background-color: red;
}
#aprovado{
    background-color: blue;
}
table{
 
    margin-left: 10%;
    
}
table, tr, td{
    
    background-color: rgb(148, 255, 237);
    text-align: center;
    border-collapse: collapse;
    border: 1px solid black; 
}
</style>
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

 <h2 id="mensagem"><?php if(logado()){ echo "Ola ". $_SESSION['tipo']."  " . $_SESSION['user']; } ?></h2> 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
</div>
</div>

<div class="conteudo">
<h1> Aprovar perguntas para o quiz </h1>


<h2>Automaticamente:</h2>
<button id="aprovar">Aprovar</button>

<h2>Manualmente:</h2>
<table>
    <?php
    $q="select * from quiz";
    $busca = $banco->query($q);

    echo "<tr><td>Pergunta<td>Acertos<td>Erros<td>Pontos<td>Aprovação";
      while($reg = $busca->fetch_object()){
          echo "<tr><td>$reg->question
          <td>$reg->acertos
          <td>$reg->erros
          <td>$reg->pontos";
          if($reg->aprovacao==0){echo "<td id='desaprovado'>Não Aprovado";}else{echo "<td id='aprovado'>Aprovado";};
      }

          

    ?>
</table>


</div>

<div class='rodape'>
     <?php  include_once "footer.php"; ?>
</div>


    
</div>
</body>

</html>