<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
a{
    color: white;
}
a:visited{
    color: white;
}
#cheia{
    height: 100%;
    width:100%;
}
#tabela{
    
}
table{
    margin:auto;
}
td,tr{
    font-size: 40px;
    line-height: 300px;
    text-align: center;
    border: 3px solid black;
}
td{
    background-image: url("imagens/sprites/portafuncionario.png");
    height: 735px;
    width: 400px;
}
td:hover{
    background-image: url("imagens/sprites/portafuncionarioaberta.png");
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
     <h1> Area dos funcionarios </h1>
     <div id='tabela'>
<table>
    <tr>
        
        <td><a href='additem.php?feito=0'><div id='cheia'>Adicionar item</div></a></td>
        <td><a href='addpergunta.php?feito=0'><div id='cheia'> Adicionar pergunta</div></a></td>
        <td><a href='addjogo.php?feito=0'><div id='cheia'>Adicionar Jogo</div></a></td>
        <td><a href='addsala.php?feito=0'><div id='cheia'>Futuro</div></a></td>
        <tr><td><a href='usuarios.php'><div id='cheia'>Lista de Alunos</div></a></td>
        <td><a href='perguntas.php'><div id='cheia'>Lista de Perguntas</div></a></td>
        <td><a href='novo_form_item.php'><div id='cheia'>add itens</div></a></td>
        <td><a href='novo_form_item.php'><div id='cheia'>add itens</div></a></td>

    </tr>
</table>
</div>
 <script src="js/funcao.js"></script>
 <script type="text/javascript">


</script>
</body>

</html>