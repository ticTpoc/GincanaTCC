<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style> 

#paragrafo{
    position: fixed;
    background-color: plum;
    pointer-events: none;
    padding: 0.3rem;
}
div.caderno{
   height:800px
}
div.aberto{
    margin:auto;
    width:80%;
    height:800px;
    position:fixed;
    left:10%;
    background-image: url("imagens/fundos/livroaberto.png");
    bottom: -40px;
}
table.caderno{
    
  
    border-collapse: separate ;
    border-spacing: 8rem 4rem;
    margin-left: 50px;
    
   
 
    
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



<div class="conteudo">
    <h1> <?php echo "$jogo<br>";
    $usuario = $_SESSION['rm'];
                $u = "select * from usuarios where rm='$usuario'";
                $buscau = $banco->query($u);
                $regu = $buscau->fetch_object();
              echo "moedas:$regu->coin"; ?></h1>
   
    <!-- img class="aberto" src="imagens/fundos/livroaberto.png" -->
<div class="caderno"> 
<div class="aberto">
   <table class="caderno">
 <?php
            $q="select itens.funcao, itens.id, itens.img, itens.nome from jogos join itens 
            on itens.jogos_idj=jogos.idj where jogos.nome='$jogo'";
            $busca = $banco->query($q);
       
           
            for( $i=0; $reg = $busca->fetch_object() and $i<8; $i++){
               
                
                if (($i % 4 == 0)){
                    
                     echo "<tr>";
                    }

                    $usuario = $_SESSION['rm'];
                    $j=" select usuarios.usuario, itens.id from compras join usuarios on usuarios_rm=usuarios.rm
                    join itens on itens_id=itens.id where usuarios.rm='$usuario' and itens.id='$reg->id' ";
                    $busca2=$banco->query($j);


                    if($busca2->num_rows>=1){
                        echo "";
                    }else{
                        $alt = $reg->funcao; 
                        $caminho = thumb('itens',$reg->img);
                        echo "<td>$reg->id<br>
                        <a href='comprar.php?id=$reg->id' ><img onmouseover=\" Mostrar('$alt')\"  onmouseout=\" Desmostrar() \"
                          src='$caminho'></a><br>
                        $reg->nome";
                        echo "<p id='descricao'> </p>";
        
                    }
              
           

            }
           

                ?>

   </table>
</div>
</div>
</div>

</div>
<script type="text/javascript">
function placeDiv(x_pos, y_pos) {
  var d = document.getElementById('paragrafo');
  console.log(d);
  d.style.position = "fixed";
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