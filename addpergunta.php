<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
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
 <div class="corpo">



<div class="conteudo">
     <h1> Adicionar Pergunta </h1>
     
<?php
$feito = $_GET['feito'];

if($feito == 0){
    include_once "forms/addpergunta.php";
}else{
    $r1 = $_POST['r1'];
    $r2 = $_POST['r2'];
    $r3 = $_POST['r3'];
    $r4 = $_POST['r4'];
    $rc = $_POST['rc'];
    $pergunta = $_POST['pergunta'];


   if($rc=='r1'){
       $rc=$r1;
       $r1=$r2;
       $r2=$r3;
       $r3=$r4;
   }else if($rc=='r2'){
       $rc=$r2;
       $r2=$r3;
       $r3=$r4;
   }else if($rc=='r3'){
       $rc=$r3;
       $r3=$r4;
   }else if($rc=='r4'){
       $rc=$r4;
   }

   echo "pergunta: ".$pergunta."<br>";
   echo "Resposta:".$r1."<br>";
   echo "Resposta: ".$r2."<br>";
   echo "Resposta: ".$r3."<br>";
   echo "Resposta certa: ".$rc."<br>"; 


   if( empty($pergunta) || empty ($r1) || empty($r2) || empty($r3) || empty($rc)){
    echo erro("preencha todos os campos");   
   }else{
      
        $q="insert into quiz(question,R1,R2,R3,RC,aprovacao) values
        ('$pergunta','$r1', '$r2','$r3','$rc', false);";

        if($banco->query($q)){
            echo sucesso("Deu certinho yay");
        }else{
            echo erro("erro");
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