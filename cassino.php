<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
#jogo{
    background-color:black;
    width:40%;
    height: 500px;
    
}

</style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

?>  

     <h1 id="texto"style="text-align:left"> Cassino </h1> 
 <h2><?php if(logado()){ 
         echo "olá ". $_SESSION['tipo']."  " . $_SESSION['user'];
         
         } ?></h2>   

<div>
    <?php include_once "header.php" ?>



</div>
<table >
<?php
$rm = $_SESSION['rm'];
 $q="SELECT b.usuario1,b.vencedor,b.impopar, a.coin as 'usuario1coin',c.coin as 'usuario2coin', b.confirmacao, b.usuario2,b.ida,a.usuario as 'desafiante' ,c.usuario as 'desafiado',b.valor from apostas b JOIN usuarios a ON b.usuario1=a.rm JOIN usuarios c ON b.usuario2=c.rm where b.usuario2='$rm';";
$busca=$banco->query($q);


//checar se o usuário já possui apostas



    while($reg = $busca->fetch_object()){

        $usuario1=$reg->usuario1;
        $usuario2=$reg->usuario2;
        $valor=$reg->valor;

        if($reg->confirmacao==(null)||(false)){
            echo "<tr><td class='loja'>$reg->desafiante";
            echo "<td class='loja'>$reg->usuario1coin";
            echo "<td class='loja'>$reg->desafiado";
            echo "<td class='loja'>$reg->usuario2coin";
            echo "<td class='loja'>$reg->confirmacao";
            echo "<td><button onclick='Confirmacao($reg->ida)'>Aceitar</button>";
        }else{
            if($reg->vencedor!== null){
                         
            }else{
                
                echo "<br>bora rodar simulação carai<br>";
                //cobrar o usuario 2
                

                $dado = random_int(1,6);
                 echo "$dado";
                 if($dado%2==0){
                     $resultado = 'par';
                 }else{
                     $resultado = 'impar';
                 }
    
                 if($resultado==$reg->impopar){
                     echo " $reg->desafiante vence <br>";
                     $vencedor = $reg->usuario1;
                     
                 }else{
                     echo " $reg->desafiado  vence <br>";
                     $vencedor = $reg->usuario2;
                 }
                 $q="
                 update apostas
                 set vencedor='$vencedor'
                  where ida='$reg->ida';
                        ";
                        $banco->query($q);
                 $k="select * from usuarios where rm='$usuario2'";
     $busca=$banco->query($k);
     $reg=$busca->fetch_object();
     $novocoin=$reg->coin - ($valor/2);
     echo "novo coin do usuario2 $novocoin";
     $q="
     update usuarios
     set coin='$novocoin'
      where rm='$usuario2';
            ";
            $banco->query($q);
             echo "valor: $valor";
             // adicionar o valor da aposta aos coin do vencedor
             $k="select * from usuarios where rm='$vencedor'";
             $busca=$banco->query($k);
             $reg=$busca->fetch_object();
             $novocoin=$reg->coin + $valor;
             echo "novocoin do vencedor $valor";
             $q="
             update usuarios
             set coin='$novocoin'
              where rm='$vencedor';
                    ";
              $banco->query($q);
            }
            

        }
        
    }
   
  
 

echo "</table><br><br>";

    include_once "novo_form_aposta.php";


  




?>

</div> 

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

function Confirmacao(ida){

console.log("pelamorsocorro");

console.log(ida);

    var identidade = new FormData();
    identidade.append('valor', ida);

    console.log(ida);
$.ajax({
        url:'confirmar_aposta.php',
        method: 'post',
        data: identidade,
        processData: false,
        contentType:false,
        success: function(resposta){
                console.log(resposta);
        }

 });
}



function notificacao(texto){

    var assunto = new FormData();
        assunto.append('assunto', texto);

    $.ajax({
            url:'notificacao.php',
            method: 'post',
            data: assunto,
            processData: false,
            contentType:false,
            success: function(resposta){
                    alert("deu certo");
            }

});
}
</script>
<div id="rodape">
     <?php  include_once "footer.php"; ?>
</div>
</div>

</body>

</html>
<?php /* 

passo a passo cassino

desafiante inserir rm do usuario a ser desafiado-
checar se o desafiado existe no BD-
mostrar o nome de usuario do desafiado para o desafiante checar-
enviar uma notificação para o desafiado-
desafiado confirmar a notificação-
anotar o dia da aposta-
ambos jogadores perdem coins de acordo com o valor da aposta-
criar a aposta com todos os dados obtidos (usuario1, usuario2, valor, dia, confirmacao)
rodar a simulação de um dado-
vencedor ganha o valor da aposta-


*/ ?>