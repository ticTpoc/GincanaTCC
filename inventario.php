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
     <h1> Meu inventário </h1>

     <?php include_once "header.php" ?>
     <table>
     <?php

$rm = $_SESSION['rm'] ?? 0;
$q="select skins.id, skins.nome, skins.img,compras.usuarios_rm, usuarios.rm, usuarios.usuario from skins join compras on skins.id=compras.skins_id
join usuarios on usuarios.rm=compras.usuarios_rm where usuarios.rm=$rm;";

$busca = $banco->query($q); 

if(!($busca)){
    echo erro('a busca não deu certo :(');
}else{
    if(($busca->num_rows==0)){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr clas='lista'><td class='lista'>nome";
        echo "<td class='lista'>imagem";
        
        while ($reg = $busca->fetch_object()){
            
            $t=thumb($reg->img);
           
          
            echo  "<tr class ='lista'><td class ='lista'><p style='color:black;' id='secundario'>$reg->nome</p>";
            echo  "<td class ='lista'><img src='$t' width='200px' height='200px'>";
            
           
            
            
        }
    }
    
}
?>
</table>
     
     <?php  include_once "footer.php"; ?>

    
</body>

</html>