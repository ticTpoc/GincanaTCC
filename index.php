<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>


#fechar{
    position:absolute;
    right:0;
}
#iconezinho{
    position: absolute;
    left:0;
}
.papo{
    line-height: 100px;
    bottom:0;
    position: fixed;
    height: 100px;
    background-color: black;
    color:white;
    width: 100%;
    text-align: center;
    font-size: 30px;
}

</style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$ideia = $_GET['ideia'] ?? null;
$papo = $_GET['papo'] ?? null;
?>  
<div class="corpo">

<div class="conteudo">


<?php 



if(!logado()){
echo "<img src='imagens/fundos/entradaguardinhamaior.png' class='fundos' id='entrada' usemap='#image-map'>";
echo "<map name='image-map'>";
echo "<area target='' alt='guardinha' title='guardinha' href='index.php?papo=1' coords='574,338,791,559'
 shape='rect'>";
}else{

    if(admin()){
        echo "<img src='imagens/fundos/entradaguardinhamaiorblush.png' class='fundos' id='entrada' usemap='#image-map'>";
        echo "<map name='image-map'>";
        echo "<area target='' alt='guardinha' title='guardinha' href='index.php?papo=1' coords='574,338,791,559'
         shape='rect'>";
         echo "<area target='' alt='portão' title='portão' href='funcionarios.php' coords='966,269,1351,734' shape='rect'>";
         echo "<area  target='' href='sair.php' alt='sair' title='sair' coords='-2,180,279,894' shape='rect'>";
    }else{
        echo "<img src='imagens/fundos/entradaguardinhamaiorblush.png' class='fundos' id='entrada' usemap='#image-map'>";
        echo "<map name='image-map'>";
        echo "<area target='' alt='guardinha' title='guardinha' href='index.php?papo=1' coords='574,338,791,559'
         shape='rect'>";
         echo "<area target='' alt='portão' title='portão' href='jogos.php?corredor=1' coords='966,269,1351,734' shape='rect'>";
         echo "<area ' target='' href='sair.php' alt='sair' title='sair' coords='-2,180,279,894' shape='rect'>";

        }
   

}
?>
<?php
if($papo == 1){
    echo "<div id='papo' class='papo'>";
    echo "<img id='iconezinho' src='imagens/sprites/guardinhaicone.png'>";
    echo "<button id='fechar' onclick='fechar()'>Fechar</button>";
    switch($ideia){

        case 1:
            echo "<span> guardinhaMaroto:  Vai Meter a Fuga Mesmo? </span>";
        break;
        case 2:
            echo "<span> Serelepinho </span>";
        break;
        case 3:
            echo "<span> você cometeu um grande erro </span>";
        break;

        default:
        if(logado()){
            echo "<span>";
            echo "Olá ". $_SESSION['tipo']."  " . $_SESSION['user'];
            echo "</span>";
        }else{
            
            echo "<span>guardinhaMaroto: <a id='branco' href='user_login_form.php'>Login</a> 
            ou <a id='branco' href='addusuario.php?feito=0'> Cadastro</a> ?</span>";
           
        }

    }

echo "</div>";
}

?>

</div>
<script type="text/javascript">

papo = document.getElementById('papo');
function fechar(){

    papo.classList.add('hide');
}


</script>
</body>

</html>