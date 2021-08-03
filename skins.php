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
     <h1> skins </h1>
     <h2></h2>   
     <?php 
$id = $_GET['id'] ?? 0;
$q="delete from skins where $id=id";
$busca = $banco->query($q); 

?>

     <?php include_once "header.php" ?>
     
     <table class="loja">
<?php
$q="select nome,id,img,preco from skins";
$busca = $banco->query($q);
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        echo "<tr clas='lista'><td class='lista'>id";
        echo "<td class='lista'>nome";
        echo "<td class='lista'>img";
        echo "<td class='lista'>preço";
        echo "<td class='lista'>ações";
        
        while ($reg = $busca->fetch_object()){
            $t=thumb($reg->img);
           
            echo  "<tr class ='lista'><td class ='lista'><p style='color:black;' id='secundario'>$reg->id</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->nome</p>";
            echo  "<td class ='lista'><img src='$t' width='200px' height='200px'>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'>$reg->preco</p>";
            echo  "<td class ='lista'><p style='color:black;' id='secundario'><a href='skins.php?id=$reg->id'><i class='material-icons'>delete_outline</i></a></p>";
          
            
           
            
            
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