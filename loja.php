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

 <div id="loja">
     <h1> Loja </h1>
     <table class="loja">
<?php
$q="select * from skins";
$busca = $banco->query($q);
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr clas='loja' style='background-color:black; color:white'><td class='loja'>Nome";
        echo "<td class='loja'>Imagem";
        echo "<td class='loja'>Preço";
        while ($reg = $busca->fetch_object()){
            $t = thumb($reg->img);

            
            echo  "<tr class ='loja'><td class ='loja'><p style='color:black;' id='secundario'>$reg->nome</p>";
            echo  "<td class ='loja'><img src='$t' width='200px' height='200px'>";
            echo  "<td class ='loja'><p style='color:black;' id='secundario'>$reg->preco coins</p>";
            echo "<tr class='loja'><td colspan='3'><a href='compra.php?id=$reg->id'><p style='text-align:center;'> COMPRAR</p></a>";
           
            
            
        }
    }
    
}
?>
</table>




     <?php  include_once "footer.php"; ?>


<?php echo voltar(); ?>
</div>
</body>

</html>