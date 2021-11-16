<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Lojinha</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

.cadernos{
    background-color: white;
}
.preenchimento{
    height: 100%;
    width: 100%;
}

table.cadernos{
    border-collapse: separate;
    border-spacing: 3rem 0.2rem;
    width: 80%;
    margin-left: 10%;
    margin-right: 10%;
}
td{
    text-align: center;
    height: 500px;
    width: 300px;
}
td#mostragem{
    border: 2px solid black;
    background-color: wheat;
    height: 90px;
}
#mostragem{
background-image: url("imagens/fundos/madeira.png");
background-size:cover;
background-repeat: no-repeat;
width: 800px;
height:90px;
}
#oficial{
 
}
img{
    border-radius: 10%;
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
         <div class="cadernos"> 
         <table class="cadernos">
             <?php 

$q = "select * from jogos where tipo='1'";
$busca = $banco->query($q);

for($i = 0;$reg = $busca->fetch_object(); $i++){

    
    if($i % 5 == 0 and $i != 0){
        echo "<tr><td id='mostragem' colspan = '5'>Livros oficiais<tr> ";
         }
    echo "<td><a href='caderno.php?jogo=$reg->nome'><div class='preenchimento' id='oficial'>
    <img width='100%' src='imagens/jogos/livros/$reg->livro.png'></div></a>";
    
}
   
        
        ?>
            </table>
</div>
</div>



</div>
</div>
</body>

</html>

