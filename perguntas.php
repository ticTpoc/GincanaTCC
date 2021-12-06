<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Perguntas do Quiz</title>
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



<div class="conteudo">
     <h1> perguntas </h1>
     
<?php

$q = "select * from quiz";
$busca = $banco->query($q);
echo "<table class='loja'>";
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr><td class='loja'>ID";
        echo "<td class='loja'>Questão";
        echo "<td class='loja'>Resposta";
        echo "<td class='loja'>Resposta";
        echo "<td class='loja'>Resposta";
        echo "<td class='loja'>Resposta";

        while ($reg = $busca->fetch_object()){
           
            echo "<tr><td class='lista'>$reg->idq";
        echo "<td class='lista'>$reg->question";
        echo "<td class='lista'>$reg->R2";
        echo "<td class='lista'>$reg->R1";
        echo "<td class='lista'>$reg->RC";
        echo "<td class='lista'>$reg->R3";
            
        }
    }
    
}
echo "</table>";
?>
</div>

 </div>
</body>

</html>