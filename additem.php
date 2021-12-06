<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Adicionar item</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .conteudo{
        text-align: center;
        font-size: 20px;
    }

    </style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

$currentPage= $_SERVER['SCRIPT_NAME'];

?>  



<div class="conteudo">
     <h1> Adicionar item </h1>
     
<?php
$feito = $_GET['feito'];

if($feito == 0){
    include_once "forms/additem.php";
}else{
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $img = $_POST['img'];
    $funcao = $_POST['funcao'] ?? null;
    $valor = $_POST['valor'] ?? 1;
    $tipo = $_POST['tipo'];
    $jogo = $_POST['jogo'];
    
   echo "nome:".$_POST['nome']."<br>";
   echo "preço: ".$_POST['preco']."<br>";
   echo "imagem: ".$_POST['img']."<br>";
   echo "funcao: ".$_POST['funcao']."<br>";
   echo "valor: ".$_POST['valor']."<br>";
   echo "tipo: ".$_POST['tipo']."<br>";
   echo "idjogo: ".$_POST['jogo']."<br>";

   $q="select * from itens";
   $busca = $banco->query($q);
   $reg= $busca->fetch_object();

   if( empty($nome) || empty ($preco) || empty($img) || empty($tipo) || empty($jogo)){
    echo erro("preencha todos os campos");   
   }else{
       if($preco>99999){
           echo erro("preço alto demais");
       }else{
        $q="INSERT INTO ITENS(NOME,PRECO,IMG,FUNCAO,VALOR,TIPO,JOGOS_IDJ) VALUES 
        ('$nome','$preco','$img','$funcao','$valor','$tipo','$jogo');";

        if($banco->query($q)){
            echo sucesso("Deu certinho yay");
        }else{
            echo erro("erro");
        }
       }
   }




}
?>
</div>

 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">

</script>
</body>

</html>