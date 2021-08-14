<!DOCTYPE html>
<html lang="pt-br">
<head>

<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<?php
require_once "includes/funcao.php";

?>
<body>    
   
 <div id="corpo">
     
     <h1 id="titulinho">  </h1>
     


     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script type="text/javascript">



var mob = 'goblin';
var dados = new FormData();
dados.append('mob',mob);

      $.ajax({
       url: 'response.php',
       method: 'post',
       data: dados, 
       processData: false,
       contentType: false,
      }).done(function(resposta){
          $('#titulinho').text(resposta);
      })

     </script>
    
</body>

</html>