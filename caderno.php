<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style> 

#paragrafo{
    background-color: plum;
    pointer-events: none;
    padding: 0.3rem;
}

table.caderno{
    border-collapse: separate ;
    border-spacing: 8rem 4rem;
    width: 80%;
    margin-left: 10%;
    margin-right: 10%;
    background-color: blue;
}
img{
    height:220px;
    width: 150px;
}

</style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$jogo = $_GET['jogo'];
/*
$q="select skins.id, skins.nome, skins.img,compras.usuarios_rm, usuarios.rm, usuarios.usuario from skins join compras on skins.id=compras.skins_id
join usuarios on usuarios.rm=compras.usuarios_rm where usuarios.rm=$rm;"; */



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
    <h1> <?php echo "$jogo"; ?></h1>
<div class="caderno"> 
   <table class="caderno">
 <?php
            $q="select * from itens where jogo='$jogo'";
            $busca = $banco->query($q);
       
           
            for( $i=0; $reg = $busca->fetch_object() and $i<8; $i++){
               
                
                if (($i % 4 == 0)){
                    
                     echo "<tr>";
                    }
                    $alt = $reg->funcao; 
            echo "<td>$reg->id<br>
            <img onmouseover=\" Mostrar('$alt')\"  onmouseout=\" Desmostrar() \" src='imagens/itens/$reg->img'><br>
            $reg->nome";
            echo "<p id='descricao'> </p>";

           

            }
           

                ?>

   </table>
</div>
</div>

<div class='rodape'>
     <?php  include_once "footer.php"; ?>
</div>
</div>
<script type="text/javascript">
function placeDiv(x_pos, y_pos) {
  var d = document.getElementById('paragrafo');
  console.log(d);
  d.style.position = "absolute";
  d.style.left = x_pos+'px';
  d.style.top = y_pos+'px';
}

function Mostrar ( texto ){
    
    paragrafo = document.createElement('p');
    paragrafo.innerHTML= texto;
    paragrafo.setAttribute('id', 'paragrafo');
    document.getElementById('descricao').appendChild(paragrafo);
    placeDiv(event.clientX, event.clientY);
}

function Desmostrar (){
    paragrafo = document.getElementById('paragrafo');
    paragrafo.innerHTML= '';
    paragrafo.remove();

}

</script>
</body>

</html>