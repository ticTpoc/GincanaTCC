<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
table{
  
    margin: auto;
    
}
table,td,tr{
    border: 3px solid black;
}
td{
    
}
img.itens{
    width:100px;
    height:150px;
    
}
#livro{
    position: fixed;
    right:0;
    bottom:0;
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



<div class="conteudo">
     <h1> Mochila </h1>
     <?php

$usuario = $_SESSION['rm'];
$j=" select usuarios.usuario, itens.img, itens.funcao, itens.id from compras join usuarios on usuarios_rm=usuarios.rm
join itens on itens_id=itens.id where usuarios.rm='$usuario'";
$busca=$banco->query($j);
echo "<table><tr>";
for( $i=0; $reg = $busca->fetch_object(); $i++){


    if($i % 5 == 0){
        echo "<tr>";
    }
   $caminho = thumb('itens',$reg->img);
    echo"<td><img class='itens' src='$caminho' alt='$reg->id'>";
    
   
   
}
echo "</table>";
    ?>
<a href='cadernos.php'><img id='livro' src='imagens/sprites/livroloja.png'></a>
</div>
 </div>

 <script src="js/funcao.js"></script>
 <script type="text/javascript">


</script>
</body>

</html>