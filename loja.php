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

 <h2 id="mensagem"><?php if(logado()){ echo "Ola ". $_SESSION['tipo']."  " . $_SESSION['user']; } ?></h2> 
    </div>
    <div class="direita">
 <?php include_once "header.php" ?>
</div>
</div>

     <div class="conteudo">
         <div id="loja"> 
     <table>
<?php
$q="select * from skins";
$busca = $banco->query($q);
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr><td>Nome";
        echo "<td>Imagem";
        echo "<td>Preço";
        while ($reg = $busca->fetch_object()){
            $t = thumb($reg->img);

            
            echo  "<tr><td><p>$reg->nome</p>";
            echo  "<td><img src='$t' width='200px' height='200px'>";
            echo  "<td><p>$reg->preco coins</p>";
            echo "<tr><td colspan='3'><a href='compra.php?id=$reg->id'><p> COMPRAR</p></a>";
           
            
            
        }
    }
    
}
?>
</table>
</div>
</div>



<div class="rodape">
     <?php  include_once "footer.php"; ?>
<?php echo voltar(); ?>
</div>
</div>
</div>
</body>

</html>