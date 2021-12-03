<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
html{background-color: black;}
.creditos{
  
    background-color: black;
    margin: auto;
    width: 100%;
    height:900px;
    text-align: center;
    color:blanchedalmond;

}
ul.creditos{
    list-style-type: none;
}
    </style>
</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";

?>  
 <div class="creditos">
<h1>CRÉDITOS</h1>
<h2>Membros: </h2>
<h3>Gabrielly</h3>
<h3>Felipe</h3>
<h3>William</h3>
<h3>Alecthor</h3>
<h2>Participação especial: </h2>
<h3>Kevin: Ator</h3>
<h3>Inhesta: Ator</h3>
<h3>Gustavo: VIP</h3>
<h3><?php echo $_SESSION['user']?>: Perfeição</h3>
 </div>
</body>

</html>