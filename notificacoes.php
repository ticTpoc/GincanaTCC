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

$rm = $_SESSION['rm'] ?? 0;


?>  

    

     <h1 id="texto"style="text-align:left"> Gincana Bacana </h1> 
 <h2><?php if(logado()){ 
         echo "olá ". $_SESSION['tipo']."  " . $_SESSION['user'];
         } ?></h2>   
<div>
    <?php include_once "header.php" ?>

</div>
<div class="corpo">
    <table>
<?php
$q="select * from notificacoes where '$rm'=usuarios_rm ";
$busca = $banco->query($q);
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{

    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr clas='loja' style='background-color:black; color:white'><td class='loja'>identidade";
        echo "<td class='loja'>assunto";
        echo "<td class='loja'>texto";
        echo "<td class='loja'>usuario";
        while ($reg = $busca->fetch_object()){
           

            
            echo  "<tr class ='loja'><td class ='loja'><p style='color:black;' id='secundario'>$reg->idn</p>";
            echo  "<td class ='loja'><p style='color:black;' id='secundario'>$reg->assunto</p>";
            echo  "<td class ='loja'><p style='color:black;' id='secundario'>$reg->texto</p>";
            echo  "<td class ='loja'><p style='color:black;' id='secundario'>$reg->usuarios_rm</p>";
           
            
            
        }
    }
    
}
?>
</table>
<div>
<button onclick="apagar('todas')">Apagar notificações</buttton>
</div>
<div id="rodape">
     <?php  include_once "footer.php"; ?>
</div>
<script type="text/javascript" >






function apagar(apagado){
    var apagado = new FormData();
        apagado.append('apagado', apagado);

    $.ajax({
            url:'apagar.php',
            method: 'post',
            data: apagado,
            processData: false,
            contentType:false,
            success: function(resposta){
                    
            }

});
document.location.reload(true);
}
</script>

        </div>
</body>

</html>