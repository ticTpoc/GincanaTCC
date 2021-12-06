<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>Vlw galera, vos amamos</title>
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
#voltar{
    color:white;
    font-size: 20px;
   
}
h1{
    font-size: 60px;
}
h2{
    font-size:40px;
}
h3{
    font-size:20px;
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
<a id="voltar" href="creditos.php"><h1>CRÉDITOS</h1></a>
<h2>Membros: </h2>
<h3>Gabrielly</h3>
<h3>Felipe</h3>
<h3>William</h3>
<h3>Alecthor</h3>
<h2>Participação especial: </h2>
<h3>Kevin: Ator</h3>
<h3>Nicolas: Random</h3>
<h3>Tiago: Random</h3>
<h3>Inhesta: Ator</h3>
<h3>Gustavo: VIP</h3>
<h3>João Paulo: Citação</h3>
<h3>Guardinha: Guardinha</h3>
<h3>Rei James: Citação </h3>
<h3><?php echo $_SESSION['user']?>: Perfeição</h3>
<h2>Não humanos: </h2>
<h3>Goblin</h3>
<h3>Dragão</h3>
<h3>Orc</h3>
<h3>Unicórnio</h3>
<h3>Elfo</h3>
<h3>Marcella</h3>
<h3>Ogro</h3>
<h3>Poseidon</h3>
<h3>Bolinha</h3>
<h3>Barrinha esquerda</h3>
<h3>Barrinha direita</h3>
<h3>Caos encarnado</h3>
<h2>Localizações</h2>
<h3>ETEC Anna de Oliveira Ferraz</h3>
<h3>Ibiza</h3>
<h3>Albânia</h3>
<h2>Agradecimentos especiais</h2>
<h3>Melry Ellen</h3>

    <a id= "voltar" href="index.php">Sair</a>

 </div>
 
 <audio class="hide" controls autoplay>
  <source  src="SoundTrack\classica.mp3">
</audio>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type='text/javascript'>
  
  $('html,body').animate({scrollTop: document.body.scrollHeight},{duration:25000}  );



    </script>
</html>