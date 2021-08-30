<html>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>    
    <?php 
require_once "includes/bd.php";
require_once "includes/funcao.php";
require_once "includes/login.php";
?>  
 <div id="corpo">
     <h1> JOGUINHO QUIZ</h1>
     
     <?php include_once "header.php" ?>
<div id= "quiz">


<button id="submit"> </button>
</div>
<div id="results"></div>
     <?php  include_once "footer.php"; ?>
     <script type='text/javascript' src="js/quiz.js"></script>

</div>
</body>

</html>