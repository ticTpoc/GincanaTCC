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

 <div id="corpo">
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
     <br>
<h1> usuarios ativos </h1>

     <?php include_once "header.php" ?>
     <table class="loja">
<?php
$q="select * from usuarios where estado='ativo' ";
$busca = $banco->query($q);
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr clas='lista'><td class='lista'>usuario";
        echo "<td class='lista'>rm";
        echo "<td class='lista'>tipo";
        echo "<td class='lista'>coin";
        echo "<td class='lista'>nivel";
        echo "<td class='lista'>ação";
        while ($reg = $busca->fetch_object()){
           
            echo  "<tr class ='lista'><td class ='lista'><p style='color:black;' id='secundario'>$reg->usuario</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->rm</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->tipo</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->coin</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->nivel</p>";

            if($reg->tipo=='admin'){
                echo " <td class='lista'>ADM";
            }else{
                echo  "<td class ='lista'><p style='color:black;' id='secundario'><button onclick='banir($reg->rm)'>Banir</button></p>";

            }
          
            
           
            
            
        }
    }
    
}
?>
</table>
<br>
<h1> usuarios banidos </h1>
<table class="loja">
<?php
$q="select * from usuarios where estado='banido' ";
$busca = $banco->query($q);

if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr clas='lista'><td class='lista'>usuario";
        echo "<td class='lista'>rm";
        echo "<td class='lista'>tipo";
        echo "<td class='lista'>coin";
        echo "<td class='lista'>nivel";
        echo "<td class='lista'>ação";
        while ($reg = $busca->fetch_object()){
           
            echo  "<tr class ='lista'><td class ='lista'><p style='color:black;' id='secundario'>$reg->usuario</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->rm</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->tipo</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->coin</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->nivel</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'><button onclick='banir($reg->rm)'>Desbanir</button></p>";
          
            
           
            
            
        }
    }
    
}
?>
</table>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">


function banir(usuario){
    
    var banido = new FormData();
        banido.append('banido', usuario);

    $.ajax({
            url:'banir.php',
            method: 'post',
            data: banido,
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