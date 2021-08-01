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
<?php 
$rm = $_GET['rm'] ?? 0;
$q="delete from usuarios where $rm=rm";
$busca = $banco->query($q); 

?>
 <div id="corpo">
     <h1> usuarios </h1>
     <h2></h2>   
     

     <?php include_once "header.php" ?>
     <table class="loja">
<?php
$q="select usuario, rm, senha, tipo, coin, highscore from usuarios";
$busca = $banco->query($q);
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr clas='lista'><td class='lista'>usuario";
        echo "<td class='lista'>rm";
        echo "<td class='lista'>senha";
        echo "<td class='lista'>tipo";
        echo "<td class='lista'>coin";
        echo "<td class='lista'>highscore";
        echo "<td class='lista'>ação";
        while ($reg = $busca->fetch_object()){
           
            echo  "<tr class ='lista'><td class ='lista'><p style='color:black;' id='secundario'>$reg->usuario</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->rm</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->senha</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->tipo</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->coin</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->highscore</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'><a href='usuarios.php?rm=$reg->rm'><i class='material-icons'>delete_outline</i></a></p>";
          
            
           
            
            
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