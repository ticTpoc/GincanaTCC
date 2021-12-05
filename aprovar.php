<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>


.itens{
    margin-left: 10px;
    border: 2px solid black;
    padding: 10px;
}
button#aprovar{
    padding: 10px;
}
#desaprovado{
    background-color: red;
}
#aprovado{
    background-color: blue;
}
table{
 
    margin-left: 10%;
    
}
table, tr, td{
    
    background-color: rgb(148, 255, 237);
    text-align: center;
    border-collapse: collapse;
    border: 1px solid black; 
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
<div class="itens">
<h1> Aprovar perguntas para o quiz </h1>


<button onclick="Aprovar()" id="aprovar">Aprovar</button>


<table>
    <?php
     $q="select * from quiz where aprovacao=1 and situacao=0;";
     $busca = $banco->query($q);
     while($reg = $busca->fetch_object()){
        $novospontos = $reg->pontos - $reg->acertos + $reg->erros;~

        $q="update quiz
            set pontos ='$novospontos',
            situacao = 1
            where idq='$reg->idq';";
       $banco->query($q);
        
     }
    ?>
    <?php
    $q="select * from quiz";
    $busca = $banco->query($q);

    echo "<tr><td>Pergunta<td>Acertos<td>Erros<td>Pontos<td>Jogadas<td>Aprovação";
      while($reg = $busca->fetch_object()){


            $previsao = $reg->pontos - $reg->acertos + $reg->erros;
            echo "<tr><td>$reg->question
            <td>$reg->acertos
            <td>$reg->erros";
            if($reg->situacao==0){
            echo "<td>$previsao*";
            }else{
            echo " <td>$reg->pontos";
            }
            echo "<td>$reg->jogadas";
            if(($reg->aprovacao==0) and ($reg->situacao == 0)){echo "<td id='desaprovado'>Não Aprovado";}else{echo "<td id='aprovado'>Aprovado";};
      }

          

    ?>
</table>
<p>*previsão de pontuação</p>
</div>
</div>


    
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

function Aprovar(){

    var identificador= new FormData();
    
   $.ajax({
           url:'aprovarpergunta.php',
           method: 'post',
           data: identificador,
           processData: false,
           contentType:false,
           success: function(resposta){
           }


   });

}
</script>
</body>

</html>