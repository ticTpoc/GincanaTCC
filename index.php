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
     <h1> Pagina Inicial </h1>
     <h2></h2>   
     <?php include_once "header.php" ?>
     <?php 

$q="select usuario from usuarios";
$busca = $banco->query($q);
if(!$busca){
    echo erro('a busca não deu certo :(');
}else{
    if($busca->num_rows==0){
        echo aviso('nenhum registro foi encontrado :/');
    }else{
        while ($reg = $busca->fetch_object()){
            
            echo  " <p style='color:black;' id='secundario'>$reg->usuario</p>";
            
        }
    }
    
}
?>

     
     <?php  include_once "footer.php"; ?>

    
</body>

</html>